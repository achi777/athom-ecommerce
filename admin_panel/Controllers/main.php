<?php

class Controller extends init
{
    public $model;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***Authorizarion****/
        if($_SESSION['status'] != "admin"){
            $this->helper->redirect(baseurl."/admin/login");
            exit();
        }
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->model = new Model();
    }



    public function main()
    {
        $data['controller'] = "main";
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $year = date("Y");
        $res = $this->model->orderList($year."-01-");
        $res = json_decode($res);
        $data['jan'] = @count($res);
        $res = $this->model->orderList($year."-02-");
        $res = json_decode($res);
        $data['feb'] = @count($res);
        $res = $this->model->orderList($year."-03-");
        $res = json_decode($res);
        $data['mar'] = @count($res);
        $res = $this->model->orderList($year."-04-");
        $res = json_decode($res);
        $data['apr'] = @($res);
        $res = $this->model->orderList($year."-05-");
        $res = json_decode($res);
        $data['may'] = @count($res);
        $res = $this->model->orderList($year."-06-");
        $res = json_decode($res);
        $data['jun'] = @count($res);
        $res = $this->model->orderList($year."-07-");
        $res = json_decode($res);
        $data['jul'] = @count($res);
        $res = $this->model->orderList($year."-08-");
        $res = json_decode($res);
        $data['aug'] = @count($res);
        $res = $this->model->orderList($year."-09-");
        $res = json_decode($res);
        $data['sep'] = @count($res);
        $res = $this->model->orderList($year."-10-");
        $res = json_decode($res);
        $data['oct'] = @count($res);
        $res = $this->model->orderList($year."-11-");
        $res = json_decode($res);
        $data['noe'] = @count($res);
        $res = $this->model->orderList($year."-12-");
        $res = json_decode($res);
        $data['dec'] = @count($res);

        $data['orders'] = $this->model->ordersAll();
        $data['orderStats'] = $this->model->orderStats();
        $data['compledOrders'] = $this->model->compledOrders();
        $data['currentOrders'] = $this->model->currentOrders();
        //var_dump($data['specialOffer']);
        //easy::out($data['mar']);
        //easy::out($data['catalog']);
       // $data['randomPost'] = $this->model->randomPost();
       // $data['postList'] = $this->model->postList();
       // $data['pagination'] = $this->model->pagination();
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("main", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
}