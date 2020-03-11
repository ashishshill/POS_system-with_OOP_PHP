<?php
/**
*Session Class
**/
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){
  $_SESSION[$key] = $val;
 }

 public static function get($key){
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
  } else {
   return false;
  }
 }

 public static function checkAdminSession(){
  self::init();
  if (self::get("adminLogin")== false) {
   self::destroy();
   header("Location:login.php");
  }
 }

 public static function checkAdminLogin(){
  self::init();
  if (self::get("adminLogin")== true) {
   header("Location:index.php");
  }
 }

 public static function checkCmLogin(){
  self::init();
  if (self::get("cmLogin")== true) {
   header("Location:index.php");
  }
 }

 /*public static function checkBranchSession(){
  self::init();
  if (self::get("adminStatus") > 1) {
   $emp = self::get("empId");
   header("Location:index.php");
  }
} */

 public static function checkSession(){
  self::init();
  if (self::get("login")== false) {
   self::destroy();
   header("Location:login.php");
  }
 }

 public static function checkLogin(){
  self::init();
  if (self::get("login")== true) {
   header("Location:index.php");
  }
 }

 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }
}
?>
