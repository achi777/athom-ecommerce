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


    public function delete_photo()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $photoID = $this->helper->segment(3);
        $photo = $this->model->photoByID($photoID);
        $photo = json_decode($photo);
        $productID = $photo[0]->product_id;
        $photoName = $photo[0]->photo_url;

        //easy::out($data['productDetails']);
        if (!empty($photoID)) {
            if (file_exists("assets/images/products/" . $photoName)) {
                unlink("assets/images/products/" . $photoName);
            }
            $this->model->deletePhoto($photoID);
            $this->helper->redirect(baseurl . "/admin/edit_product/" . $productID);
        }
    }
}
