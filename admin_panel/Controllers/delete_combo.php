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


    public function delete_combo()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $comboCode = $this->helper->segment(3);
        $productID = $this->helper->segment(4);

        //easy::out($data['productDetails']);
        if (!empty($productID)) {
            $this->model->deleteCombo($productID, $comboCode);
            $this->helper->redirect(baseurl . "/admin/combos/");
        }
    }
}
