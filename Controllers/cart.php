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
    }



    public function cart()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $data['contact'] = $this->model->contact();
        $nav[] = new stdClass;
        $nav[0]->name = "Shop";
        $nav[0]->url = baseurl."/shop";
        @$nav[1]->name = "Cart";
        $nav[1]->url = "";
        $data['nav'] = json_encode($nav);
        $data['infoCats'] = $this->infoModel->postCats();
        /* cmd values (1 = add or + quantity, 2 = - quantity , 3 = delete, 4 = clear, 5 = get cart info)*/
        $cmd = $this->convert->to_int($this->helper->segment(2));
        $variationID = $this->convert->to_int($this->helper->segment(3));
        $sku = $this->convert->to_int($this->helper->segment(4));
        $header_data['title'] = "AO Framework Project";
        $data['tree'] = $this->model->product_tree();
        $data['copyright'] = "© Archil Odishelidze 2021";
        $variation = $this->model->variationForCart($variationID);
        $data['cuponSale'] = 0;
        if(!empty($this->input->post("cuponCode"))){
            $cuponCode = $this->input->post("cuponCode");
            $cuponData = $this->model->getCupon($cuponCode);
            $cuponData = json_decode($cuponData);
            if($cuponData != NULL){
                if($cuponData[0]->cupon_code == $cuponCode){
                    $checkCupon = json_decode($this->model->checkCupon($cuponCode));
                    if(empty($checkCupon) || $checkCupon == NULL){
                        $data['cuponSale'] = $cuponData[0]->cupon_amount; 
                        $_SESSION['cupon']['amount'] = $cuponData[0]->cupon_amount; 
                        $_SESSION['cupon']['cuponCode'] = $cuponData[0]->cupon_code;
                        //var_dump($_SESSION['cupon']);
                    }
                    
                }
            }
        }


        $variation = json_decode($variation);

        switch($cmd){
            case "1":
                if(!empty($sku)) {
                    $itemArray = array($variationID => array('product_name'=>$variation[0]->product_name_geo, 'product_id'=>$variation[0]->product_id, 'color_name'=>$variation[0]->color_name, 'size_name'=>$variation[0]->size_name, 'vriation_id'=>$variationID, 'quantity'=>$sku, 'product_price'=>$variation[0]->product_price, 'product_sale'=>$variation[0]->product_sale, 'image'=>$variation[0]->photo_url));
                    
                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($variationID,array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($variationID == $k) {
                                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                                        }
                                        if($_SESSION["cart_item"][$k]["quantity"] + $sku <= $variation[0]->sku){
                                            $_SESSION["cart_item"][$k]["quantity"] += $sku; 
                                        }
                                        
                                    }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                $this->out();
                break;
            case "2":
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($variationID == $k) {
                            if(empty($_SESSION["cart_item"][$k]["quantity"]) || $_SESSION["cart_item"][$k]["quantity"] == 0) {
                                foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($variationID == $k){
                                        unset($_SESSION["cart_item"][$k]);
                                    }				
                                    if(empty($_SESSION["cart_item"])){
                                        unset($_SESSION["cart_item"]);
                                    }
                                }
                            }
                            if($_SESSION["cart_item"][$k]["quantity"] > $sku){
                                $_SESSION["cart_item"][$k]["quantity"] -= $sku; 
                            }elseif(!empty($_SESSION["cart_item"])){
                                foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($variationID == $k){
                                        unset($_SESSION["cart_item"][$k]);
                                    }				
                                    if(empty($_SESSION["cart_item"])){
                                        unset($_SESSION["cart_item"]);
                                    }
                                }
                            }
                            
                        }
                }
                $this->out();
                break; 
            case "3":
                if(!empty($_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                        //echo "<pre>".$v["vriation_id"]."</pre>";
                        if($variationID == $v["vriation_id"]){
                            //echo "<pre>".$variationID . " - ". $v["vriation_id"]." - ".$k."</pre>";
                            //var_dump($_SESSION["cart_item"][$k]);
                            unset($_SESSION["cart_item"][$k]);
                        }				
                        if(empty($_SESSION["cart_item"])){
                            unset($_SESSION["cart_item"]);
                        }
                    }
                    
                }
                $this->helper->redirect(baseurl."/cart");
                $this->out();
                break;
            case "4":
                unset($_SESSION["cart_item"]);
                if($_SESSION["userID"] > 0){
                    $userID = $_SESSION["userID"];
                    $dbCart = $this->model->checkCart($userID);
                    $dbCart = json_decode($dbCart);
                    
                    //easy::out($dbCart);
                    if($dbCart[0]->user_id === $userID){
                        $this->model->updateCart($userID, "");
                    }else{
                        $this->model->inserCart($userID, "");
                    }
                    //$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
                break; 
            default:
                if(!empty($_SESSION["cart_item"])) {
                    $result = $_SESSION["cart_item"];
                    $data['result'] = json_encode($this->convert->arrayToObject($result));
                }else{
                    $response["status"] = "empty"; 
                    $result = (object)$response;
                    $data['result'] = json_encode($this->convert->arrayToObject($result));
                }
               

        }

        $data['catalog'] = $this->model->catalog();
        $data['catalogSub'] = $this->model->catalogSub();
        $data['searchData'] = $this->model->searchProduct();
        $catalog = json_decode($data['catalog']);
        $menus[] = new stdClass;
        $j = 0;
        if (is_array($catalog)) {
            foreach ($catalog as $item) {
                @$menus[$j]->menu = @$this->model->productTreeByID($item->cat_id);
                $j++;
            }
        }

        //var_dump($menus);
        $data['menus'] = json_encode($menus);

  
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("cart", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
    public function out(){
        if(!empty($_SESSION["cart_item"])) {
            $result = $_SESSION["cart_item"];
            $data['result'] = $result;
            
            if($_SESSION["userID"] > 0){
                $userID = $_SESSION["userID"];
                $dbCart = $this->model->checkCart($userID);
                $dbCart = json_decode($dbCart);
                
                //easy::out($dbCart);
               
                if($dbCart[0]->user_id === $userID){
                    $this->model->updateCart($userID, json_encode($result, JSON_UNESCAPED_UNICODE));
                }else{
                    $this->model->inserCart($userID, json_encode($result, JSON_UNESCAPED_UNICODE));
                }
                
                
                //$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
            }
            
        }else{
            $response["status"] = "empty"; 
            $result = (object)$response;
            //var_dump($result);
            $data['result'] = json_encode($result);
        }
    }
}