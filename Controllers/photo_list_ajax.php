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



    public function photo_list_ajax()
    {
        $productID = $this->convert->to_int($this->helper->segment(2));
        $colorID = $this->convert->to_int($this->helper->segment(3));
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2019";
        $photoList = $this->model->photoList($productID, $colorID);

        easy::out($photoList);
        //easy::out($data['trendingProduct']);
        //easy::out($data['catalog']);
       // $data['randomPost'] = $this->model->randomPost();
       // $data['postList'] = $this->model->postList();
       // $data['pagination'] = $this->model->pagination();
        /******************************************/


    }
}