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
    }



    public function callback()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        
        if (isset($_POST['order_id'])) {
            $order = $this->model->paymentByParams($_POST['order_id'], $_POST['payment_hash']);
            $order = json_decode($order);
            if ($order->pay_order_id == $_POST['order_id'] && $order->payment_hash == $_POST['payment_hash']) {
        
                $this->model->updatePayOrder($order->pay_order_id, $order->payment_hash);
                $this->model->updateOrder($order->payment_hash, 1);
        
                //When you receive a callback, you must return the corresponding HTTP code
                header("HTTP/1.1 200 Ok");
            } else {
                $this->model->updateOrder($order->payment_hash, 2);
                header("HTTP/1.0 404 Not Found");
            }
        }


    }

}