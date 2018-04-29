<?php
class buy_model extends Model{
  function __construct(){
    parent::__construct();
  }
  function customerinfo($userID){
    $data = $this->db->select("SELECT name_ui,address_ui,tel_ui FROM userinfo WHERE id_u=$userID", $array = array(), $fetch_style = PDO::FETCH_ASSOC , $fetch_kind = 'fetch');
    if($data){

      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      return $data;
    }
    return FALSE;
  }
  function updateinfo($userID){
    $status = FALSE;
    $values = $_POST;
    $data = array(
      'id_u'        =>  $userID,
      'name_ui'     =>  $values['name_ui'],
      'address_ui'  =>  $values['address_ui'],
      'tel_ui'      =>  $values['tel_ui']
    );
    if($values['status']){
      $status = $this->db->update('userinfo', $data, 'id_u="' . $userID . '"');
    }
    else
    {
      $status =  $this->db->insert('userinfo', $data);
    }
    return $status;
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
  function get_paygates(){
    $data = $this->db->select("SELECT id_pg,name_pg FROM paygate WHERE status_pg=1");
    return $data;
  }
  function get_carts($userID){
    $data_cart = $this->db->select("SELECT id_p,count_c FROM cart WHERE id_u = $userID");
    return $data_cart;
  }
  function order($userID, $priceAll){
    $value  = array(
      'id_u'  =>  $userID,
      'price_o' =>  $priceAll,
      'pay_s' =>  0,
      'pay_t' =>  0,
      'time_o'  =>  time(),
      'status_o'=>  0
    );
    return $this->db->insertid('orders', $value);
  }
  function order_product($id_order, $data_cart){
    foreach ($data_cart as $values) {
      $value  = array(
        'id_o'    =>  $id_order,
        'id_p'    =>  $values['id_p'],
        'count_op'=>  $values['count_c']
      );
      return $this->db->insert('order_product', $value);
    }
  }
  function dc($userID){
    return $this->db->delete('cart', 'id_u="' . $userID . '"');
  }
}
