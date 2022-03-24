<?php

class Controller extends init
{
    public $infoModel;
    public $shopModel;
    public $errors;

    public function __construct()
    {
        parent::__construct();
    }



    public function lang_switcher()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        if (!empty($this->helper->segment(2))) {
            $lang = (string)$this->helper->segment(2);
            $_SESSION['lang'] = $lang;
            header("location: " . @$_SERVER['HTTP_REFERER']);
            die();
        } elseif (!isset($_SESSION['lang'])) {
            $lang = 'geo';
            $_SESSION['lang'] = "geo";
        } else {
            $lang = $_SESSION['lang'];
        }
        $this->url->redirect($this->helper->baseurl());

    }
}