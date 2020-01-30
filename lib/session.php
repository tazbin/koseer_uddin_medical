<?php

class session{

  public static function init(){
    session_start();
  }

  public static function destroy(){
    session_start();
    session_unset();
    session_destroy();

    header('Location: '.BASE_URL.'/index.php');
  }

  public static function set($key, $value){
    $_SESSION[$key] = $value;
  }

  public static function get($key){
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else{
      return false;
    }
  }

  public static function adminIsLogin(){
    if ( isset($_SESSION['login']) && $_SESSION['login'] == 1 ) {
      header('Location: '.BASE_URL.'/home.php');
    }
  }

  public static function adminIsNotLogin(){
    if ( !isset($_SESSION['login']) ) {
      header('Location: '.BASE_URL.'/index.php');
    }
  }
}


 ?>
