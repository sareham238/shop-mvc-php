<?php
class Useraccess {
  public static function user_controller(){
    Session::init();
    $isLogin = Session::get('loggedIn');
    if (!$isLogin) {
      header('location: ' . URL . 'login');
      exit();
    }
  }
  public static function admin_controller(){
    Session::init();
    $isLogin = Session::get('loggedIn_admin');
    if (!$isLogin) {
      header('location: ' . URL . 'admin/login');
      exit();
    }
  }
}
