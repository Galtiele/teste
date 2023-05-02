<?php

class HomeController{

    public function __construct(){

    }
    public function index(){

        require_once  "./views/home.php";

    }
    public function loadView($view){

        return $view;
    }
}