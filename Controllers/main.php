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



    public function main()
    {
        $data['controller'] = "main";
        $data['contact'] = $this->model->contact();
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['catalog'] = $this->model->catalog();
        $data['catalogSub'] = $this->model->catalogSub();
        $data['trendingProduct'] = $this->model->trendingProduct();
        $data['bannerProduct'] = $this->model->bannerProduct();
        $data['specialOffer'] = $this->model->productSpecialOffer();
        $data['productBestSale'] = $this->model->productBestSale();
        $data['bestSellers'] = $this->model->productBestSellers();
        $data['productNewArrival'] = $this->model->productNewArrival();
        $data['productTopRated'] = $this->model->productTopRated();
        $data['brandList'] = $this->model->brandList();
        $data['tree'] = $this->model->product_tree();
        $data['infoCats'] = $this->infoModel->postCats();
        $data['lastPosts'] = $this->infoModel->lastPost();
        $data['sizes'] = $this->model->sizes();

        $data['searchData'] = $this->model->searchProduct();

        //var_dump($data['specialOffer']);
        //easy::out($data['infoCats']);
        //easy::out($data['catalog']);
        // $data['randomPost'] = $this->model->randomPost();
        // $data['postList'] = $this->model->postList();
        // $data['pagination'] = $this->model->pagination();
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
        $this->load->view("old_header", $data);
        $this->load->view("main", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
