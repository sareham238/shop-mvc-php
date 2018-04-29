<?php

class Val {

    function __construct() {
        
    }

    public function Maxlength($data, $arg) {
        if (strlen($data) > $arg) {
            return "Your string can only be $arg long";
        }
    }

    public function Minlength($data, $arg) {
        if (strlen($data) < $arg) {
            return "Your string can only be $arg short";
        }
    }

    public function digit($data) {
        if (ctype_digit($data) == FALSE) {
            return "Your string must be a digit";
        }
    }

    public function __call($name, $arg) {

        throw new Exception("$name dose not exist inside of" . __CLASS__);
    }

}
