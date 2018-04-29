<?php

class index extends Controller{
  function __construct(){
    parent::__construct();
    Useraccess::admin_controller();
    $this->view->nofollow = TRUE;
  }
  function Index($data = array()){

    $this->view->render("index/dashboad",$data);
  }
}
