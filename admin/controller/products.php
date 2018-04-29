<?php

class products extends Controller{
  function __construct(){
    parent::__construct();
    Useraccess::admin_controller();
    $this->view->nofollow = TRUE;
  }
  function Index($data = array()){
    $this->view->products = $this->model->get_all();
    $this->view->render("products/list",$data);
  }
  function np($data = array()){
    $this->view->product = array(
      'id_p'      =>  0,
      'name_p'    =>  "",
      'disc_p'    =>  "",
      'img_p'     =>  "",
      'price_p'   =>  '0',
      'count_p'   =>  '0',
      'price_p'   =>  '0',
      'status_p'  =>  '0'
    );
    if ($_POST) {
      if($_POST['name_p'] == "" || $_POST['disc_p'] == ""){
        if($_POST['name_p'] == "") $this->view->massage['err_name'] = 1;
        if($_POST['disc_p'] == "") $this->view->massage['err_disc'] = 1;
      }else {
        $this->model->np();
      }
    }
    $this->view->render("products/edit",$data);
  }
  function dp($id){
    $this->model->dp($id);
    header('location: ' . URL . 'admin/products');
  }
  function ep($id){
    if ($_POST) {
      if($_POST['name_p'] == "" || $_POST['disc_p'] == ""){
        if($_POST['name_p'] == "") $this->view->massage['err_name'] = 1;
        if($_POST['disc_p'] == "") $this->view->massage['err_disc'] = 1;
      }else {
        $this->model->ep($id);
      }
    }
    $this->view->product = $this->model->get_product($id);
    $this->view->render("products/edit");
  }
}
