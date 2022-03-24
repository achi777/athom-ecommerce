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


    public function shop_cat()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $catID = $this->convert->to_int($this->helper->segment(3));
        $data['catID'] = $catID;
        $data['tree'] = $this->model->cat_tree();
        if (!empty($this->input->post("product_cat_name_geo_add"))) {
            $this->model->add_product_cat($catID, $this->input->post("product_cat_name_geo_add"), $this->input->post("product_cat_name_eng_add"), $this->input->post("product_cat_name_rus_add"), $this->input->file("file"));
        }
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("add_cat"))) {
            //$productID = $this->model->productInsertBase($catID,  $this->input->post("brandID"), $this->input->post("product_name_geo"), $this->input->post("product_name_eng"), $this->input->post("product_name_rus"), $this->input->post("product_desc_geo"), $this->input->post("product_desc_eng"), $this->input->post("product_desc_rus"), $this->input->post("product_full_geo"), $this->input->post("product_full_eng"), $this->input->post("product_full_rus"), $this->input->post("product_price"), $this->input->post("product_sale"));
            $this->file->upload_path("uploads/");
            $this->file->upload_ext("jpg");
            $this->file->upload_ext("png");
            $this->file->upload_ext("jepg");
            $this->file->upload_size(20);
            $fileName = easy::uuid();
            $this->file->upload_name($fileName . ".jpg");
            $this->file->upload($this->input->file("file"));
            $target = "assets/images/featured-categories/" . $fileName;
            $this->resize($target, "jpg");

            $_POST = array();
            $this->helper->redirect(baseurl . "/admin/shop_cat/");
        }

        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("shop_cat", $data);
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
            $newImageHeight = 600;
            $newImageWidth = ceil((600 * $oldWidth) / $oldHeight);
            imagecopyresampled($newImage, $source, -ceil(($newImageWidth - 600) / 2), 0, 0, 0, $newImageWidth, $newImageHeight, $oldWidth, $oldHeight);
        } else {
            $newImageHeight = ceil((600 * $oldHeight) / $oldWidth);
            $newImageWidth = 600;
            imagecopyresampled($newImage, $source, 0, -ceil(($newImageHeight - 600) / 2), 0, 0, $newImageWidth, $newImageHeight, $oldWidth, $oldHeight);
        }

        //we save the image as jpg resized to 110x110 px and cropped to the center. the old image will be replaced
        imagejpeg($newImage, $image, 72);

        return $image;
    }
}
