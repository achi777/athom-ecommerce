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



    public function gpost()
    {
        $controller = $this->helper->segment(1);
        $data['controller'] = $controller;

        $username = "postman";
        $password = "password";
    
        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "https://postman-echo.com/basic-auth",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",

            //The "grant_type=client_credentials" means that you are sending a username and a password to the "oauth2/token" endpoint
            CURLOPT_POSTFIELDS => "grant_type=client_credentials",
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json',

                //iPay client_id and secret_key in base64
                "Authorization: Basic " . base64_encode($username . ':' . $password)
            ],
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
        //$response = json_decode($response, true);
        easy::out($response);



    }

}