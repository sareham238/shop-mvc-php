<?php
class product extends Controller{
  function __construct(){
    parent::__construct();
    Session::init();
  }
  function show($id){
    $this->view->product = $this->model->get($id);
    if(!$this->view->product){
      header('location:' . URL);
      exit();
    }
    $this->view->count = 1;
    $this->view->render("product/show",$data = array());
  }
}
