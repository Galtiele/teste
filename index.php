<?php
session_start();
define('BASE_URL','http://localhost/teste/');

spl_autoload_register(function($class){
    $diretorios = ['app/core','app/controllers', 'app/models'];
    foreach ($diretorios as $diretorio) {
        $file = $diretorio.'/'.$class.'.php';
        if(file_exists($file))
        {
            require_once $file;
            return;
        }else{
            echo "<br>O Controller $class não existe<br>";
        }
    }
});

$core =  new Core();
$core->run();
