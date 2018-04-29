<?php
class users_model extends Model{
  function __construct(){
    parent::__construct();
  }
  function get_all(){
    $data = $this->db->select('SELECT id_u,username_u,email_u,role_u,status_u FROM users');
    $count = 0;
    foreach ($data as $value) {
      $data[$count]['status_u'] = ($value['status_u'] == 1) ? Active : Deactive ;
      $count++;
    };
    $count = 0;
    foreach ($data as $value) {
      $data[$count]['role_u'] = ($value['role_u'] == 0) ? Admin : Moshtari ;
      $count++;
    };
    return $data;
  }
  function nu(){
    $values = $_POST;
    $data = array(
      'username_u'  =>  $values['username_u'],
      'pass_u'  =>  Hash::create(ALGO_PASSWORD, $values['pass_u'], KEY_PASSWORD),
      'email_u'  =>  $values['email_u'],
      'role_u'  =>  $values['role_u'],
      'status_u'=>  $values['status_u'],
      'time_u'  =>  time(),
      'time_m_u'  =>  time()
    );
    $status = $this->db->insert("users",$data);
  }
  function du($id){
    $this->db->delete('users', 'id_u="' . $id . '"');
  }
  function get_user($id){
    $data = $this->db->select("SELECT * FROM users WHERE id_u=$id", $array = array(), $fetch_style = PDO::FETCH_ASSOC, $fetch_kind = 'fetch');
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    return $data;
  }
  function eu($id){
    $values = $_POST;
    $data = array(
      'username_u'  =>  $values['username_u'],
      'pass_u'  =>  Hash::create(ALGO_PASSWORD, $values['pass_u'], KEY_PASSWORD),
      'email_u'  =>  $values['email_u'],
      'role_u'  =>  $values['role_u'],
      'status_u'=>  $values['status_u'],
      'time_m_u'  =>  time()
    );
    $this->db->update('users', $data, 'id_u="' . $id . '"');
  }
}
