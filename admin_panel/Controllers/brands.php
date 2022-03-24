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


    public function brands()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;

        $data['brandList'] = $this->model->brandList();
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("brandName"))) {
            $brandLogo = easy::uuid().".jpg";
            $this->file->upload_path("assets/images/brands/");
            $this->file->upload_ext("jpg");
            $this->file->upload_ext("png");
            $this->file->upload_ext("jepg");
            $this->file->upload_size(20);
            $this->file->upload_name($brandLogo);
            $this->file->upload($this->input->file("file"));
            $this->model->addBrand($this->input->post("brandName"), $brandLogo);
            //$this->helper->redirect(baseurl . "/admin/brands/");
            $_POST = array();
        } 

        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("brands", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }

    public function uploadPhoto($photo)
    {
        $this->file->upload_path("assets/images/brands/");
        $this->file->upload_ext("jpg");
        $this->file->upload_ext("png");
        $this->file->upload_ext("jepg");
        $this->file->upload_size(20);
        $fileType = explode("/", $photo['type']);
        $fileName = easy::uuid() . "." . $fileType[1];
        $this->file->upload_name($fileName);
        $this->file->upload($photo);
        $target = "assets/images/brands/" . $fileName;
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
        $newImage = imagecreatetruecolor(100, 74);
        $bgcolor = imagecolorallocate($newImage, 255, 255, 255);
        imagefill($newImage, 0, 0, $bgcolor);       // use this if you want to have a white background instead of black


        // we check tha width and height and then we crop the image to the center
        if ($oldHeight < $oldWidth) {
            $newImageHeight = 74;
            $newImageWidth = ceil((100 * $oldWidth) / $oldHeight);
            imagecopyresampled($newImage, $source, -ceil(($newImageWidth - 100) / 2), 0, 0, 0, $newImageWidth, $newImageHeight, $oldWidth, $oldHeight);
        } else {
            $newImageHeight = ceil((74 * $oldHeight) / $oldWidth);
            $newImageWidth = 100;
            imagecopyresampled($newImage, $source, 0, -ceil(($newImageHeight - 74) / 2), 0, 0, $newImageWidth, $newImageHeight, $oldWidth, $oldHeight);
        }

        //we save the image as jpg resized to 110x110 px and cropped to the center. the old image will be replaced
        imagejpeg($newImage, $image, 72);

        return $image;
    }
}
