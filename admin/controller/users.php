<?php
class users extends Controller{
  function __construct(){
    parent::__construct();
    Useraccess::admin_controller();
    $this->view->nofollow = TRUE;
  }
  function Index($data = array()){
    $this->view->users = $this->model->get_all();
    $this->view->render("users/list",$data);
  }
  function nu($data = array()){
    $this->view->user = array(
      "id_u"      =>  0,
      'username_u'    =>  "",
      'pass_u'    =>  "",
      'email_u'    =>  "",
      'role_u'    =>  "",
      'status_u'  =>  '0'
    );
    if ($_POST) {
      if($_POST['username_u'] == ""){
        if($_POST['username_u'] == "") $this->view->massage['err_name'] = 1;
      }else {
        $this->model->nu();
      }
    }
    $this->view->render("users/edit",$data);
  }
  function du($id){
    $this->model->du($id);
    header('location: ' . URL . 'admin/users');
  }
  function eu($id){
    if ($_POST) {
      if($_POST['username_u'] == ""){
        if($_POST['username_u'] == "") $this->view->massage['err_name'] = 1;
      }else {
        $this->model->eu($id);
      }
    }
    $this->view->user = $this->model->get_user($id);
    $this->view->render("users/edit");
  }
}
