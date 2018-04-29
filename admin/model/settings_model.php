<?php
class settings_model extends Model{
  function __construct(){
    parent::__construct();
  }
  function get_paygates(){
    $data = $this->db->select("SELECT id_pg,name_pg,api_pg,status_pg FROM paygate");
    $count = 0;
    foreach ($data as $value) {
      $data[$count]['status_pg'] = ($value['status_pg'] == 1) ? Active : Deactive ;
      $count++;
    }
    return $data;
  }
  function npg(){
    $values = $_POST;
    $data = array(
      'name_pg'   =>  $values['name_pg'],
      'api_pg'    =>  $values['api_pg'],
      'status_pg' =>  $values['status_pg']
    );
    $status = $this->db->insert('paygate',$data);
  }
  function dpg($id){
    $this->db->delete('paygate', 'id_pg="' . $id . '"');
  }
  function get_paygate($id){
    $data = $this->db->select("SELECT * FROM paygate WHERE id_pg=$id", $array = array(), $fetch_style = PDO::FETCH_ASSOC, $fetch_kind = 'fetch');
    return $data;
  }
  function epg($id){
    $values = $_POST;
    $data = array(
      'name_pg'   =>  $values['name_pg'],
      'api_pg'    =>  $values['api_pg'],
      'status_pg' =>  $values['status_pg']
    );
    $this->db->update('paygate', $data, 'id_pg="' . $id . '"');
  }
}
