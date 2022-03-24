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



    public function combos()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $catID = 0;
        $comboCode = $this->helper->segment(3);
        if(empty($comboCode)){
            $comboCode = easy::uuid();
        }
        $data['catID'] = $catID;
        $data['comboList'] = $this->model->comboLst();
        $data['productList'] = $this->model->productListForCombo($catID);
        //easy::out($data['comboList']);
        if(!empty($_POST['check_list'])) {
            foreach($_POST['check_list'] as $check) {
                    $this->model->addCombo($check, $comboCode); 
            }
            $this->helper->redirect(baseurl."/admin/combos");
        }
        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("combos", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
