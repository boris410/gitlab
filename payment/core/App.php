<?php

class App
{
    public function __construct()
    {
        $url = $this->parseUrl();
        $controllerName = "{$url[0]}Controller";

        if (!file_exists("controllers/$controllerName.php")) {
            return;
        }

        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        $methodName = "index";

        if (isset($url[1])) {
            $methodName = $url[1];
        }

        if (!method_exists($controller, $methodName)) {
            return;
        }

        unset($url[0]);
        unset($url[1]);
        $params = [];

        if ($url) {
            $params = array_values($url);
        }

        call_user_func_array(Array($controller, $methodName), $params);
    }

    public function parseUrl()
    {
        //網址切割出自串
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = explode("/", $url);
            return $url;
        } else {
            //如果網址列什麼都沒有就導向Home/index
            header("location: Home/index");
        }
    }
}

?>