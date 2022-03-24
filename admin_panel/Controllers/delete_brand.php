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


    public function delete_brand()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $brandID = $this->convert->to_int($this->helper->segment(3));
        $brandData = $this->model->brandbyID($brandID);
        $brandData = json_decode($brandData);

        //easy::out($brandData);
        if ($brandID > 0) {
            //echo baseurl."/assets/images/brands/".$brandData[0]->brand_logo;
            if(file_exists("assets/images/brands/".$brandData[0]->brand_logo)){
               unlink("assets/images/brands/".$brandData[0]->brand_logo); 
            }      
            $this->model->deleteBrand($brandID);
            $this->helper->redirect(baseurl . "/admin/brands/");
        }
    }
}
