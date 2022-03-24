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
        $this->load->model("maindb");
        $this->shopModel = new Model();
        $this->load->model("userdb");
        $this->model = new userModel();
    }



    public function forgot_password()
    {

        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->model->contact();
        $nav[] = new stdClass;
        $nav[0]->name = "Forgot Password";
        $nav[0]->url = "";

        $data['nav'] = json_encode($nav);

        $header_data['title'] = "AO Framework Project || Login";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['tree'] = $this->shopModel->product_tree();
        $data['response'] = "Forgot Your Password";


        if(!empty($this->input->post("email"))){
            if(empty($this->model->check_user($this->input->post('email')))){
                $data['response'] = "This email not is registered!";
            }
            $res = $this->model->check_user($this->input->post('email'));
            $res = json_decode($res);
            $data['response'] = "Password recovery url is sent to your email!";
            $text = "	<center> 
                            <b>Hello</b> <br> 
                            <font color=\"red\">Open this url for recovery your password</font> <br> 
                            <a href=\"".baseurl."/change_password/".$res[0]->user_id."/".$res[0]->password."\">* Change your Password </a> 
                        </center> 
                        <br><br>";
            $this->send->sendMail($this->input->post('email'), "", "support@dressio.ge", "Recovery your password", $text);
            //$this->url->redirect(baseurl."/change_pass");
            //echo $text;
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
        $this->load->view("forgot_password", $data);
        $this->load->view("footer", $data);
        /******************************************/
    
        $this->load->template_end();

    }
}

