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


    public function edit_post()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $postID = $this->convert->to_int($this->helper->segment(3));
        $data['postID'] = $postID;
        $catID = $this->convert->to_int($this->helper->segment(4));
        $data['catID'] = $catID;
        $data['postCats'] = $this->model->postCats();
        $data['post'] = $this->model->postByID($postID);
        $post = $this->model->postByID($postID);
        //$data['navigation'] = $this->model->navigation();
        //$data['tree'] = $this->model->product_tree();
        $post = json_decode($post);
        //var_dump($post);
        if($catID == 0){
            $newCatID = $post[0]->cat_id;
        }else{
            $newCatID = $catID;
        }

        //easy::out($data['productDetails']);
        if (!empty($this->input->post("editPost"))) {
            $postDate = Date("Y-m-d H:i:s");

            if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){
                $photo = easy::uuid().".jpg";
                $this->file->upload_path("assets/images/blog/");
                $this->file->upload_ext("jpg");
                $this->file->upload_ext("png");
                $this->file->upload_ext("jepg");
                $this->file->upload_size(20);
                $this->file->upload_name($photo);
                $this->file->upload($this->input->file("file"));
                $this->model->infoUpdateBaseWithPhoto($postID, $this->input->post("titleGeo"), $this->input->post("titleEng"), $this->input->post("titleRus"), $this->input->post("descriptionGeo"), $this->input->post("descriptionEng"), $this->input->post("descriptionRus"), $this->input->post("detailsGeo"), $this->input->post("detailsEng"), $this->input->post("detailsRus"), $newCatID, $postDate, $photo);
            }else{
                $this->model->infoUpdateBase($postID, $this->input->post("titleGeo"), $this->input->post("titleEng"), $this->input->post("titleRus"), $this->input->post("descriptionGeo"), $this->input->post("descriptionEng"), $this->input->post("descriptionRus"), $this->input->post("detailsGeo"), $this->input->post("detailsEng"), $this->input->post("detailsRus"), $newCatID, $postDate);
            }


            $_POST = array();
            $this->helper->redirect(baseurl . "/admin/edit_post/" . $postID);
        }

        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("edit_post", $data);
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
