<?php
class Controller extends init
{
    public $model;
    public $shopModel;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->shopModel = new Model();

        $this->load->model("userdb");
        $this->model = new userModel();
    }



    public function order_products()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->shopModel->contact();
        $nav[] = new stdClass;
        $nav[0]->name = "Profile";
        $nav[0]->url = baseurl."/profile";

        $data['nav'] = json_encode($nav, JSON_UNESCAPED_UNICODE);

        $userID = $_SESSION['userID'];
        if($userID < 1){
            $this->helper->redirect(baseurl);
        }
        $orderCode = $this->helper->segment(2);
        $data['tree'] = $this->shopModel->product_tree();
        $header_data['title'] = "AO Framework Project || Profile";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['response'] = "";
        $data['userData'] = $this->model->userData($userID);
        $data["shippingData"] = $this->model->shipping_data($userID);
        $data["result"] = $this->model->ordersbyCode($orderCode);
        //easy::out($data["result"]);
  

        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("order_products", $data);
        $this->load->view("footer", $data);
        /******************************************/
    
        $this->load->template_end();

    }
}