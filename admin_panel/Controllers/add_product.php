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


    public function add_product()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $catID = $this->helper->segment(3);
        $data['catID'] = $catID;
        $data['brandList'] = $this->model->brandList();
        //$data['navigation'] = $this->model->navigation();
        //$data['tree'] = $this->model->product_tree();

        $data['colorList'] = $this->model->colorList();
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("add_product"))) {
            $productID = $this->model->productInsertBase($catID,  $this->input->post("brandID"), $this->input->post("product_name_geo"), $this->input->post("product_name_eng"), $this->input->post("product_name_rus"), $this->input->post("product_desc_geo"), $this->input->post("product_desc_eng"), $this->input->post("product_desc_rus"), $this->input->post("product_full_geo"), $this->input->post("product_full_eng"), $this->input->post("product_full_rus"), $this->input->post("product_price"), $this->input->post("product_sale"));

            if ($_FILES['files']['size'] != 0 && intval($productID) > 0) {
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
                        $this->resize($target, $ext);
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
        $this->load->view("add_product", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }

    public function getHeight($image)
    {
        $sizes = getimagesize($image);
        $height = $sizes[1];
        return $height;
    }

    public function getWidth($image)
    {
        $sizes = getimagesize($image);
        $width = $sizes[0];
        return $width;
    }


    public function resize($image, $ext)
    {
        //chmod($image, 0777);
        $oldHeight = $this->getHeight($image);
        $oldWidth = $this->getWidth($image);
        switch ($ext) {
            case "jpg";
                $source = imagecreatefromjpeg($image);
                break;
            case "jpeg";
                $source = imagecreatefromjpeg($image);
                break;

            case "gif";
                $source = imagecreatefromgif($image);
                break;

            case "png";
                $source = imagecreatefrompng($image);
                break;
        }
        $newImage = imagecreatetruecolor(600, 600);
        $bgcolor = imagecolorallocate($newImage, 255, 255, 255);
        imagefill($newImage, 0, 0, $bgcolor);       // use this if you want to have a white background instead of black


        // we check tha width and height and then we crop the image to the center
        if ($oldHeight < $oldWidth) {
            $newImageHeight = 500;
            $newImageWidth = ceil((500 * $oldWidth) / $oldHeight);
            imagecopyresampled($newImage, $source, -ceil(($newImageWidth - 500) / 2), 0, 0, 0, $newImageWidth, $newImageHeight, $oldWidth, $oldHeight);
        } else {
            $newImageHeight = ceil((500 * $oldHeight) / $oldWidth);
            $newImageWidth = 500;
            imagecopyresampled($newImage, $source, 0, -ceil(($newImageHeight - 500) / 2), 0, 0, $newImageWidth, $newImageHeight, $oldWidth, $oldHeight);
        }

        //we save the image as jpg resized to 110x110 px and cropped to the center. the old image will be replaced
        imagejpeg($newImage, $image, 72);

        return $image;
    }
}
