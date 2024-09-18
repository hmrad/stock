<?php 

class controller {
    public function __construct () {}
    public function view($view_path,$data = []) {
        require "views/".$view_path.".php";
    }
    public function model($model_path) {
        require "app/models/".$model_path.".php";   
        return new $model_path;
    }

    public function alert(string $message)
    {
        $_SESSION['alert']['message'] = $message;
        return;
    }

    public function header(string $header_path): void
    {
        require "views/layout/" . $header_path . ".php";
    }

    /**
     * require desired footer
     * @param string $footer_path
     * @return void
     */
    public function footer(string $footer_path): void
    {
        require "views/layout/" . $footer_path . ".php";
    }
}