<?php

class Session {

  public static function init() {
    @session_start();
  }
  public static function set($key,$value) {
    $_SESSION[$key] = $value;
  }
  public static function get($key) {

    if(isset($_SESSION[$key])){
      return $_SESSION[$key];
    }
    else {
      return FALSE;
    }
  }
  public static function unset($key) {

    if(isset($_SESSION[$key])){
      unset($_SESSION[$key]);
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
  public static function destroy() {
    session_destroy();
  }
}
