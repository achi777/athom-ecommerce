<?php
class Controller extends init {
    public $model;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("userdb");
        $this->model = new userModel();

    }
    public function change_pass(){
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;

        if(!empty($this->input->post('password')) && !empty($this->input->post('rpassword'))){
            $this->model->changePass($_SESSION['userID'], $this->input->post('password'));
            $this->helper->redirect(baseurl."/admin");
        }
        
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("change_pass", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
}