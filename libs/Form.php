<?php

/**
 * 
 * - Fill out The form
 * - Post to PHP
 * - Sanitize
 * - Validate
 * - Return Data
 * - write to Database
 * 
 */
class Form {

    /**
     *
     * @var array $__currentItem The immediatly posted item
     */
    private $__currentItem = null;

    /**
     * @var object $postdata The Validator Object 
     */
    private $__val = array();

    /**
     * @var array $error Get Error Form Val
     */
    private $__error = array();

    /**
     * @var array $postdata Stores The Post Data 
     */
    private $__postdata = array();

    function __construct() {
        require '../libs/Val.php';

        $this->__val = new Val();
    }

    public function post($fieldname) {

        $this->__postdata[$fieldname] = $_POST[$fieldname];
        $this->__currentItem = $fieldname;

        return $this;
    }

    /**
     * Fetch - Return the posted data
     * 
     * @param mixed $fieldname
     * @return mixed string or array
     */
    public function fetch($fieldname = FALSE) {
        if (isset($this->__postdata[$fieldname]))
            return $this->__postdata[$fieldname];
        else
            return$this->__postdata;
    }

    /**
     * 
     * val - This to validator
     */
    public function val($typePostValidator, $arg = NULL) {

        if ($arg == NULL) {
            $error = $this->__val->{$typePostValidator}($this->__postdata[$this->__currentItem]);
        } else {
            $error = $this->__val->{$typePostValidator}($this->__postdata[$this->__currentItem], $arg);
        }

        if ($error) {
            $this->__error[$this->__currentItem] = $error;
        }

        print_r($error);

        return $this;
    }

    public function sumbit() {
        if (empty($this->__error)) {
            return TRUE;
        } else {
            $sth = "";
            foreach ($this->__error as $key => $value) {

                $sth.=$key . '=>' . $value . "\n";
            }
            throw new Exception($sth);
        }
    }

}
