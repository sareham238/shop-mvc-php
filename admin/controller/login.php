<?php
class login extends Controller{
  function __construct(){
    parent::__construct();
    Session::init();
    $this->view->nofollow = TRUE;
  }
  function index($data = array()){
    $login = Session::get('loggedIn_admin');
    if ($login == TRUE) {
      header('location: ' . URL . 'admin');
      exit();
    }
    if ($_POST) {
      if($_POST['username_u'] == '' || $_POST['pass_u'] == ''){
        if($_POST['username_u'] == '') $this->view->massage['err_username'] = 1;
        if($_POST['pass_u'] == '') $this->view->massage['err_password'] = 1;
        $this->view->render("login/index",$data);
      }
      else{
        $isUser = $this->model->run();
        if($isUser){
          header('location:' . URL . 'admin');
          exit;
        }
        else {
          $this->view->massage['err_login'] = 1;
          $this->view->render("login/index",$data);
        }
      }
    }
    else{
      $this->view->render("login/index",$data);
    }
  }
  function end(){
    Session::unset('loggedIn_admin');

    header('location: ' . URL . 'admin/login');

    exit();
  }
}
