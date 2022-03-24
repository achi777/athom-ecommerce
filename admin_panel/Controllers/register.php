<?php
class Controller extends init
{
    public $model;
    public $shopModel;
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
        $this->shopModel = new Model();

        $this->load->model("userdb");
        $this->model = new userModel();
    }



    public function register()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $nav[] = new stdClass;
        $nav[0]->name = "Register";
        $nav[0]->url = baseurl . "/register";

        $data['nav'] = json_encode($nav);

        $header_data['title'] = "AO Framework Project || Login";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['tree'] = $this->shopModel->product_tree();
        $data['response'] = "No Account? Register";

        if (!empty($this->input->post("email")) && !empty($this->input->post("password"))) {
            if (!empty($this->model->check_user($this->input->post('email')))) {
                $data['response'] = "This email already in use!";
                //exit();
            }
            if ($this->input->post('password') == $this->input->post('rpassword')) {
                $res = $this->model->registration(
                    $this->input->post('email'),
                    md5($this->input->post('password')),
                    $this->input->post('firstname'),
                    $this->input->post('lastname'),
                    $this->input->post('phone')
                );
                $_SESSION['userID'] = $res;
                $this->helper->redirect(baseurl);
            } else {
                $data['response'] = "Password confirmation is incorrect!";
                //exit();
            }
        }

        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("register", $data);
        $this->load->view("footer", $data);
        /******************************************/

        $this->load->template_end();
    }
}
