<?php
class Controller extends init
{
    public $model;
    public $infoModel;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("userdb");
        $this->model = new userModel();
        $this->load->model("infodb");
        $this->infoModel = new infoModel();
    }



    public function change_password()
    {
       
        $header_data['title'] = "AO Framework Project || Login";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['infoCats'] = $this->infoModel->postCats();
        $data['tree'] = $this->model->product_tree();
        $data['response'] = "Change your Password";
        $userID = $this->helper->segment(2);
        $old_pass = $this->helper->segment(3);
        $userdata = $this->model->check_forget($userID,$old_pass);
        $userdata = json_decode($userdata);
        $data['response'] = "Change your password";

        if(!empty($this->input->post("password")) && !empty($this->input->post("rpassword"))){         
       
            if(($this->input->post("password") == $this->input->post("rpassword")) && ($old_pass == $userdata[0]->password)){
                $this->model->change_pass($userID,$this->input->post("password"));
                $_SESSION['userID'] = $userdata[0]->user_id;
                $this->helper->redirect(baseurl);
            }else{
                $data['response'] = "Password is incorrect";
            }
            
        }

        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("change_password", $data);
        $this->load->view("footer", $data);
        /******************************************/
    
        $this->load->template_end();

    }
}
