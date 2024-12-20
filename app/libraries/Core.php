<?php
// url = controller / method / param
 class Core{

    private $controller = "pages";
    private $methode = "index";
    private $param = [];
    public function __construct(){

        $url = $this->geturl();

        if(isset($url[0])){
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                $this->controller = ucwords($url[0]);
                unset($url[0]);
            }
            
        }

        
        require_once '../app/controllers/'.$this->controller.'.php';

        // instantiation of controller

        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->methode = $url[1];
                unset($url[1]);
            }

        }

        $this->param = $url ? array_values($url) : []; //ternary operator
        
        call_user_func_array([$this->controller,$this->methode],$this->param);
    }

    public function geturl(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = filter_var($url , FILTER_SANITIZE_URL);
            $url = rtrim($url,'/');
            $url = explode('/',$url);

            return $url;
        }
    }

 }