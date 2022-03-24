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
        $this->load->model("infodb");
        $this->model = new infoModel();
    }


    public function delete_post()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $postID = $this->convert->to_int($this->helper->segment(3));
        $postData = $this->model->postByID($postID);
        $postData = json_decode($postData);

        //easy::out($brandData);
        if ($postID > 0) {
            //echo baseurl."/assets/images/blog/".$brandData[0]->brand_logo;
            if(file_exists("assets/images/blog/".$postData[0]->photo)){
               unlink("assets/images/blog/".$postData[0]->photo); 
            }      
            $this->model->deleteFromBase($postID);
            $this->helper->redirect(baseurl . "/admin/post_list/");
        }
    }
}
