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


    public function delete_post_cat()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $catID = $this->convert->to_int($this->helper->segment(3));
        $postData = $this->model->postList($catID);
        $postData = json_decode($postData);

        //easy::out($brandData);
        if ($catID > 0) {
            if(is_array($postData)){
                foreach($postData AS $item){
                    if(file_exists("assets/images/blog/".$postData[0]->photo)){
                        unlink("assets/images/blog/".$postData[0]->photo); 
                    } 
                }
            }
            
            $this->model->deleteCat($catID);
            $this->helper->redirect(baseurl . "/admin/post_cats/");
        }
    }
}
