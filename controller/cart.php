<?php

class cart extends Controller{
  function __construct(){
    parent::__construct();
    Useraccess::user_controller();
    $this->view->nofollow = TRUE;
  }
  function index($data = array()){
    $sumCount = 0;
    $sumPrice = 0;
    $count = 0;
    $userID = Session::get('userid');
    $this->view->cart = $this->model->get_cart($userID);
    foreach ($this->view->cart as $cart) {
      $this->view->cart[$count++]['price_all'] = Math::sumPrice($cart['price_p'], $cart['count_c']);
      $sumPrice += Math::sumPrice($cart['price_p'], $cart['count_c']);
      $sumCount += $cart['count_c'];
    }
    $this->view->sumPrice = $sumPrice;
    $this->view->sumCount = $sumCount;
    $this->view->render("cart/index",$data);
  }
  function nc(){
    $this->model->nc();
    header('location:' . URL . 'cart');
    exit();
  }
  function dc($id){
    $this->model->dc($id);
    header('location:' . URL . 'cart');
    exit();
  }
}
