<?php
/**
 * Created by PhpStorm.
 * User: archil
 * Date: 27.04.2021
 * Time: 12:33
 */
class Controller extends init {
    public $model;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("userdb");
        $this->model = new userModel();

    }
    public function logout(){
        session_destroy();
        $this->helper->redirect(baseurl);
        $this->load->view("header");
        //$this->load->view("corr_disp",$data);
        $this->load->view("footer");

    }
}