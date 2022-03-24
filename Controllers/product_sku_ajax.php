<?php

class Controller extends init
{
    public $model;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->model = new Model();
        header('Content-Type: application/json; charset=utf-8');
    }



    public function product_sku_ajax()
    {
        $productID = $this->convert->to_int($this->helper->segment(2));
        $colorID = $this->convert->to_int($this->helper->segment(3));
        $sizeID = $this->convert->to_int($this->helper->segment(4));
        $variation = $this->model->variationByOPT($productID, $colorID, $sizeID);
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2019";

        easy::out($variation);


    }
}