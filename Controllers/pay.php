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



    public function pay()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
    
      
        if(!empty($_SESSION["cart_item"])) {
            $userID = $_SESSION['userID'];
            $result = $_SESSION["cart_item"];
            $data = json_encode($this->convert->arrayToObject($result), JSON_UNESCAPED_UNICODE);
            var_dump($result);
            $result = $this->convert->arrayToObject($result);
            $shippingCompanyID = 123123;
            $orderCode = easy::uuid();
            $trackingCode = "abc123zxc";
            $cuponCode = "123321";
            $datetime = Date("Y-m-d H:i:s");
            foreach($result AS $item){
                //$this->model->insertOrder($userID, $item->product_id, $item->vriation_id, $item->product_name_geo, $item->product_name_eng, $item->product_name_rus, $item->product_price, $item->product_sale, $shippingCompanyID, $orderCode, 1, $cuponCode, $trackingCode, $datetime, $item->color_name_geo, $item->color_name_eng, $item->color_name_rus, $item->size_name, $item->quantity, $item->image);
            }
            
        }else{
            $this->helper->redirect(baseurl);
        }


    }

}