<?php
require engine."lib/routeList.php";

unset($_SESSION['route']);
$_SESSION['route'] = "";
$route = $this->helper->segment(1);
foreach($routeList AS $val => $key){
    if($route === $key){
        $_SESSION['route'] = $val;
    }
}