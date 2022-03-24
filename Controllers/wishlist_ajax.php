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



    public function wishlist_ajax()
    {
        /* cmd values (1 = add or + quantity, 2 = delete, 3 = clear, 4 = get withlist info)*/
        $cmd = $this->convert->to_int($this->helper->segment(2));
        $productID = $this->convert->to_int($this->helper->segment(3));
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $product = $this->model->productWishlist($productID);


        $product = json_decode($product);

        switch ($cmd) {
            case "1":
                $itemArray = array($productID => array(
                    'product_name_geo' => $product[0]->product_name_geo,
                    'product_name_rus' => $product[0]->product_name_rus,
                    'product_name_eng' => $product[0]->product_name_eng,
                    'product_id' => $product[0]->product_id,
                    'product_price' => $product[0]->product_price,
                    'product_sale' => $product[0]->product_sale,
                    'image' => $product[0]->photo_url,
                    'cat_id' => $product[0]->cat_id,
                    'cat_name_geo' => $product[0]->cat_name_geo,
                    'cat_name_eng' => $product[0]->cat_name_eng,
                    'cat_name_rus' => $product[0]->cat_name_rus
                ));

                if (!empty($_SESSION["wishlist_item"])) {
                    if (!in_array($productID, array_keys($_SESSION["wishlist_item"]))) {
                        $_SESSION["wishlist_item"] = array_merge($_SESSION["wishlist_item"], $itemArray);
                    }
                } else {
                    $_SESSION["wishlist_item"] = $itemArray;
                }
                $this->out();
                break;
            case "2":
                if (!empty($_SESSION["wishlist_item"])) {
                    foreach ($_SESSION["wishlist_item"] as $k => $v) {
                        if ($productID == $v["product_id"]) {
                            unset($_SESSION["wishlist_item"][$k]);
                        }
                        if (empty($_SESSION["wishlist_item"])) {
                            unset($_SESSION["wishlist_item"]);
                        }
                    }
                }
                $this->out();
                break;
            case "3":
                unset($_SESSION["wishlist_item"]);
                break;
            default:
                $this->out();
        }
    }

    public function out()
    {
        if (!empty($_SESSION["wishlist_item"])) {
            $result = $_SESSION["wishlist_item"];
            easy::out($result);
            if (isset($_SESSION["userID"])) {
                $userID = $_SESSION["userID"];
                $dbItem = $this->model->checkWishlist($userID);
                $dbItem = json_decode($dbItem);

                //easy::out($dbCart);
                if ($dbItem[0]->user_id > 0) {
                    $this->model->updateWishlist($userID, json_encode($result, JSON_UNESCAPED_UNICODE));
                } else {
                    $this->model->inserWishlist($userID, json_encode($result, JSON_UNESCAPED_UNICODE));
                }
                //$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
            }
        } else {
            $response[] = "wishlist is empty";
            $result = $response;
            //easy::out($result);
            if (isset($_SESSION["userID"])) {
                $userID = $_SESSION["userID"];
                $dbItem = $this->model->checkWishlist($userID);
                $dbItemData = json_decode($dbItem);

                //easy::out($dbCart);
                if ($dbItemData[0]->user_id > 0) {
                    $this->model->updateWishlist($userID, "");
                }
            }
        }
    }
}
