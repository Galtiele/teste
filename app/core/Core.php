<?php
class Core{
    private $url;
    private $controller;
    private $action;
    private $params;
    public function run(){
        $url = "/";
        if(isset($_GET['url'])){
            $url .= rtrim($_GET['url'],'/');
            $url =  explode('/', $url);
            $this->url = $url;
            if(!empty($this->url)){
                $this->controller =  $url[1];
                if(!empty($this->url[2])){
                    $this->action = $this->url[2];
                    if(!empty($this->url[3])){
                        $this->params = $this->url[3];
                    }else{
                        $this->params = '';
                    }
                }else{
                    $this->action =  'index';
                }
            }else{
                $this->controller = 'Home';
                $this->action = "index";
                $this->params = "";
            }
        }else{
            $this->controller = "Home";
            $this->action = "index";
            $this->params = "";
        }
        $controllerName = $this->controller.'Controller';
        $actionName = $this->action;
        $params = array($this->params);
        if(class_exists($controllerName)){
            $controller = new $controllerName();
            if(method_exists($controllerName,$actionName)){
                call_user_func_array(array($controller,$actionName), $params);
            }else{
                header("HTTP/1.0 404 Not Found");
            }
        }else{
            header("HTTP/1.0 404 Not Found");
            echo "<html>
                    <head>
                        <title>Página não encontrada</title>
                    </head>
                    <body>
                    <h1>ERRO 404. Página não encontrada </h1>
                    <p>A página que você está procurando não foi encontrada.</p>
                    <a href='./index.php'> Retornar para a página inicial</a>
                    </body>
                </html>";
        }

    }
}