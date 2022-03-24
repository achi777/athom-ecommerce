<?php
class Controller extends init
{
    public $model;
    public $shopModel;
    public $infoModel;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->shopModel = new Model();

        $this->load->model("userdb");
        $this->model = new userModel();

        $this->load->model("infodb");
        $this->infoModel = new infoModel();
    }



    public function register()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->shopModel->contact();
        $nav[] = new stdClass;
        $nav[0]->name = "Register";
        $nav[0]->url = baseurl."/register";

        $data['nav'] = json_encode($nav);
        $data['infoCats'] = $this->infoModel->postCats();
        $header_data['title'] = "AO Framework Project || Login";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['tree'] = $this->shopModel->product_tree();
        $data['response'] = "No Account? Register";

        if(!empty($this->input->post("email")) && !empty($this->input->post("password"))){
            if(!empty($this->model->check_user($this->input->post('email')))){
                $data['response'] = "This email already in use!";
                //exit();
            }
            if($this->input->post('password') == $this->input->post('rpassword')){
                $res = $this->model->registration($this->input->post('email'),md5($this->input->post('password')),
                    $this->input->post('firstname'),$this->input->post('lastname'),$this->input->post('phone'));
                $_SESSION['userID'] = $res;
                $this->helper->redirect(baseurl);
            }else{
                $data['response'] = "Password confirmation is incorrect!";
                //exit();
            }


        }

        $data['catalog'] = $this->shopModel->catalog();
        $data['catalogSub'] = $this->shopModel->catalogSub();
        $data['searchData'] = $this->shopModel->searchProduct();
        $catalog = json_decode($data['catalog']);
        $menus[] = new stdClass;
        $j = 0;
        if (is_array($catalog)) {
            foreach ($catalog as $item) {
                @$menus[$j]->menu = @$this->shopModel->productTreeByID($item->cat_id);
                $j++;
            }
        }

        //var_dump($menus);
        $data['menus'] = json_encode($menus);
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