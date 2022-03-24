<?php

class Controller extends init
{
    public $model;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        //define("", admin_panel);
        //$this->load->route = "admin_panel/";
        
        $this->load->model("maindb");
        $this->model = new Model();
    }


    public function admin()
    { 
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $nav[] = new stdClass;
        $nav[0]->name = "home";
        $nav[0]->url = baseurl."/main";
        @$nav[1]->name = "Details";
        $nav[1]->url = "";
        $data['nav'] = json_encode($nav);

        $productID = $this->convert->to_int($this->helper->segment(2));
        $header_data['title'] = "AO Framework Project || Details";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['tree'] = $this->model->product_tree();

        $data['productID'] = $productID;
        $data['productDetails'] = $this->model->productDetails($productID);
        $data['variationList'] = $this->model->variationList($productID);
        $data['colorList'] = $this->model->colorList();
        $data['colorPhotos'] = $this->model->colorPhotos($productID);


        //easy::out($data['colorList']);
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("details", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
}