<?php

class View {

    function __construct() {
        
    }

    public function render($name, $data = array(), $show = 1) {

        extract($data);
        if ($show == 1) {

//            require 'jdf.php';
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        } elseif ($show == 2) {
//            require 'jdf.php';
            require 'views/head.php';
            require 'views/' . $name . '.php';
            require 'views/end.php';
        }
    }

}
