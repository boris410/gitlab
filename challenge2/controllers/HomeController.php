<?php

class HomeController extends Controller {
        
        function index(){
                $this->view("head");
                $this->view("index");
                $this->view("foot");
        }
        function login(){
                $this->view("head");
                $this->view("login");
                $this->view("foot");
        }
        function logout(){
        }
        function build(){
                $this->view("head");
                $this->view("build");
                $this->view("foot");
        }
        function accending(){
                $this->view("head");
                $this->view("accending");
                $this->view("foot");
        }
        
}

?>