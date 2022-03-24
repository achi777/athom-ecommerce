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
        header('Content-Type: application/json; charset=utf-8');
    }



    public function search_ajax()
    {
        $controller = $this->helper->segment(1);


        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $word = $this->input->post("query");
        $search = $this->model->searchProduct($word);
        easy::out($search);

    }


}