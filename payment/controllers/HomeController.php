<?php
    class HomeController extends load
    {
        function index()//首頁
        {
            $this->view("head");
            $this->view("index");
            $this->view("foot");
        }
    }
?>