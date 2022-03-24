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
        $this->load->model("infodb");
        $this->model = new infoModel();
    }

    public function coupon_attach(){
        $userID = $this->helper->segment(3);
        $firstUSer= $this->model->membersUser($userID);
        $data['userData'] = $firstUSer;
        $data['coupon_uuid'] = easy::uuid();
        if (!empty($this->input->post("addCupon"))) {
            $uuid = $this->input->post("uuid");
            $email = $this->input->post("email");
            $cupon_amount = $this->input->post("cupon_amount");
            $userData = json_decode($firstUSer);

            $this->model->infoToCupons($uuid,$cupon_amount,1);

            $text = "	<center>
                            <b>გამარჯობათ ".$userData->firstname."</b> <br>
                            <font color=\"red\"> ფასდაკლების კუპონის კოდი</font> <br>
                            <p><b>Code : </b>".$uuid."</p>
                        </center>
                        <br><br>";
            $this->send->sendMail($email, "", "support@dressio.ge", "Recovery your password", $text);
            $this->helper->redirect(baseurl . "/admin/user_list");
        }
        $controller = $this->helper->segment(2);
        $data['controller'] = $controller;
        /******************************************/
        $this->load->template_start($data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("coupon_attach", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }

}
