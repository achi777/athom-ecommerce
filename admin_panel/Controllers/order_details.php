<?php
class Controller extends init
{
    public $model;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***Authorizarion****/
        if($_SESSION['status'] != "admin"){
            $this->helper->redirect(baseurl."/admin/login");
            exit();
        }
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->model = new Model();

    }



    public function order_details()
    {

    
        $header_data['title'] = "AO Framework Project || Profile";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $orderID = $this->helper->segment(3);
        $data["shippingData"] = $this->model->shippingDataByID($orderID);
        $orderCode = $this->helper->segment(4);
        $data["orderProducts"] = $this->model->ordersbyCode($orderCode);
        //easy::out($data["shippingData"]);
     

        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("order_details", $data);
        $this->load->view("footer", $data);
        /******************************************/
    
        $this->load->template_end();

    }
}