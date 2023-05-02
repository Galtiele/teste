<?php

class HomeController{

    public function __construct(){

    }
    public function index(){
        echo "CHEGOU NO INDEX DE HOMECONTROLLER<br>";
        require_once  "./views/home.php";

    }
    public function loadView($view){
        echo "Entrou em loadView<br>";
        return $view;
    }
}