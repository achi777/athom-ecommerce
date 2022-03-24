<?php
class userModel extends init
{
    public $out;
    public $id;
    public function __construct()
    {
        parent::__construct();
        $this->id = $this->helper->segment(1);
    }

    public function login($email, $password){
        $this->db->select("*");
        $this->db->from("admin");
        $this->db->where("username", $email);
        $this->db->where("password", md5($password));
        $result = $this->db->exec("get");
        return $result;
    }

    public function check_user($email){
        $this->db->select("*");
        $this->db->from("members");
        $this->db->where("email", $email);
        $result = $this->db->exec("get");
        return $result;
    }

    public function userData($userID){
        /**Get User Data**/
        $this->db->select("*");
        $this->db->from("members");
        $this->db->where("user_id",$userID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function userList(){
        /**Get User Data**/
        $this->db->select("*");
        $this->db->from("members");
        $this->db->order("firstname", "ASC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function userActive($userID, $active){
        /*update Status*/
        $this->db->table("members");
        $this->db->columns("user_status");
        $this->db->values($active);
        $this->db->where("user_id", $userID);
        return $this->db->exec("update");
    }

    public function registration($email, $password, $firstname, $lastname, $phone){
        /*Insert*/
        $this->db->table("members");
        $this->db->columns("email", "password", "firstname", "lastname", "phone");
        $this->db->values($email, $password, $firstname, $lastname, $phone);
        return $this->db->exec("insert");
    }

    public function check_forget($userID, $password){
        $this->db->select("*");
        $this->db->from("members");
        $this->db->where("user_id", $userID);
        $this->db->where("password", $password);
        $result = $this->db->exec("get");
        return $result;
    }

    public function changePass($userID,$password){
        /*Update*/
        $this->db->table("admin");
        $this->db->columns("password");
        $this->db->values(md5($password));
        $this->db->where("user_id", $userID);
        $this->db->exec("update");
    }

    public function change_user_data($userID,$firstname,$lastname,$phone){
        /*Update*/
        $this->db->table("members");
        $this->db->columns("firstname", "lastname", "phone");
        $this->db->values($firstname,$lastname,$phone);
        $this->db->where("user_id", $userID);
        $this->db->exec("update");
    }

    public function change_address($userID, $city, $address, $postCode, $phone, $firstname, $lastname, $email){
        /*Update*/
        $this->db->table("shipping_address");
        $this->db->columns("city", "address", "post_code", "phone", "firstname", "lastname", "email");
        $this->db->values($city, $address, $postCode, $phone, $firstname, $lastname, $email);
        $this->db->where("user_id", $userID);
        $this->db->exec("update");
    }

    public function add_address($userID, $city, $address, $postCode, $phone, $firstname, $lastname, $email){
        /*Insert*/
        $this->db->table("shipping_address");
        $this->db->columns("user_id", "city", "address", "post_code", "phone", "firstname", "lastname", "email");
        $this->db->values($userID, $city, $address, $postCode, $phone, $firstname, $lastname, $email);
        $this->db->exec("insert");
    }

    public function shipping_data($userID){
        /**Get Shipping Address**/
        $this->db->select("*");
        $this->db->from("shipping_address");
        $this->db->where("user_id",$userID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function shippingDataByID($orderID){
        /**Get Shipping Address**/
        $this->db->select("*");
        $this->db->from("shipping_address");
        $this->db->where("order_id",$orderID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function orders($userID){
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->join_table("variations");
        $this->db->join_where("variations.variation_id","orders.variation_id");
        $this->db->join_method("inner");
        $this->db->where("user_id", $userID);
        $this->db->order("order_id", "DESC");
        $result = $this->db->exec("get");
        return $result;
    }

    public function invoice($orderID){
        $this->db->select("*");
        $this->db->from("invoices");
        $this->db->where("order_id", $orderID);
        $result = $this->db->exec("get");
        return $result;
    }

    public function checkout($trans_id, $amount){
        $this->db->table("invoices");
        $this->db->columns("trans_id", "amount", "ip_address", "order_code", "payment_date");
        $this->db->values($trans_id, $amount, $this->url->getIP(), $trans_id, Date("Y-m-d H:i:s"));
        return $this->db->exec("insert");
    }
    
}