<?php
class login_model extends Model{
  function __construct(){
    parent::__construct();
  }
  function run(){
    $isUser = FALSE;

    $array = array(
      'username_u'  =>  $_POST['username_u'],
      'pass_u'      =>  Hash::create(ALGO_PASSWORD,$_POST['pass_u'],KEY_PASSWORD)
    );

    $get = $this->db->select('SELECT id_u,role_u FROM users WHERE username_u=:username_u AND pass_u=:pass_u',$array);

    $status = count($get);
    if($status == 1){
      Session::set('loggedIn',TRUE);
      Session::set('role',$get[0]['role_u']);
      Session::set('userid',$get[0]['id_u']);
      $isUser = TRUE;
    }
    else
    {
      $isUser = FALSE;
    }
    return $isUser;
  }
}
