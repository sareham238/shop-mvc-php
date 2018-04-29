<?php
class index extends Controller{
  function __construct(){
    parent::__construct();
    Session::init();
  }
  function index($data = array()){
    $this->view->render("index/index",$data);
  }
}
