<?php

class Controller extends init
{
    public $model;
    public $infoModel;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->model = new Model();
        $this->load->model("infodb");
        $this->infoModel = new infoModel();
    }



    public function wishlist()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->model->contact();
        $nav[] = new stdClass;
        $nav[0]->name = "Shop";
        $nav[0]->url = baseurl."/shop";
        @$nav[1]->name = "Wishlist";
        $nav[1]->url = "";
        $data['nav'] = json_encode($nav);
        $data['infoCats'] = $this->infoModel->postCats();
        /* cmd values (1 = Delete, 2 = empty, 3 = get withlist info)*/
        $cmd = $this->convert->to_int($this->helper->segment(2));
        $productID = $this->convert->to_int($this->helper->segment(3));
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $product = $this->model->productWishlist($productID);

        $header_data['title'] = "AO Framework Project";
        $data['tree'] = $this->model->product_tree();
        $data['copyright'] = "© Archil Odishelidze 2021";


        $product = json_decode($product);

        switch($cmd){
            case "1":
                if(!empty($_SESSION["wishlist_item"])) {
                    foreach($_SESSION["wishlist_item"] as $k => $v) {
                        if($productID == $v->product_id){
                            unset($_SESSION["wishlist_item"]->$k);
                        }				
                        if(empty($_SESSION["wishlist_item"])){
                            unset($_SESSION["wishlist_item"]);
                        }
                    }
                }
                $this->helper->redirect(baseurl."/wishlist");
                $this->out();
                break;
            case "2":
                unset($_SESSION["wishlist_item"]);
                break; 
            default:
                if(!empty($_SESSION["wishlist_item"])) {
                    $result = $_SESSION["wishlist_item"];
                    $data['result'] = json_encode($this->convert->arrayToObject($result));
                }else{
                    $response["status"] = "empty"; 
                    $result = (object)$response;
                    $data['result'] = json_encode($this->convert->arrayToObject($result));
                }
               

        }

        $data['catalog'] = $this->model->catalog();
        $data['catalogSub'] = $this->model->catalogSub();
        $data['searchData'] = $this->model->searchProduct();
        $catalog = json_decode($data['catalog']);
        $menus[] = new stdClass;
        $j = 0;
        if (is_array($catalog)) {
            foreach ($catalog as $item) {
                @$menus[$j]->menu = @$this->model->productTreeByID($item->cat_id);
                $j++;
            }
        }

        //var_dump($menus);
        $data['menus'] = json_encode($menus);
  
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("wishlist", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
    public function out(){
        if(!empty($_SESSION["wishlist_item"])) {
            $result = $_SESSION["wishlist_item"];
            $data['result'] = $result;
        }else{
            $response["status"] = "empty"; 
            $result = (object)$response;
            //var_dump($result);
            $data['result'] = json_encode($result);
        }
    }
}