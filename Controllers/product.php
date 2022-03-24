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



    public function product()
    {
        $data['controller'] = "main";
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['contact'] = $this->model->contact();
        $data['catalog'] = $this->model->catalog();
        $data['catalogSub'] = $this->model->catalogSub();
        $data['trendingProduct'] = $this->model->trendingProduct();
        $data['bannerProduct'] = $this->model->bannerProduct();
        $data['specialOffer'] = $this->model->productSpecialOffer();
        $data['productBestSale'] = $this->model->productBestSale();
        $data['bestSellers'] = $this->model->productBestSellers();
        $data['productNewArrival'] = $this->model->productNewArrival();
        $data['productTopRated'] = $this->model->productTopRated();
        $data['tree'] = $this->model->product_tree();
        $data['infoCats'] = $this->infoModel->postCats();
        
        //var_dump($data['specialOffer']);
        //easy::out($data['trendingProduct']);
        //easy::out($data['catalog']);
       // $data['randomPost'] = $this->model->randomPost();
       // $data['postList'] = $this->model->postList();
       // $data['pagination'] = $this->model->pagination();
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("product", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
}