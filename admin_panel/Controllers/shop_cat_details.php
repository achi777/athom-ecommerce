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


    public function shop_cat_details()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $catID = $this->convert->to_int($this->helper->segment(3));
        $data['catID'] = $catID;
        $active = $this->helper->segment(4);
        $cmd = $this->helper->segment(5);
        $data['active'] = $active;
        $data['tree'] = $this->model->cat_tree();
        $data['details'] = $this->model->product_cat_with_id($catID);
        $details = json_decode($data['details']);

        if (!empty($this->input->post("product_cat_name_geo_up"))) {
            if ($details[0]->cat_parent_id == 0) {
                if ($_FILES['cat_photo']['size'] > 0) {
                    $photo = $this->uploadPhoto($this->input->file("cat_photo"));
                    $this->model->up_product_cat($catID, $this->input->post("product_cat_name_geo_up"), $this->input->post("product_cat_name_eng_up"), $this->input->post("product_cat_name_rus_up"), $photo);
                } else {
                    $this->model->up_product_cat_nophoto($catID, $this->input->post("product_cat_name_geo_up"), $this->input->post("product_cat_name_eng_up"), $this->input->post("product_cat_name_rus_up"));
                }
            } else {
                $photo = "";
                $this->model->up_product_cat($catID, $this->input->post("product_cat_name_geo_up"), $this->input->post("product_cat_name_eng_up"), $this->input->post("product_cat_name_rus_up"), $photo);
            }
            $_POST = array();
            //$this->helper->redirect(baseurl . "/admin/shop_cat/");
        } elseif (!empty($this->input->post("product_cat_name_geo_add"))) {
            if ($catID == 0) {
                $photo = $this->uploadPhoto($this->input->file("cat_photo"));
                $this->model->add_product_cat($catID, $this->input->post("product_cat_name_geo_add"), $this->input->post("product_cat_name_eng_add"), $this->input->post("product_cat_name_rus_add"), $photo);
            } else {
                $photo = "";
                $this->model->add_product_cat($catID, $this->input->post("product_cat_name_geo_add"), $this->input->post("product_cat_name_eng_add"), $this->input->post("product_cat_name_rus_add"), $photo);
            }
            $_POST = array();
            //$this->helper->redirect(baseurl . "/admin/shop_cat/");
        } elseif ($cmd == "active") {
            //echo $cmd;
            //$this->model->disableCat($catID, $active);
            //echo "<script>window.location.href='".baseurl."/admin/shop_cat_details/".$catID."'</script>";
            //unset($cmd);
            //$this->helper->redirect(baseurl."/admin/shop_cat_details/".$catID);

        }
        //easy::out($data['productDetails']);


        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("shop_cat_details", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }

    public function uploadPhoto($photo)
    {
        $this->file->upload_path("assets/images/featured-categories/");
        $this->file->upload_ext("jpg");
        $this->file->upload_ext("png");
        $this->file->upload_ext("jepg");
        $this->file->upload_size(20);
        $fileType = explode("/", $photo['type']);
        $fileName = easy::uuid() . "." . $fileType[1];
        $this->file->upload_name($fileName);
        $this->file->upload($photo);
        $target = "assets/images/featured-categories/" . $fileName;
        //echo $target;
        $this->resize($target, $fileType[1]);
        return $fileName;
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
        $newImage = imagecreatetruecolor(201, 199);
        $bgcolor = imagecolorallocate($newImage, 255, 255, 255);
        imagefill($newImage, 0, 0, $bgcolor);       // use this if you want to have a white background instead of black


        // we check tha width and height and then we crop the image to the center
        if ($oldHeight < $oldWidth) {
            $newImageHeight = 190;
            $newImageWidth = ceil((192 * $oldWidth) / $oldHeight);
            imagecopyresampled($newImage, $source, -ceil(($newImageWidth - 192) / 2), 0, 0, 0, $newImageWidth, $newImageHeight, $oldWidth, $oldHeight);
        } else {
            $newImageHeight = ceil((190 * $oldHeight) / $oldWidth);
            $newImageWidth = 192;
            imagecopyresampled($newImage, $source, 0, -ceil(($newImageHeight - 190) / 2), 0, 0, $newImageWidth, $newImageHeight, $oldWidth, $oldHeight);
        }

        //we save the image as jpg resized to 110x110 px and cropped to the center. the old image will be replaced
        imagejpeg($newImage, $image, 72);

        return $image;
    }
}
