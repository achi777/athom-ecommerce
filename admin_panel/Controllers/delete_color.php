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


    public function delete_color()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $colorID = $this->helper->segment(3);

        //easy::out($data['productDetails']);
        if (!empty($colorID)) {
            $this->model->deleteColor($colorID);
            $this->helper->redirect(baseurl . "/admin/colors/");
        }
    }
}
