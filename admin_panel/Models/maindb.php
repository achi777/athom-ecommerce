<?php
/**
 * Created by PhpStorm.
 * User: archil
 * Date: 07.03.2017
 * Time: 10:39
 */
class Model extends init
{
    public $out;
    public $id;

    public function __construct()
    {
        parent::__construct();
        $this->id = $this->helper->segment(1);
    }

    public function selectJoin(){
        /**Select**/
        $this->db->select("*");
        $this->db->from("information");
        //$this->db->join("cat","cat.cat_id=information.cat_id");
        //$this->db->join("cat","cat.cat_id=information.cat_id","left");
        $this->db->join_table("cat");
        $this->db->join_where("cat.cat_id","information.cat_id");
        $this->db->join_method("inner");
        $this->db->where("information.id","21");
        $this->db->or_where("information.id","22");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function userList(){
        /**Select**/
        $this->db->select("*");
        $this->db->from("members");
        if($_SESSION['status'] == 2){
            $this->db->where("user_id","'".$_SESSION['userID']."'");
        }
        $this->db->where("status","2");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function cart_view(){
        /**Select**/
        if(@$_SESSION['userID'] > 0){
            $this->db->select("*");
            $this->db->from("cart_view");
            $this->db->where("user_id",$_SESSION['userID']);
            $result = $this->db->get("SELECT");
        }
        return @$result;
    }

    public function add_to_cart($productID){
        $this->db->table("shopping_cart");
        $this->db->columns("user_id", "product_id", "date");
        $this->db->values($_SESSION['userID'], $productID, Date("Y-m-d H:i:s"));
        $this->db->get("INSERT");
    }

    public function remove_from_cart($id){
        /*Delete*/
        $this->db->table("shopping_cart");
        $this->db->where("id",$id);
        $this->db->where("user_id",$_SESSION['userID']);
        $this->db->delete("DELETE");
    }


    public function table($user_id, $fromDate, $toDate){
        /**Select**/
        $this->db->select("*");
        $this->db->from("docs");
        if(!empty($user_id)) {
            $this->db->where("user_id", "'" . $user_id . "'");
            $this->db->where("doc_date", ">= '" . $fromDate . "'");
            $this->db->where("doc_date", "<= '" . $toDate . "'");
        }elseif($_SESSION['status'] == 2){
            $this->db->where("user_id", "'" . $_SESSION['userID'] . "'");
        }
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function seletcOne($id){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("information");
        $this->db->where("id",$id);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function productStatus($product_id, $active){
        $this->db->table("product");
        $this->db->columns("product_status");
        $this->db->values($active);
        $this->db->where("product_id",$product_id);
        $this->db->exec("UPDATE");
    }

    public function product_view($product_id){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("product_id",$product_id);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function product_photo($product_id){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("product_photos");
        $this->db->where("product_id",$product_id);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function header_info(){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("header");
        $this->db->where("id",1);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function navigation(){
        $this->db->select("*");
        $this->db->from("post_cat");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function product_tree(){
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->treeCatID = "cat_id";
        $this->db->treeParentID = "cat_parent_id";
        $this->db->treeName = "cat_name_geo";
        $this->db->treeUrl = "/admin/product/";
        $result = $this->db->menu_tree();
        return $result;
    }

    public function cat_tree(){
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->treeCatID = "cat_id";
        $this->db->treeParentID = "cat_parent_id";
        $this->db->treeName = "cat_name_geo";
        $this->db->treeUrl = "/admin/shop_cat_details/";
        $result = $this->db->menu_tree();
        return $result;
    }

    public function product_cat_tree(){
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->treeCatID = "product_cat_id";
        $this->db->treeParentID = "product_cat_parent_id";
        $this->db->treeName = product_cat_name;
        $this->db->treeUrl = "/shop_cat_details/";
        $result = $this->db->scheme_tree();
        return $result;
    }

    public function product_cat_with_id($catID){
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->where("cat_id",$catID);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function add_product_cat($parentID, $cat_name_geo, $cat_name_eng, $cat_name_rus, $photo){
        /*Insert*/
        $this->db->table("product_cat");
        $this->db->columns("cat_parent_id", "cat_name_geo", "cat_name_eng", "cat_name_rus", "photo");
        $this->db->values($parentID, $cat_name_geo, $cat_name_eng, $cat_name_rus, $photo);
        $this->db->exec("INSERT");
    }

    public function up_product_cat($cat_id, $cat_name_geo, $cat_name_eng, $cat_name_rus, $photo){
        /*Insert*/
        $this->db->table("product_cat");
        $this->db->columns("cat_name_geo", "cat_name_eng", "cat_name_rus", "photo", "cat_status");
        $this->db->values($cat_name_geo, $cat_name_eng, $cat_name_rus, $photo, 1);
        $this->db->where("cat_id", $cat_id);
        $this->db->exec("UPDATE");
    }

    public function up_product_cat_nophoto($cat_id, $cat_name_geo, $cat_name_eng, $cat_name_rus){
        /*Insert*/
        $this->db->table("product_cat");
        $this->db->columns("cat_name_geo", "cat_name_eng", "cat_name_rus", "cat_status");
        $this->db->values($cat_name_geo, $cat_name_eng, $cat_name_rus, 1);
        $this->db->where("cat_id", $cat_id);
        $this->db->exec("UPDATE");
    }

    public function disableCat($cat_id, $active){
        /*Insert*/
        $this->db->table("product_cat");
        $this->db->columns("cat_status");
        $this->db->values($active);
        $this->db->where("cat_id", $cat_id);
        $this->db->exec("UPDATE");
    }

    public function deleteProductCat($cat_id){
        /*Delete*/
        $this->db->table("product_cat");
        $this->db->where("cat_id",$cat_id);
        $this->db->exec("DELETE");
    }

    public function deleteProductCatWithParent($cat_id){
        /*Delete*/
        $this->db->table("product_cat");
        $this->db->where("cat_parent_id",$cat_id);
        $this->db->delete("DELETE");
    }

    public function product_cat_with_parent($catID){
        $this->db->select("*");
        $this->db->from("product_cat");
        $this->db->where("cat_parent_id",$catID);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function productList(){
        $this->db->select("*");
        $this->db->from("product");
        $this->db->order("product_id", "DESC");
        $this->db->limit(12);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function productWithCat(int $catID = 0):string {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id","product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("brands");
        $this->db->join_where("brands.brand_id","product.brand_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id","product.cat_id");
        $this->db->join_method("inner");
        if($this->convert->to_int($catID) > 0){
            $this->db->where("product.cat_id",$catID);
        }
        $this->db->group("product.product_id");
        $this->db->order("product.product_id", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function productListForCombo(int $catID = 0):string {
        $this->db->select("*");
        $this->db->from("product");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id","product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("brands");
        $this->db->join_where("brands.brand_id","product.brand_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id","product.cat_id");
        $this->db->join_method("inner");
        $this->db->where("product.product_status", 1);
        if($this->convert->to_int($catID) > 0){
            $this->db->where("product.cat_id",$catID);
        }
        $this->db->group("product.product_id");
        $this->db->order("product.product_id", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function infoWithCat($catID = ""){
        $this->db->select("*");
        $this->db->from("info");
        if($this->convert->to_int($catID) > 0){
            $this->db->where("info_cat_id",$catID);
        }
        $this->db->order("info_id", "DESC");
        //$this->db->limit($this->db->paginationLimit(3, 12));
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function infoWithID($infoID = ""){
        $this->db->select("*");
        $this->db->from("info");
        $this->db->where("info_id",$infoID);
        $this->db->order("info_id", "DESC");
        //$this->db->limit($this->db->paginationLimit(3, 12));
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function productWithCatID($catID){
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("product_cat_id",$catID);
        $this->db->order("product_id", "DESC");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function productWithID($productID){
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("product_id",$productID);
        $this->db->order("product_id", "DESC");
        //$this->db->limit($this->db->paginationLimit(3, 12));
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function productSearch(){
        $this->db->select("*");
        $this->db->from("product");
        $this->db->like("product_name_geo",$this->input->post("search"));
        $this->db->order("product_id", "DESC");
        $this->db->limit(12);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function bestsellers(){
        $this->db->select("*");
        $this->db->from("product");
        $this->db->limit(3);
        $this->db->order("views", "DESC");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function productListPag(){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("product");
        $this->db->limit($this->db->paginationLimit(2, 3));
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function pagination(){
        /**pagination**/
        $result = $this->db->pagination(3,12);
        return $result;
    }

    public function recordToBase($user_id, $doc_date, $title, $file_url){
        /*Insert*/
        $this->db->table("docs");
        $this->db->columns("user_id", "doc_date", "title", "file_url");
        $this->db->values($user_id, $doc_date, $title, $file_url);
        $this->db->get("INSERT");
    }

    public function productToBase($product_cat_id, $product_name_geo, $product_name_eng, $product_name_rus, $product_desc_geo, $product_desc_eng, $product_desc_rus, $product_price, $product_sale){
        /*Insert*/
        $this->db->table("product");
        $this->db->columns("product_cat_id", "product_name_geo", "product_name_eng", "product_name_rus", "product_desc_geo", "product_desc_eng", "product_desc_rus", "product_price", "product_sale");
        $this->db->values($product_cat_id, $product_name_geo, $product_name_eng, $product_name_rus, $product_desc_geo, $product_desc_eng, $product_desc_rus, $product_price, $product_sale);
        return $this->db->get("INSERT");
    }

    public function add_photo_to_base($product_id, $photo_url){
        /*Insert*/
        $this->db->table("product_photos");
        $this->db->columns("product_id", "photo_url");
        $this->db->values($product_id, $photo_url);
        $this->db->get("INSERT");
    }

    public function deletePhotoBase($photo_id){
        /*Delete*/
        $this->db->table("product_photos");
        $this->db->where("photo_id",$photo_id);
        $this->db->delete("DELETE");
    }

    public function deletePhotoProductID($photo_id){
        /*Delete*/
        $this->db->table("product_photos");
        $this->db->where("photo_id",$photo_id);
        $this->db->delete("DELETE");
    }

    public function deleteProductWithCat($catID){
        /*Delete*/
        $this->db->table("product");
        $this->db->where("product_cat_id",$catID);
        $this->db->delete("DELETE");
    }

    public function deleteProduct($product_id){
        /*Delete*/
        $this->db->table("product");
        $this->db->where("product_id",$product_id);
        $this->db->delete("DELETE");
    }

    public function deleteFromCart($productID){
        $this->db->table("shopping_cart");
        $this->db->where("product_id",$productID);
        $this->db->delete("DELETE");
    }

    public function productUpdateBase($productID, $brandID, $product_name_geo, $product_name_eng, $product_name_rus, $product_desc_geo, $product_desc_eng, $product_desc_rus, $product_full_geo, $product_full_eng, $product_full_rus, $product_price, $product_sale){
        /*Update*/
        $this->db->table("product");
        $this->db->columns("brand_id", "product_name_geo", "product_name_eng", "product_name_rus", "product_desc_geo", "product_desc_eng", "product_desc_rus","product_full_geo", "product_full_eng", "product_full_rus", "product_price", "product_sale");
        $this->db->values($brandID, $product_name_geo, $product_name_eng, $product_name_rus, $product_desc_geo, $product_desc_eng, $product_desc_rus, $product_full_geo, $product_full_eng, $product_full_rus, $product_price, $product_sale);
        $this->db->where("product_id", $productID);
        return $this->db->exec("UPDATE");
    }

    public function productInsertBase($catID, $brandID, $product_name_geo, $product_name_eng, $product_name_rus, $product_desc_geo, $product_desc_eng, $product_desc_rus, $product_full_geo, $product_full_eng, $product_full_rus, $product_price, $product_sale){
        /*Update*/
        $this->db->table("product");
        $this->db->columns("cat_id", "brand_id", "product_name_geo", "product_name_eng", "product_name_rus", "product_desc_geo", "product_desc_eng", "product_desc_rus","product_full_geo", "product_full_eng", "product_full_rus", "product_price", "product_sale");
        $this->db->values($catID, $brandID, $product_name_geo, $product_name_eng, $product_name_rus, $product_desc_geo, $product_desc_eng, $product_desc_rus, $product_full_geo, $product_full_eng, $product_full_rus, $product_price, $product_sale);
        return $this->db->exec("INSERT");
    }

    public function deleteProductStatus($productID){
        /*Update*/
        $this->db->table("product");
        $this->db->columns("status");
        $this->db->values(0);
        $this->db->where("product_id", $productID);
        return $this->db->exec("UPDATE");
    }

    public function insertPhotos(int $productID, string $colorID, string $photoUrl):int {
        /*Insert*/
        $this->db->table("product_photos");
        $this->db->columns("product_id", "color_id", "photo_url");
        $this->db->values($productID, $colorID, $photoUrl);
        return $this->db->exec("INSERT");
    }

    public function infoUpdateBase($info_id, $info_name_geo, $info_name_eng, $info_name_rus, $info_desc_geo, $info_desc_eng, $info_desc_rus, $info_full_geo, $info_full_eng, $info_full_rus){
        /*Insert*/
        $curDate = Date("Y-m-d h:i:s");
        $this->db->table("info");
        $this->db->columns("info_name_geo", "info_name_eng", "info_name_rus", "info_desc_geo", "info_desc_eng", "info_desc_rus", "info_full_geo", "info_full_eng", "info_full_rus", "info_date");
        $this->db->values($info_name_geo, $info_name_eng, $info_name_rus, $info_desc_geo, $info_desc_eng, $info_desc_rus, $info_full_geo, $info_full_eng, $info_full_rus, $curDate);
        $this->db->where("info_id",$info_id);
        return $this->db->exec("UPDATE");
    }

    public function infoToBase($info_cat_id, $info_name_geo, $info_name_eng, $info_name_rus, $info_desc_geo, $info_desc_eng, $info_desc_rus, $info_full_geo, $info_full_eng, $info_full_rus){
        /*Insert*/
        $curDate = Date("Y-m-d h:i:s");
        $this->db->table("info");
        $this->db->columns("info_cat_id","info_name_geo", "info_name_eng", "info_name_rus", "info_desc_geo", "info_desc_eng", "info_desc_rus", "info_full_geo", "info_full_eng", "info_full_rus", "info_date");
        $this->db->values($info_cat_id ,$info_name_geo, $info_name_eng, $info_name_rus, $info_desc_geo, $info_desc_eng, $info_desc_rus, $info_full_geo, $info_full_eng, $info_full_rus, $curDate);
        return $this->db->exec("INSERT");
    }

    public function updateToBase($id,$name_geo,$name_eng){
        /*Update*/
        $this->db->table("information");
        $this->db->columns("name_geo", "name_eng");
        $this->db->values($name_geo, $name_eng);
        $this->db->where("id",$id);
        $this->db->exec("UPDATE");
    }

    public function deleteFromBase($id){
        /*Delete*/
        $this->db->table("information");
        $this->db->where("id",$id);
        $this->db->delete("DELETE");
    }

    public function login($email, $password){
        $this->db->select("*");
        $this->db->from("members");
        $this->db->where("email","'".$email."'");
        $this->db->where("password","'".md5($password)."'");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function check_user($email){
        $this->db->select("*");
        $this->db->from("members");
        $this->db->where("email","'".$email."'");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function userData($userID){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("members");
        $this->db->where("user_id",$userID);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function registration($email, $password, $firstname, $lastname, $phone, $city, $address){
        /*Insert*/
        $this->db->table("members");
        $this->db->columns("email", "password", "firstname", "lastname", "phone", "city", "address");
        $this->db->values($email, $password, $firstname, $lastname, $phone, $city, $address);
        return $this->db->get("INSERT");
    }

    public function check_forget($userID, $password){
        $this->db->select("*");
        $this->db->from("members");
        $this->db->where("user_id","'".$userID."'");
        $this->db->where("password","'".$password."'");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function change_pass($userID,$password){
        /*Update*/
        $this->db->table("members");
        $this->db->columns("password");
        $this->db->values(md5($password));
        $this->db->where("user_id","'".$userID."'");
        $this->db->get("UPDATE");
    }

    public function change_user_data($userID,$firstname,$lastname,$phone){
        /*Update*/
        $this->db->table("members");
        $this->db->columns("firstname", "lastname", "phone");
        $this->db->values($firstname,$lastname,$phone);
        $this->db->where("user_id","'".$userID."'");
        $this->db->get("UPDATE");
    }

    public function change_address($userID,$city,$address){
        /*Update*/
        $this->db->table("members");
        $this->db->columns("city", "address");
        $this->db->values($city,$address);
        $this->db->where("user_id","'".$userID."'");
        $this->db->get("UPDATE");
    }

    public function orders($userID){
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->where("user_id",$userID);
        $this->db->order("order_code", "DESC");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function ordersAll(){
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->order("order_date", "DESC");
        $this->db->group("order_code");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function ordersbyCode($orderCode){
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->join_table("variations");
        $this->db->join_where("variations.variation_id","orders.variation_id");
        $this->db->join_method("inner");
        $this->db->where("order_code", $orderCode);
        $result = $this->db->exec("get");
        return $result;
    }

    public function orderStats(){
        $this->db->select("count(order_id) AS qty, sum(product_price) AS price, sum(product_sale) AS sale, quantity AS sum");
        $this->db->from("orders");
        //$this->db->where("status", $status);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function compledOrders(){
        $this->db->select("count(order_id) AS qty, quantity");
        $this->db->from("orders");
        $this->db->where("status", 4);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function currentOrders(){
        $this->db->select("count(order_id) AS qty, quantity");
        $this->db->from("orders");
        $this->db->where("status <", 4);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function orderList($date){
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->like("order_date",$date);
        $this->db->order("order_date", "ASC");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function shippingDataByID($orderID){
        /**Get Shipping Address**/
        $this->db->select("*, shipping_address.firstname AS shipping_firstname, shipping_address.lastname AS shipping_lastname, shipping_address.email AS shipping_email, shipping_address.phone AS shipping_phone");
        $this->db->from("orders");
        $this->db->join_table("members");
        $this->db->join_where("members.user_id","orders.user_id");
        $this->db->join_method("inner");
        $this->db->join_table("shipping_address");
        $this->db->join_where("shipping_address.user_id","orders.user_id");
        $this->db->join_method("inner");
        $this->db->where("orders.order_id",$orderID);
        $result = $this->db->exec("get");
        return $result;
    }


    public function invoice($order_code){
        $this->db->select("*");
        $this->db->from("invoices");
        $this->db->where("order_code","'".$order_code."'");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function checkout($trans_id, $amount){
        $this->db->table("invoices");
        $this->db->columns("trans_id", "amount", "ip_address", "order_code", "payment_date");
        $this->db->values($trans_id, $amount, $this->url->getIP(), $trans_id, Date("Y-m-d H:i:s"));
        return $this->db->get("INSERT");
    }

    public function infoListPag($catID){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("info");
        $this->db->where("info_cat_id","'".$catID."'");
        $this->db->limit($this->db->paginationLimit(3, 6));
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function infoPagination(){
        /**pagination**/
        $result = $this->db->pagination(3,6);
        return $result;
    }

    public function info_view($infoID){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("info");
        $this->db->where("info_id","'".$infoID."'");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function productDetails($productID){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("product");
        $this->db->where("product_id", $productID);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function photoList($productID){
        $this->db->select("*");
        $this->db->from("product_photos");
        $this->db->join_table("color_options");
        $this->db->join_where("color_options.color_id","product_photos.color_id");
        $this->db->join_method("inner");
        $this->db->where("product_id",$productID);
        $this->db->order("product_photos.color_id", "ASC");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function photoByID($photoID){
        $this->db->select("*");
        $this->db->from("product_photos");
        $this->db->where("photo_id",$photoID);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function deletePhoto($photoID){
        $this->db->from("product_photos");
        $this->db->where("photo_id",$photoID);
        $result = $this->db->exec("DELETE");
        return $result;
    }

    public function colorList(){
        $this->db->select("*");
        $this->db->from("color_options");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function addColor($colorNameGeo, $colorNameEng, $colorNameRus){
        $this->db->table("color_options");
        $this->db->columns("color_name_geo", "color_name_eng", "color_name_rus");
        $this->db->values($colorNameGeo, $colorNameEng, $colorNameRus);
        $this->db->exec("INSERT");
    }

    public function deleteColor($colorID){
        $this->db->table("color_options");
        $this->db->where("color_id",$colorID);
        $result = $this->db->exec("DELETE");
    }

    public function sizeList(){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("size_options");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function addSize($sizeName){
        $this->db->table("size_options");
        $this->db->columns("size_name");
        $this->db->values($sizeName);
        $this->db->exec("INSERT");
    }

    public function deleteSize($sizeID){
        $this->db->table("size_options");
        $this->db->where("size_id",$sizeID);
        $result = $this->db->exec("DELETE");
    }

    public function brandList(){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("brands");
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function addBrand($brandName, $brandLogo){
        $this->db->table("brands");
        $this->db->columns("brand_name", "brand_logo");
        $this->db->values($brandName, $brandLogo);
        $this->db->exec("INSERT");
    }

    public function brandbyID($brandID){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("brands");
        $this->db->where("brand_id", $brandID);
        $result = $this->db->get("SELECT");
        return $result;
    }

    public function deleteBrand($brandID){
        $this->db->table("brands");
        $this->db->where("brand_id",$brandID);
        $result = $this->db->exec("DELETE");
    }

    public function variationList($productID){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("variations");
        $this->db->join_table("color_options");
        $this->db->join_where("color_options.color_id","variations.color_id");
        $this->db->join_method("inner");
        $this->db->join_table("size_options");
        $this->db->join_where("size_options.size_id","variations.size_id");
        $this->db->join_method("inner");
        $this->db->where("variations.product_id",$productID);
        $this->db->order("variations.color_id", "ASC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function addVariation($productID, $colorID, $sizeID, $barCode, $sku){
        /*Insert*/
        $this->db->table("variations");
        $this->db->columns("product_id", "color_id", "size_id", "barcode","sku");
        $this->db->values($productID, $colorID, $sizeID, $barCode, $sku);
        $this->db->exec("INSERT");
    }
    public function editVariation($variationID, $sku){
        /*Insert*/
        $this->db->table("variations");
        $this->db->columns("sku");
        $this->db->values($sku);
        $this->db->where("variation_id",$variationID);
        $this->db->exec("UPDATE");
    }
    public function deleteVariation($variationID){
        /*Delete*/
        $this->db->table("variations");
        $this->db->where("variation_id",$variationID);
        $this->db->exec("DELETE");
    }

    public function deleteCombo($productID, $comboCode){
        /*Delete*/
        $this->db->table("combo_list");
        $this->db->where("product_id",$productID);
        $this->db->where("combo_code",$comboCode);
        $this->db->exec("DELETE");
    }

    public function addCombo($productID, $comboCode){
        /*Insert*/
        $this->db->table("combo_list");
        $this->db->columns("product_id", "combo_code");
        $this->db->values($productID, $comboCode);
        $this->db->exec("INSERT");
    }

    public function updateCombo($productID, $comboCode){
        /*Insert*/
        $this->db->table("combo_list");
        $this->db->columns("product_id", "combo_code");
        $this->db->values($productID, $comboCode);
        $this->db->where("combo_code",$comboCode);
        $this->db->exec("INSERT");
    }

    public function comboLst(){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("combo_list");
        $this->db->join_table("product");
        $this->db->join_where("product.product_id","combo_list.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_photos");
        $this->db->join_where("product_photos.product_id","product.product_id");
        $this->db->join_method("inner");
        $this->db->join_table("brands");
        $this->db->join_where("brands.brand_id","product.brand_id");
        $this->db->join_method("inner");
        $this->db->join_table("product_cat");
        $this->db->join_where("product_cat.cat_id","product.cat_id");
        $this->db->join_method("inner");
        $this->db->group("product.product_id");
        $this->db->order("combo_list.combo_code", "ASC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function contact()
    {
        $this->db->select("*");
        $this->db->from("contact");
        $this->db->limit(1);
        $result = $this->db->exec("get");
        return $result;
    }

    public function updateContact($id, $address, $phone, $email, $fb, $twitter, $instagram, $youtube){
        $this->db->table("contact");
        $this->db->columns("address", "phone", "email", "fb", "twitter", "instagram", "youtube");
        $this->db->values($address, $phone, $email, $fb, $twitter, $instagram, $youtube);
        $this->db->where("id", $id);
        $this->db->exec("UPDATE");
    }

}
