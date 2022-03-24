<?php
class Controller extends init
{
    public $model;
    public $shopModel;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("userdb");
        $this->model = new userModel();
    }



    public function login()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;

        $header_data['title'] = "AO Framework Project || Login";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['response'] = "Login Now";

        if(!empty($this->input->post("username")) && !empty($this->input->post("password"))){
            $res = $this->model->login($this->input->post("username"), $this->input->post("password"));
            //easy::out($res);
            $res = json_decode($res);
            //easy::out($res);
            //var_dump($res);
            if(!empty($res[0]->status) && $res[0]->status == "admin"){
                $data['response'] = "Success";
                $_SESSION['userID'] = $res[0]->user_id;
                $_SESSION['status'] = "admin";
                $this->helper->redirect(baseurl."/admin");
            }else{
                $data['response'] = "Username or Password is incorrect";
            }
            
        }

        /******************************************/
        //$this->load->template_start($header_data);
        /******************************************/
        //$this->load->view("header", $data);
        $this->load->view("login", $data);
        //$this->load->view("footer", $data);
        /******************************************/
    
        //$this->load->template_end();

    }
}