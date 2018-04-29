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

    $get = $this->db->select('SELECT id_u FROM users WHERE username_u=:username_u AND pass_u=:pass_u AND role_u=0',$array);

    $status = count($get);
    if($status == 1){
      Session::set('loggedIn_admin',TRUE);
      $isUser = TRUE;
    }
    else
    {
      $isUser = FALSE;
    }
    return $isUser;
  }
}
