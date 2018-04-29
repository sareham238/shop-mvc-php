<?php
class settings extends Controller{
  function __construct(){
    parent::__construct();
    Useraccess::admin_controller();
    $this->view->nofollow = TRUE;
  }
  function Index(){
    $this->view->paygates = $this->model->get_paygates();
    $this->view->render("settings/index");
  }
  function npg(){
    $this->view->paygate = array(
      'id_pg'     =>  0,
      'name_pg'   =>  '',
      'api_pg'    =>  '',
      'status_pg' =>  '0',
    );
    if($_POST){
      if($_POST['name_pg'] == "" || $_POST['api_pg'] == ""){
        if($_POST['name_pg'] == "") $this->view->massage['err_name'] = 1;
        if($_POST['api_pg'] == "") $this->view->massage['err_api'] = 1;
      }else {
        $this->model->npg();
      }
    }
    $this->view->render("settings/edit");
  }
  function dpg($id){
    $this->model->dpg($id);
    header('location:' . URL . 'admin/settings');
  }
  function epg($id){
    if($_POST){
      if($_POST['name_pg'] == "" || $_POST['api_pg'] == ""){
        if($_POST['name_pg'] == "") $this->view->massage['err_name'] = 1;
        if($_POST['api_pg'] == "") $this->view->massage['err_api'] = 1;
      }else {
        $this->model->epg($id);
      }
    }
    $this->view->paygate = $this->model->get_paygate($id);
    $this->view->render("settings/edit");
  }
}
