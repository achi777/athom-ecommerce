<?php
class router extends init {
    private $controllerName;
    private $action;
    public function __construct() {
        parent::__construct();
        require engine."lib/routes.php";
        if($_SESSION['route'] == "" || $_SESSION['route'] == null){
            $this->action = $this->helper->segment(1);
        }else{
            $this->action = $this->helper->segment(2);
        }
        
        if (empty($this->action)) {
            $this->controllerName = "main";
        } else {
            $this->controllerName = $this->action;
        }
    }
    public function createController() {
        //echo "route id :" . $_SESSION['route'];
        //echo $_SESSION['route']."Controllers/".$this->controllerName.".php";
        if (file_exists($_SESSION['route']."Controllers/".$this->controllerName.".php")) {
            include($_SESSION['route']."Controllers/".$this->controllerName.".php");
            /************************/
            $controller = new Controller();
            if (isset($this->controllerName)) $controller->{$this->controllerName}();
            /**********************/
        } else {
            require("Views/error.php");
        }
    }
}