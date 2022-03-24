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


    public function colors()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;

        $data['colorList'] = $this->model->colorList();
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("colorNameGeo")) && !empty($this->input->post("colorNameEng")) && !empty($this->input->post("colorNameRus"))) {
            $this->model->addColor($this->input->post("colorNameGeo"), $this->input->post("colorNameEng"), $this->input->post("colorNameRus"));
            $this->helper->redirect(baseurl . "/admin/colors/");
            $_POST = array();
        } 

        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("colors", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
