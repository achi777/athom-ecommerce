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



    public function shopping_cart_ajax()
    {
        /* cmd values (1 = add or + quantity, 2 = - quantity , 3 = delete, 4 = clear, 5 = get cart info)*/
        $cmd = $this->convert->to_int($this->helper->segment(2));
        $variationID = $this->convert->to_int($this->helper->segment(3));
        $sku = $this->convert->to_int($this->helper->segment(4));
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $variation = $this->model->variationForCart($variationID);


        $variation = json_decode($variation);

        switch ($cmd) {
            case "1":
                if (!empty($sku)) {
                    $itemArray = array($variationID => array(
                        'product_name_geo' => $variation[0]->product_name_geo,
                        'product_name_rus' => $variation[0]->product_name_rus,
                        'product_name_eng' => $variation[0]->product_name_eng,
                        'product_id' => $variation[0]->product_id,
                        'color_name_geo' => $variation[0]->color_name_geo,
                        'color_name_eng' => $variation[0]->color_name_eng,
                        'color_name_rus' => $variation[0]->color_name_rus,
                        'size_name' => $variation[0]->size_name,
                        'vriation_id' => $variationID,
                        'quantity' => $sku,
                        'product_price' => $variation[0]->product_price,
                        'product_sale' => $variation[0]->product_sale,
                        'image' => $variation[0]->photo_url
                    ));

                    if (!empty($_SESSION["cart_item"])) {
                        if (@in_array($variationID, array_keys($_SESSION["cart_item"]))) {
                            foreach ($_SESSION["cart_item"] as $k => $v) {
                                if ($variationID == $k) {
                                    if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    if ($_SESSION["cart_item"][$k]["quantity"] + $sku <= $variation[0]->sku) {
                                        $_SESSION["cart_item"][$k]["quantity"] += $sku;
                                    }
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = @array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                $this->out();
                break;
            case "2":
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($variationID == $k) {
                        if (empty($_SESSION["cart_item"][$k]["quantity"]) || $_SESSION["cart_item"][$k]["quantity"] == 0) {
                            foreach ($_SESSION["cart_item"] as $k => $v) {
                                if ($variationID == $k) {
                                    unset($_SESSION["cart_item"][$k]);
                                }
                                if (empty($_SESSION["cart_item"])) {
                                    unset($_SESSION["cart_item"]);
                                }
                            }
                        }
                        if ($_SESSION["cart_item"][$k]["quantity"] > $sku) {
                            $_SESSION["cart_item"][$k]["quantity"] -= $sku;
                        } elseif (!empty($_SESSION["cart_item"])) {
                            foreach ($_SESSION["cart_item"] as $k => $v) {
                                if ($variationID == $k) {
                                    unset($_SESSION["cart_item"][$k]);
                                }
                                if (empty($_SESSION["cart_item"])) {
                                    unset($_SESSION["cart_item"]);
                                }
                            }
                        }
                    }
                }
                $this->out();
                break;
            case "3":
                if (!empty($_SESSION["cart_item"])) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        //echo "<pre>".$v["vriation_id"]."</pre>";
                        if ($variationID == $v["vriation_id"]) {
                            //echo "<pre>".$variationID . " - ". $v["vriation_id"]." - ".$k."</pre>";
                            //var_dump($_SESSION["cart_item"][$k]);
                            unset($_SESSION["cart_item"][$k]);
                        }
                        if (empty($_SESSION["cart_item"])) {
                            unset($_SESSION["cart_item"]);
                        }
                    }
                }
                $this->out();
                break;
            case "4":
                unset($_SESSION["cart_item"]);
                break;
            default:
                $this->out();
        }
    }

    public function out()
    {
        if (!empty($_SESSION["cart_item"])) {
            $result = $_SESSION["cart_item"];
            easy::out($result);
            if (isset($_SESSION["userID"])) {
                $userID = $_SESSION["userID"];
                $dbCart = $this->model->checkCart($userID);
                $dbCart = json_decode($dbCart);

                //easy::out($dbCart);
                if ($dbCart[0]->user_id > 0) {
                    $this->model->updateCart($userID, json_encode($result, JSON_UNESCAPED_UNICODE));
                } else {
                    $this->model->inserCart($userID, json_encode($result, JSON_UNESCAPED_UNICODE));
                }
                //$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
            }
        } else {
            $response[] = "";
            $result = $response;
            //easy::out($result);
            if (isset($_SESSION["userID"])) {
                $userID = $_SESSION["userID"];
                $dbCart = $this->model->checkCart($userID);
                $dbCartData = json_decode($dbCart);

                //easy::out($dbCart);
                if ($dbCartData[0]->user_id > 0) {
                    $this->model->updateCart($userID, "");
                }
            }
        }
    }
}
