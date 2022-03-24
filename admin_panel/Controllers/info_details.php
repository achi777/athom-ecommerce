<?php

class Controller extends init
{
    public $infoModel;
    public $shopModel;
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
        $this->shopModel = new Model();
        $this->load->model("infodb");
        $this->infoModel = new infoModel();
    }


    public function info_details()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $nav[] = new stdClass;
        $nav[0]->name = "Blog";
        $nav[0]->url = baseurl . "/info";
        @$nav[1]->name = "Details";
        $nav[1]->url = "";
        $data['nav'] = json_encode($nav);
        $header_data['title'] = "AO Framework Project || Details";
        $data['copyright'] = "© Archil Odishelidze 2019";
        $data['tree'] = $this->shopModel->product_tree();
        $data['details'] = $this->infoModel->postByID($this->convert->to_int($this->helper->segment(2)));
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("info_details", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
