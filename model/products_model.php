<?php

class products_model extends Model{
  function __construct(){
    parent::__construct();
  }
  function get_all(){
    $data = $this->db->select('SELECT * FROM products WHERE status_p=1');
    return $data;
  }
}
