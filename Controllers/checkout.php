<?php

class Controller extends init
{
    public $model;
    public $userModel;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->model = new Model();
        $this->load->model("userdb");
        $this->userModel = new userModel();
    }



    public function checkout()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->model->contact();
        $nav[] = new stdClass;
        $nav[0]->name = "Shop";
        $nav[0]->url = baseurl."/shop";
        @$nav[1]->name = "Checkout";
        $nav[1]->url = "";
        $data['nav'] = json_encode($nav);

        $userID = $_SESSION['userID'];
        if($userID < 1){
            $this->helper->redirect(baseurl);
        }
        $data['tree'] = $this->model->product_tree();
        $data["shippingData"] = $this->userModel->shipping_data($userID);
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['cuponSale'] = 0;
        $couponAmount = 0;

        if(!empty($_SESSION['cupon']) && $_SESSION['cupon'] != NULL){
            $coupon = $_SESSION['cupon'];
            $data['cuponSale'] = $coupon['amount'];
            $couponAmount = $coupon['amount'];
        }elseif(!empty($this->input->post("cuponCode"))){
            $cuponCode = $this->input->post("cuponCode");
            $cuponData = $this->model->getCupon($cuponCode);
            $cuponData = json_decode($cuponData);
            if($cuponData != NULL){
                if($cuponData[0]->cupon_code == $cuponCode){
                    $checkCupon = json_decode($this->model->checkCupon($cuponCode));
                    if(empty($checkCupon) || $checkCupon == NULL){
                        $data['cuponSale'] = $cuponData[0]->cupon_amount; 
                        $_SESSION['cupon']['amount'] = $cuponData[0]->cupon_amount; 
                        $_SESSION['cupon']['cuponCode'] = $cuponData[0]->cupon_code;
                        $coupon = $cuponData[0]->cupon_code;
                        $data['cuponSale'] = $coupon['amount'];
                        $couponAmount = $coupon['amount'];

                    }
                    
                }
            }
        }

        $totalPrice = 0;
        $totalDiscount = 0;

        if(!empty($_SESSION["cart_item"])){
            $result = $_SESSION["cart_item"];
            $cartData = $this->convert->arrayToObject($result);
            
            foreach($cartData AS $item){
                $totalPrice += $item->product_price;
                $totalDiscount += $item->product_sale;
            }
        }

        

        $data['totalPrice'] = $totalPrice;
        $data['totalDiscount'] = $totalDiscount;

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
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("checkout", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }

}