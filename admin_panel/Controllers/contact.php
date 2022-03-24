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


    public function contact()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;

        $data['contact'] = $this->model->contact();
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("email"))) {
            $this->model->updateContact(1, $this->input->post("address"), $this->input->post("phone"), $this->input->post("email"), $this->input->post("fb"), $this->input->post("twitter"), $this->input->post("instagram"), $this->input->post("youtube"));
            $this->helper->redirect(baseurl . "/admin/contact/");
            $_POST = array();
        } 

        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("contact", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
