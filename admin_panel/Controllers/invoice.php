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



    public function invoice()
    {
        $header_data['title'] = "AO Framework Project || Profile";
        if (!$_SESSION['userID'] > 0) {
            $this->helper->redirect(baseurl . "/login");
            exit();
        }



        $data['user_invoice'] = $this->model->invoice($this->convert->to_int($this->helper->segment(2)));
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        //$this->load->view("header",$data);
        $this->load->view("invoice", $data);
        //$this->load->view("footer");
        /******************************************/

        $this->load->template_end();
    }
}
