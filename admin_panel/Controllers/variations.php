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
        $this->load->model("maindb");
        $this->model = new Model();
    }


    public function variations()
    {
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        $productID = $this->helper->segment(3);
        $data['productID'] = $productID;

        //$data['navigation'] = $this->model->navigation();
        //$data['tree'] = $this->model->product_tree();
        $data['variationList'] = $this->model->variationList($productID);
        $data['sizeList'] = $this->model->sizeList();
        $data['colorList'] = $this->model->colorList();
        //easy::out($data['productDetails']);
        if (!empty($this->input->post("colorID")) && !empty($this->input->post("sizeID")) && !empty($this->input->post("barCode")) && !empty($this->input->post("sku"))) {
            $this->model->addVariation($productID, $this->input->post("colorID"), $this->input->post("sizeID"), $this->input->post("barCode"), $this->input->post("sku"));
            $this->helper->redirect(baseurl . "/admin/variations/" . $productID);
            $_POST = array();
        } elseif (!empty($this->input->post("update")) && !empty($this->input->post("sku")) && !empty($this->input->post("variationID"))) {
            $this->model->editVariation($this->input->post("variationID"), $this->input->post("sku"));
            $this->helper->redirect(baseurl . "/admin/variations/" . $productID);
            $_POST = array();
        }

        //var_dump($data['productList']);
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("variations", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}
