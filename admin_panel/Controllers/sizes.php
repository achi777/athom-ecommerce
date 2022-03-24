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


    public function sizes()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;

        $data['sizeList'] = $this->model->sizeList();
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("sizeName"))) {
            $this->model->addSize($this->input->post("sizeName"));
            $this->helper->redirect(baseurl . "/admin/sizes/");
            $_POST = array();
        } 

        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("sizes", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
