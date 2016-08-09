<?php

class App
{
    public function __construct()
    {
        $url = $this->parseUrl();
        $controllerName = "{$url[0]}Controller";

        if (!file_exists("controllers/$controllerName.php"))
            return;

        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        $methodName = isset($url[1]) ? $url[1] : "index";

        if (!method_exists($controller, $methodName))
            return;

        unset($url[0]); unset($url[1]);
        $params = $url ? array_values($url) : Array();
        call_user_func_array(Array($controller, $methodName), $params);
    }

    public function parseUrl()
    {//網址切割出自串
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = explode("/", $url);
            return $url;
        } else {
            header("location: Home/index");//如果網址列什麼都沒有就導向Home/index
        }
    }
}

?>