<?php

class Controller extends init
{
    public $model;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->model = new Model();
    }



    public function payment()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->model->contact();
        if (isset($_POST['pay']) || isset($_POST['installment']) || isset($_POST['cardpayment'])) {
            $token = $this->getToken(paymentUser, paymentPass);
            if(isset($_POST['pay'])){
                $intent = 'CAPTURE';
            }elseif(isset($_POST['cardpayment'])){
                $intent = 'AUTHORIZE';
            }else{
                $intent = 'LOAN';
            }

            $userID = $_SESSION['userID'];
            $result = $_SESSION["cart_item"];
            $data = json_encode($this->convert->arrayToObject($result), JSON_UNESCAPED_UNICODE);
            //var_dump($result);
            $result = $this->convert->arrayToObject($result);
            $shippingCompanyID = 1;
            $orderCode = easy::uuid();
            $trackingCode = "";
            $cuponCode = "";
            $datetime = Date("Y-m-d H:i:s");
            $totalAmout = 0;
            foreach($result AS $item){
                $amount = $item->product_price - $item->product_sale;
                $totalAmout += $amount; 
                $items[] = ['amount' => $amount, 'description' => $item->product_name_geo, 'product_id' => $item->product_id,'quantity' => $item->quantity, ];
            }
            if(!empty($_SESSION['cupon']) && $_SESSION['cupon'] != NULL){
                $totalAmout = $totalAmout - floatval($_SESSION['cupon']);
            }

            $response = $this->makeOrder($token, $intent, baseurl.'/orders', 'ka', true, $items, null, null, $totalAmout, $orderCode);
        
            if (isset($response['order_id'])) {
                $redirect_url = $response['links'][1]['href'];
                $orderDate = Date("Y-m-d H:i:s");
                $this->model->addPayOrder($response['order_id'], $response['payment_hash'], $_SESSION['userID'], $totalAmout, $orderDate);
                foreach($result AS $item){
                    $this->model->insertOrder($userID, $item->product_id, $item->vriation_id, $item->product_name_geo, $item->product_name_eng, $item->product_name_rus, $item->product_price, $item->product_sale, $shippingCompanyID, $response['payment_hash'], 0, $cuponCode, $trackingCode, $datetime, $item->color_name_geo, $item->color_name_eng, $item->color_name_rus, $item->size_name, $item->quantity, $item->image);
                }
                header("Location:" . $redirect_url);
            }
        }

        $data['catalog'] = $this->model->catalog();
        $data['catalogSub'] = $this->model->catalogSub();
        $data['searchData'] = $this->model->searchProduct();
        $catalog = json_decode($data['catalog']);
        $menus[] = new stdClass;
        $j = 0;
        if (is_array($catalog)) {
            foreach ($catalog as $item) {
                @$menus[$j]->menu = @$this->model->productTreeByID($item->cat_id);
                $j++;
            }
        }

        //var_dump($menus);
        $data['menus'] = json_encode($menus);

        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("payment", $data);
        $this->load->view("footer", $data);
        /******************************************/
            
        $this->load->template_end();
    }

    public function getToken($client_id, $secret_key)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(

            //For production replace https://dev.ipay.ge/ to https://ipay.ge
            CURLOPT_URL => "https://".paymentHost."/opay/api/v1/oauth2/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",

            //The "grant_type=client_credentials" means that you are sending a username and a password to the "oauth2/token" endpoint
            CURLOPT_POSTFIELDS => "grant_type=client_credentials",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/x-www-form-urlencoded",

                //iPay client_id and secret_key in base64
                "Authorization: Basic " . base64_encode($client_id . ':' . $secret_key)
            ],
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        return $response['access_token']; //access token from response

    }

    public function makeOrder($token, $intent, $redirect_url, $locale, $show_shop_order_id_on_extract, $items, $loan_code, $card_transaction_id, $totalAmout, $orderCode)
    {
        $postfields = [
            /**
             * CAPTURE – provides several payment options for users, on the same page. Payment can be performed
             * by card and with BOG digital credentials ( username & password )
             * AUTHORIZE – Allows users to pay only with entering card details.
             * LOAN - users can pay with only installment option. For this
             * user should enter BOG credentials, username / password and go through
             * installment payment process.
             */
            // ENUM: CAPTURE, AUTHORIZE, LOAN
            'intent' => $intent,

            //URL of the page to which the payer will be redirected after a success/failure payment. Does not contain any data
            'redirect_url' => $redirect_url,

            //Shop order id
            'shop_order_id' => $orderCode,

            //Used for recurring payment. Optional
            'card_transaction_id' => $card_transaction_id,

            //Default: "ka". Enum: "ka" "en-US". Localization on which ipay.ge payment page will be displayed. Defaulted to ka if not provided or invalid.
            'locale' => $locale,

            //BOOLEAN. If the value is true, shop_order_id will appear in the extract. default: true
            'show_shop_order_id_on_extract' => $show_shop_order_id_on_extract,

            //Used in case the offer is valid for installment plan.
            'loan_code' => $loan_code,

            'purchase_units' =>
            [
                0 =>
                [
                    'amount' =>
                    [
                        //Enum: "GEL" "USD" "EUR"
                        'currency_code' => 'GEL',

                        //Total amount
                        'value' => $totalAmout,
                    ],
                    'industry_type' => 'ECOMMERCE',
                ],
            ],
            //product list - optional
            'items' => $items,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(

            //For production replace https://dev.ipay.ge/ to https://ipay.ge
            CURLOPT_URL => "https://".paymentHost."/opay/api/v1/checkout/orders",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($postfields),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",

                //access token
                "Authorization: Bearer " . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }
}
