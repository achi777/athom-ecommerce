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
        $this->load->model("userdb");
        $this->model = new userModel();
    }



    public function user_list()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;

        $data['userList'] = $this->model->userList();

        //easy::out($data['productList']);

        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("user_list", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
