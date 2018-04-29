<?php
class cart_model extends Model{
  function __construct(){
    parent::__construct();
  }
  function get_cart($userID){
    $data = $this->db->select("SELECT id_c,id_p,count_c,time_c FROM cart WHERE id_u=$userID");
    $count = 0;
    foreach ($data as $product) {
      $productID =  $product['id_p'];
      $products[$count] = $this->db->select("SELECT name_p,price_p FROM products WHERE id_p=$productID", $array = array(), $fetch_style = PDO::FETCH_ASSOC, $fetch_kind = 'fetch');
      $data[$count]['name_p'] = $products[$count]['name_p'];
      $data[$count]['price_p'] = $products[$count]['price_p'];
      $count++;
    }
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    return $data;
  }
  function nc(){
    $values = $_POST;
    $data = array(
      'id_p'    =>  $values['id_p'],
      'id_u'    =>  $values['id_u'],
      'count_c' =>  $values['count'],
      'time_c'  =>  time(),
      'status_c'=>  1
    );
    $status = $this->db->insert("cart",$data);
  }
  function dc($id){
    $this->db->delete('cart', 'id_c="' . $id . '"');
  }
}
