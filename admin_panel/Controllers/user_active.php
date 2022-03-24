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



    public function user_active()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $userID = $this->helper->segment(3);
        $active = $this->helper->segment(4);
        $this->model->userActive($userID, $active);
        $this->helper->redirect(baseurl."/admin/user_list");

    }
}
