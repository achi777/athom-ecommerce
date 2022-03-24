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
        $this->load->model("infodb");
        $this->model = new infoModel();
    }


    public function post_cats()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;

        $data['catList'] = $this->model->postCats();
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("catNameGeo"))) {
            $this->model->addCat($this->input->post("catNameGeo"), $this->input->post("catNameEng"),$this->input->post("catNameRus"));
            $this->helper->redirect(baseurl . "/admin/post_cats/");
            $_POST = array();
        } 

        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("post_cats", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
