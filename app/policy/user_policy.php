<?php

class user_policy extends controller {
    public function __construct() {
        parent::__construct();
    }

    public function not_logged_in($headway) {
        if(!isset($_SESSION['user_id'])) {
            header('Location:'.URL.$headway);
            return 1;
        }
        return 0;
    }

}