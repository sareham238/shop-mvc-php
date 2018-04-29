<?php

class Controller {
    function __construct() {
        require 'jdf.php';
        // require 'resize.php';
        // require 'sms.php';
        $this->view = new View();
    }

    public function loadModel($name, $modelPath) {
        $path = $modelPath . $name . '_model.php';
        if (file_exists($path)) {
            require $path;
            $filename = $name . '_model';
            $this->model = new $filename();
        }
    }

}
