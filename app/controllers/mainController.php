<?php

class mainController extends controller {
    public function __construct() {
        parent::__construct();
    }

    public function main() {
        $this->header("header");
        $this->view('main');
        $this->footer("footer");
    }
}