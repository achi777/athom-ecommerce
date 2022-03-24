<?php
class Controller extends init
{
    public $model;
    public $shopModel;
    public $infoModel;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->shopModel = new Model();

        $this->load->model("userdb");
        $this->model = new userModel();

        $this->load->model("infodb");
        $this->infoModel = new infoModel();
    }



    public function login()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->shopModel->contact();
        $nav[] = new stdClass;
        $nav[0]->name = "Login";
        $nav[0]->url = baseurl . "/Login";
        $data['nav'] = json_encode($nav);
        $header_data['title'] = "AO Framework Project || Login";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['tree'] = $this->shopModel->product_tree();
        $data['infoCats'] = $this->infoModel->postCats();
        $data['response'] = "Login Now";

        if (!empty($this->input->post("email")) && !empty($this->input->post("password"))) {
            $res = $this->model->login($this->input->post("email"), $this->input->post("password"));
            //easy::out($res);
            $res = json_decode($res);
            if (!empty($res[0]->user_id) && $res[0]->user_status == 1) {
                $data['response'] = "Success";
                $_SESSION['userID'] = $res[0]->user_id;


                $userID = $_SESSION["userID"];
                
                $dbCart = $this->shopModel->checkCart($userID);
                $dbCart = json_decode($dbCart);
                $dbWish = $this->shopModel->checkWishlist($userID);
                $dbWish = json_decode($dbWish);
                if (!empty($_SESSION["cart_item"])) {
                    $result = $_SESSION["cart_item"];
                    if ($dbCart[0]->user_id > 0) {
                        if (!empty($dbCart[0]->data)) {
                            $newData = array_merge($_SESSION["cart_item"], json_decode($dbCart[0]->data));
                            $_SESSION["cart_item"] = $newData;
                            $this->shopModel->updateCart($userID, json_encode($newData));
                        } else {
                            $this->shopModel->updateCart($userID, json_encode($_SESSION["cart_item"]));
                        }
                    } else {
                        $this->shopModel->inserCart($userID, json_encode($result));
                    }
                } else {
                    $_SESSION["cart_item"] = json_decode($dbCart[0]->data);
                }
                
                /*wishlist*/
                
                if (!empty($_SESSION["wishlist_item"])) {
                    $wishResult = $_SESSION["wishlist_item"];

                    if ($dbWish[0]->user_id > 0) {
                        if (!empty($dbWish[0]->data)) {
                            $newData = array_merge($_SESSION["wishlist_item"], json_decode($dbWish[0]->data));
                            $_SESSION["wishlist_item"] = $newData;
                            $this->shopModel->updateWishlist($userID, json_encode($newData));
                        } else {
                            $this->shopModel->updateWishlist($userID, json_encode($_SESSION["wishlist_item"]));
                        }
                    } else {
                        $this->shopModel->inserWishlist($userID, json_encode($wishResult));
                    }
                } else {
                    $_SESSION["wishlist_item"] = json_decode($dbWish[0]->data);
                }
                

                $this->helper->redirect(baseurl);
            } else {
                $data['response'] = "Username or Password is incorrect";
            }
        }

        $data['catalog'] = $this->shopModel->catalog();
        $data['catalogSub'] = $this->shopModel->catalogSub();
        $data['searchData'] = $this->shopModel->searchProduct();
        $catalog = json_decode($data['catalog']);
        $menus[] = new stdClass;
        $j = 0;
        if (is_array($catalog)) {
            foreach ($catalog as $item) {
                @$menus[$j]->menu = @$this->shopModel->productTreeByID($item->cat_id);
                $j++;
            }
        }

        //var_dump($menus);
        $data['menus'] = json_encode($menus);

        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("login", $data);
        $this->load->view("footer", $data);
        /******************************************/

        $this->load->template_end();
    }
}
