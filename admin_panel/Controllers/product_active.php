<?php

class Controller extends init
{
    public $model;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***Authorizarion****/
        if ($_SESSION['status'] != "admin") {
            $this->helper->redirect(baseurl . "/admin/login");
            exit();
        }
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->model = new Model();
    }



    public function product_active()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $productID = $this->helper->segment(3);
        $active = $this->helper->segment(4);
        $this->model->productStatus($productID, $active);
        $this->helper->redirect(baseurl."/admin/product");

    }
}
