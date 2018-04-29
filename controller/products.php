<?php

class products extends Controller{
  function __construct(){
    parent::__construct();
    Session::init();
  }
  function Index($data = array()){
    $this->view->products = $this->model->get_all();
    $this->view->count = 1;
    $this->view->render("products/index",$data);
  }
}
