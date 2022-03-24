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



    public function product()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $catID = $this->helper->segment(3);
        $data['catID'] = $catID;
        //$data['navigation'] = $this->model->navigation();
        $data['tree'] = $this->model->product_tree();
        $data['productList'] = $this->model->productWithCat($catID);
        //easy::out($data['productList']);

        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("product", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
