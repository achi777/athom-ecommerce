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



    public function post_list()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $catID = $this->convert->to_int($this->helper->segment(3));
        $data['catID'] = $catID;
        $data['postCats'] = $this->model->postCats();
        $data['postList'] = $this->model->postList($catID);
        //easy::out($data['productList']);

        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("post_list", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
