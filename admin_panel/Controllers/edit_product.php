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


    public function edit_product()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $productID = $this->helper->segment(3);
        $data['productID'] = $productID;

        //$data['navigation'] = $this->model->navigation();
        //$data['tree'] = $this->model->product_tree();
        $data['productDetails'] = $this->model->productDetails($productID);
        $data['photoList'] = $this->model->photoList($productID);
        $data['colorList'] = $this->model->colorList();
        $data['brandList'] = $this->model->brandList();
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("add_product"))) {
            $this->model->productUpdateBase($productID, $this->input->post("brandID"), $this->input->post("product_name_geo"), $this->input->post("product_name_eng"), $this->input->post("product_name_rus"), $this->input->post("product_desc_geo"), $this->input->post("product_desc_eng"), $this->input->post("product_desc_rus"), $this->input->post("product_full_geo"), $this->input->post("product_full_eng"), $this->input->post("product_full_rus"), $this->input->post("product_price"), $this->input->post("product_sale"));

            if ($_FILES['files']['size'] != 0) {
                $error = array();
                $extension = array("jpeg", "jpg", "png", "gif");
                foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                    $file_name = $_FILES["files"]["name"][$key];
                    $file_tmp = $_FILES["files"]["tmp_name"][$key];
                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                    if (in_array($ext, $extension)) {
                        $filename = basename($file_name, $ext);
                        $newFileName = $filename . time() . "." . $ext;
                        $target =  "assets/images/products/" . $newFileName;
                        move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], $target);
                        //$this->resize($target,$ext);
                        // 600px x 600px
                        $this->file->MakeThumb($target, 600, 600, $newFileName, $ext, 72);

                        $this->model->insertPhotos($productID, $this->input->post("color"), $newFileName);
                    } else {
                        array_push($error, "$file_name, ");
                    }
                }
            }

            $_POST = array();
            $this->helper->redirect(baseurl . "/admin/edit_product/" . $productID);
        }

        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("edit_product", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
