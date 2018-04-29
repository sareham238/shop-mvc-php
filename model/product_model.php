<?php
class product_model extends Model{
  function __construct(){
    parent::__construct();
  }
  function get($id){
    $data = $this->db->select("SELECT * FROM products WHERE id_p=$id", $array = array(), $fetch_style = PDO::FETCH_ASSOC, $fetch_kind = 'fetch');
    if($data['status_p'] == 0){
      return FALSE;
    }
    return $data;
  }
}
