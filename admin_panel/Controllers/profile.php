<?php
class Controller extends init
{
    public $model;
    public $shopModel;
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
        $this->shopModel = new Model();

        $this->load->model("userdb");
        $this->model = new userModel();
    }



    public function profile()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;
        $nav[] = new stdClass;
        $nav[0]->name = "Profile";
        $nav[0]->url = baseurl . "/profile";

        $data['nav'] = json_encode($nav);

        $userID = $_SESSION['userID'];
        if ($userID < 1) {
            $this->helper->redirect(baseurl);
        }
        $data['tree'] = $this->shopModel->product_tree();
        $header_data['title'] = "AO Framework Project || Profile";
        $data['copyright'] = "© Archil Odishelidze 2021";
        $data['response'] = "";
        $data['userData'] = $this->model->userData($userID);
        $data["shippingData"] = $this->model->shipping_data($userID);
        $data["orders"] = $this->model->orders($userID);

        if (!empty($this->input->post("address"))) {
            $shippingData = @json_decode($data["shippingData"]);
            if ($shippingData[0]->address_id > 0) {
                $this->model->change_address($userID, $this->input->post("city"), $this->input->post("address"), $this->input->post("post_code"), $this->input->post("phone"), $this->input->post("firstname"), $this->input->post("lastname"), $this->input->post("email"));
            } else {
                $this->model->add_address($userID, $this->input->post("city"), $this->input->post("address"), $this->input->post("post_code"), $this->input->post("phone"), $this->input->post("firstname"), $this->input->post("lastname"), $this->input->post("email"));
            }
            echo '<div class="alert alert-success alert-dismissible fade show" style="position: absolute!important; z-index:9999; width:100%;">
                        <strong>Success!</strong> Shipping data is updated.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';
        }

        if (!empty($this->input->post("password")) && !empty($this->input->post("rpassword"))) {
            $oldPass = md5($this->input->post("old_password"));
            $userdata = $this->model->check_forget($userID, $oldPass);
            $userdata = json_decode($userdata);
            $data['response'] = "Change your password";

            if (($this->input->post("password") == $this->input->post("rpassword")) && ($oldPass == $userdata[0]->password)) {
                $this->model->change_pass($userID, $this->input->post("password"));
                echo '<div class="alert alert-success alert-dismissible fade show" style="position: absolute!important; z-index:9999; width:100%;">
                            <strong>Success!</strong> Your password is changed.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" style="position: absolute!important; z-index:9999; width:100%;">
                            <strong>Success!</strong> Your password is changed.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>';
            }
        }

        if (!empty($this->input->post("firstname")) && !empty($this->input->post("lastname")) && !empty($this->input->post("personalData"))) {
            $userdata = json_decode($data['userData']);
            $this->model->change_user_data($userID, $this->input->post("firstname"), $this->input->post("lastname"), $this->input->post("phone"));

            echo '<div class="alert alert-success alert-dismissible fade show" style="position: absolute!important; z-index:9999; width:100%;">
                    <strong>Success!</strong> Your Personal data is changed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>';
        }

        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header", $data);
        $this->load->view("profile", $data);
        $this->load->view("footer", $data);
        /******************************************/

        $this->load->template_end();
    }
}
