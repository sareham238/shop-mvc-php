<?php

class products_model extends Model{
  function __construct(){
    parent::__construct();
  }
  function get_all(){
    $data = $this->db->select('SELECT id_p,name_p,price_p,count_p,status_p FROM products');
    $count = 0;
    foreach ($data as $value) {
      $data[$count]['status_p'] = ($value['status_p'] == 1) ? Active : Deactive ;
      $count++;
    };
    return $data;
  }
  function np(){
    $values = $_POST;
    $data = array(
      'name_p'  =>  $values['name_p'],
      'disc_p'  =>  $values['disc_p'],
      'img_p'   =>  $values['img_p'],
      'price_p' =>  $values['price_p'],
      'count_p' =>  $values['count_p'],
      'status_p'=>  $values['status_p'],
      'time_p'  =>  time(),
      'time_m_p'  =>  time()
    );
    $status = $this->db->insert("products",$data);
  }
  function dp($id){
    $this->db->delete('products', 'id_p="' . $id . '"');
  }
  function get_product($id){
    $data = $this->db->select("SELECT * FROM products WHERE id_p=$id", $array = array(), $fetch_style = PDO::FETCH_ASSOC, $fetch_kind = 'fetch');
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    return $data;
  }
  function ep($id){
    $values = $_POST;
    $data = array(
      'name_p'  =>  $values['name_p'],
      'disc_p'  =>  $values['disc_p'],
      'img_p'   =>  $values['img_p'],
      'price_p' =>  $values['price_p'],
      'count_p' =>  $values['count_p'],
      'status_p'=>  $values['status_p'],
      'time_m_p'  =>  time()
    );
    $this->db->update('products', $data, 'id_p="' . $id . '"');
  }
}
