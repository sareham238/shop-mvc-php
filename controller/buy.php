<?php
class buy extends Controller{
  function __construct(){
    parent::__construct();
    Useraccess::user_controller();
    $this->view->nofollow = TRUE;
  }
  function sendpayment($paygate, $priceAll){
    header("refresh:5;url=". URL . "buy/bank");
    $this->view->render("buy/sendpayment");
  }
  function no($paygate, $priceAll){
    $userID = Session::get('userid');
    $data_cart = $this->model->get_carts($userID);
    if($data_cart){
      echo $id_order = $this->model->order($userID, $priceAll);
      if($id_order){
        $status = $this->model->order_product($id_order, $data_cart);
        if($status){
          $status_d = $this->model->dc($userID);
          if($status_d) {
            header('location:' . URL . 'buy/sendpayment/' . $paygate . '/' . $priceAll);
            exit();
          }else {
            //error
          }
        }
        else {
          //error
        }
      }
      else {
        //error
      }
    }
    else {
      header('location:' . URL . 'cart');
      exit();
    }
  }
  function customerinfo(){
    $userID = Session::get('userid');
    $data_cart = $this->model->get_carts($userID);
    if($data_cart){
      $userID = Session::get('userid');
      if($_POST){
        $status = $this->model->updateinfo($userID);
        if($status){
          header('location:' . URL . 'buy/payment');
          exit();
        }
        header('location:' . URL . 'buy/customerinfo');
        exit();
      }
      else
      {
        $this->view->status = 0;
        $this->view->customerinfo = $this->model->customerinfo($userID);
        if($this->view->customerinfo){
          $this->view->status = 1;
        }
        $this->view->render("buy/edit");
      }
    }
    else {
      header('location:' . URL . 'cart');
      exit();
    }
  }
  function payment(){
    $userID = Session::get('userid');
    $data_cart = $this->model->get_carts($userID);
    if($data_cart){
      if($_POST){
        if(isset($_POST['paygate'])) {
          buy::no($_POST['paygate'], $_POST['priceAll']);
        }
        else {
          $this->view->massage['err_paygate'] = 1;
        }
      }
      $sumCount = 0;
      $sumPrice = 0;
      $count = 0;
      $this->view->cart = $this->model->get_cart($userID);
      foreach ($this->view->cart as $cart) {
        $this->view->cart[$count++]['price_all'] = Math::sumPrice($cart['price_p'], $cart['count_c']);
        $sumPrice += Math::sumPrice($cart['price_p'], $cart['count_c']);
        $sumCount += $cart['count_c'];
      }
      $this->view->sumPrice = $sumPrice;
      $this->view->sumCount = $sumCount;
      $this->view->customerinfo = $this->model->customerinfo($userID);
      $this->view->paygates = $this->model->get_paygates();

      $this->view->render("buy/payment");
    }
    else {
      header('location:' . URL . 'cart');
      exit();
    }
  }
  function bank(){
    $this->view->render("buy/bank", $data = array(), $show = 2);
  }
}
