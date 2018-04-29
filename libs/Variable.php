<?php

class Variable {

  public function fa($admin){
    if($admin){
      require '../lang/fa.php';
    }
    else
    {
      require 'lang/fa.php';
    }
  }
}
