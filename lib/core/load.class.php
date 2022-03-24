<?php
class load
{
    public $route = engine;
    public function routePath($route)
    {
        $_SESSION['route'] = $route;
    }
    public function file($filename)
    {
        include($filename . ".php");
    }
    public function model($filename)
    {
        if(file_exists($_SESSION['route']."Models/" . $filename . ".php")){
            require $_SESSION['route']."Models/" . $filename . ".php";
        }else{
            echo "<pre>This Model not exist</pre>";
        }

    }
    public function is_json($string,$return_data = false) {
        $data = json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
    }

    public function template_start($data = ""){
        if (!empty($data) && is_array($data)) {
            foreach ($data as $key => $value) {
                if($this->is_json($value)){
                    ${"$key"} = json_decode($value);
                }else{
                    ${"$key"} = $value;
                }

            }
        }
        //echo $_SESSION['route']."Views/layout/begin.php";
        /***********title**************/
        $begin_contents = file_get_contents($_SESSION['route']."Views/layout/begin.php", true);
        $begin_contents=str_replace('{{{','<?php { easy::out(',$begin_contents);
            $begin_contents=str_replace('}}}','); } ?>',$begin_contents);
        $begin_contents=str_replace('{{','<?php easy::out(',$begin_contents);
        $begin_contents=str_replace('}}','); ?>',$begin_contents);
        $begin_contents=str_replace('<@','<?php ',$begin_contents);
        $begin_contents=str_replace('@>',' ?>',$begin_contents);
        $begin_contents='?>'.trim($begin_contents);
        eval($begin_contents);
    }

    public function template_end($data = ""){
        if (!empty($data) && is_array($data)) {
            foreach ($data as $key => $value) {
                if($this->is_json($value)){
                    ${"$key"} = json_decode($value);
                }else{
                    ${"$key"} = $value;
                }

            }
        }
        /***********end**************/
        //echo $_SESSION['route']."Views/layout/end.php";
        $end_contents = file_get_contents($_SESSION['route']."Views/layout/end.php", true);
        $end_contents=str_replace('{{','<?php easy::out(',$end_contents);
        $end_contents=str_replace('}}','); ?>',$end_contents);
        $end_contents=str_replace('<@','<?php ',$end_contents);
        $end_contents=str_replace('@>',' ?>',$end_contents);
        $end_contents='?>'.trim($end_contents);
        eval($end_contents);
    }

    public function view($filename, $data = "")
    {
        if (!empty($data) && is_array($data)) {
            foreach ($data as $key => $value) {
                if($this->is_json($value)){
                    ${"$key"} = json_decode($value);
                }else{
                    ${"$key"} = $value;
                }

            }
        }
        //echo $_SESSION['route']."Views/" . $filename . ".php";
        if(file_exists($_SESSION['route']."Views/" . $filename . ".php")){
            /**************view**************/
            $contents = file_get_contents($_SESSION['route']."Views/" . $filename . ".php", true);
            $contents=str_replace('{{','<?php easy::out(',$contents);
            $contents=str_replace('}}','); ?>',$contents);
            $contents=str_replace('<@','<?php ',$contents);
            $contents=str_replace('@>',' ?>',$contents);
            $contents='?>'.trim($contents);
            @eval($contents);
        }else{
            echo "<pre>This View not exist</pre>";
        }

    }
    public function controller($filename)
    {
        //echo $this->route."Controllers/" . $filename . ".php";
        if(file_exists($_SESSION['route']."Controllers/" . $filename . ".php")){
            require $_SESSION['route']."Controllers/" . $filename . ".php";
        }else{
            echo "<pre>This Controller not exist</pre>";
        }

    }
}