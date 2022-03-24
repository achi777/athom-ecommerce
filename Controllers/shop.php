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



    public function shop()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->model->contact();
        $nav[] = new stdClass;
        $nav[0]->name = "Shop";
        $nav[0]->url = baseurl."/shop";

        $data['nav'] = json_encode($nav);
        $data['infoCats'] = $this->infoModel->postCats();
        if(!empty($this->helper->segment(2) && $this->helper->segment(2) != 0)){
            $catID = $this->convert->to_int($this->helper->segment(2));
        }else{
            $catID = 1;
        }
        if(!empty($this->helper->segment(3) && $this->helper->segment(3) != 0)){
            $colorID = $this->convert->to_int($this->helper->segment(3));
        }else{
            $colorID = "x";
        }
        if(!empty($this->helper->segment(4) && $this->helper->segment(4) != 0)){
            $sizeID = $this->convert->to_int($this->helper->segment(4));
        }else{
            $sizeID = "x";
        }
        if(!empty($this->helper->segment(5) && $this->helper->segment(5) != 0)){
            $priceRange = $this->convert->to_int($this->helper->segment(5));
        }else{
            $priceRange = "x";
        }
        if(!empty($this->helper->segment(6)) && $this->helper->segment(6) != 0){
            $brandID = $this->convert->to_int($this->helper->segment(6));
        }else{
            $brandID = "x";
        }
        if(!empty($this->helper->segment(7)) && $this->helper->segment(7) != 0){
            $ord = $this->convert->to_int($this->helper->segment(7));
        }else{
            $ord = "1";
        }
        if(!empty($this->helper->segment(8)) && $this->helper->segment(8) != "x"){
            $search = urldecode($this->helper->segment(8));
        }else{
            $search = "x";
        }
        //echo urldecode($_SERVER['REQUEST_URI']);

        $catalog = $this->model->catByID($catID);
        $catalog = json_decode($catalog);
        $currentCat = 0;
        if(@$catalog[0]->cat_parent_id == 0){
            $currentCat = 0; // if category is main
        }else{
            $currentCat = 1; // if category is sub
        }

        $params[] = new stdClass;
        $params[0]->brandID = $brandID;
        $params[0]->colorID = $colorID;
        $params[0]->sizeID = $sizeID;
        $params[0]->priceRange = $priceRange;
        $params[0]->catID = $catID;
        $params[0]->controller = $controller;
        $params[0]->catType = $currentCat;
        $params[0]->ord = $ord;
        $params[0]->search = $search;

        if(empty($this->helper->segment(2)) || empty($this->helper->segment(3)) || empty($this->helper->segment(4)) || empty($this->helper->segment(5)) || empty($this->helper->segment(6)) || empty($this->helper->segment(7)) || empty($this->helper->segment(8))){
            $this->helper->redirect(baseurl."/".$controller."/".$catID."/".$colorID."/".$sizeID."/".$priceRange."/".$brandID."/".$ord."/".$search."/");
        }
        //http://192.168.64.2/shop/11/1/1/9999/1/


        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['productList'] = $this->model->productByParams($catID, $params);
        $data['productCatList'] = $this->model->catByID($catID);
        $data['subCatList'] = $this->model->catalogByID($catID);
        $data['colors'] = $this->model->colorList();
        $data['sizes'] = $this->model->sizes();
        $data['tree'] = $this->model->product_tree();
        $data['pagination'] = $this->model->pagination();
        $data['brandList'] = $this->model->brandList();
        $data['params'] = json_encode($params);
        

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
        $this->load->view("shop", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }


}