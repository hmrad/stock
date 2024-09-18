<?php

class app {
    public function __construct() {

        $url = '/'. ($_GET['url'] ?? "");
        $request_type = $_SERVER['REQUEST_METHOD'];


        $routes = [
            'register_form' => [
                'type'=>"GET",
                'pattern_url'=>'/^\/auth\/register$/',
                'controller'=> 'authController',
                'action'=>'register',
            ],
            'register'=> [
                'type'=>'POST',
                'pattern_url'=>'/^\/auth\/register_user$/',
                'controller'=>'authController',
                'action'=>'register_user',
            ],
            'login_form' => [
                'type'=>'GET',
                'pattern_url'=>'/^\/auth\/login$/',
                'controller'=>'authController',
                'action'=>'login',
            ],
            'login' => [
                'type'=>'POST',
                'pattern_url'=>'/^\/auth\/login_user$/',
                'controller'=>'authController',
                'action'=>'login_user',
            ],
            'dashboard_page'=> [
                'type'=>'GET',
                'pattern_url'=>'/^\/dashboard\/main_page$/',
                'controller'=>'dashboardController',
                'action'=>'dashboard',
                'middleware'=>['user_policy:not_logged_in:auth/login']
            ],
            'dashboard_profile'=> [
                'type'=>'GET',
                'pattern_url'=>'/^\/dashboard\/profile_page$/',
                'controller'=>'dashboardController',
                'action'=>'dashboard_profile',
                'middleware'=>['user_policy:not_logged_in:auth/login']
            ],
            'dashboard_inventory'=> [
                'type'=>'GET',
                'pattern_url'=>'/^\/dashboard\/inventory_page$/',
                'controller'=>'dashboardController',
                'action'=>'dashboard_inventory',
                'middleware'=>['user_policy:not_logged_in:auth/login']
            ],
            'dashboard_producy'=> [
                'type'=>'GET',
                'pattern_url'=>'/^\/dashboard\/product_page$/',
                'controller'=>'dashboardController',
                'action'=>'dashboard_product',
                'middleware'=>['user_policy:not_logged_in:auth/login']
            ],
            'company_set'=>[
                'type'=>'POST',
                'pattern_url'=>'/^\/dashboard\/company_set$/',
                'controller'=>'dashboardController',
                'action'=>'company_set',
                
            ],
            'logout'=>[
                'type'=>'GET',
                'pattern_url'=>'/^\/auth\/logout$/',
                'controller'=>'authController',
                'action'=>'logout',
            ],
            'inventory_set'=>[
                'type'=>'POST',
                'pattern_url'=>'/^\/dashboard\/inventory_set$/',
                'controller'=>'dashboardController',
                'action'=>'inventory_set',
            ],
            'product_set'=>[
                'type'=>'POST',
                'pattern_url'=>'/^\/dashboard\/product_set$/',
                'controller'=>'dashboardController',
                'action'=>'product_set',
            ]
            // 'company_check'=>[
            //     'type'=>"GET",
            //     'pattern_url'=>'/^\/dashboard\/company_check$/',
            //     'controller'=>'dashboardController',
            //     'action'=>'company_check',
            // ]
        ];

        foreach($routes as $route) {
            if(preg_match($route['pattern_url'],$url,$matches) && $request_type === $route['type']) {

                if(isset($route['middleware']) && $route['middleware'] != '') {
                    foreach($route['middleware'] as $each) {
                        $policy = explode(':', $each);
                        $policy_class = $policy[0];
                        $policy_action = $policy[1];
                        $param = (array) $policy[2];

                        require_once 'app/policy/' . $policy_class . '.php';
                        $object = new $policy_class();
                        call_user_func_array([$object, $policy_action], $param);
                    }
                }
                
                unset($matches[0]);
                require "app/controllers/".$route['controller'].".php";
                $object = new $route['controller'];
                call_user_func_array([$object,$route['action']],$matches);
            }
        }
        if(!isset($_GET['url'])) {
            require "app/controllers/mainController.php";
            $object = new mainController();
            $object->main();
        }
    }
}