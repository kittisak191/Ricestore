<?php session_start();
if(!empty($_SESSION['login_result']) AND ($_SESSION['login_result']==true)){
  require("admin.php");
}else{
  $_SESSION['login_result']=false;
   require("login.php");
}
?>
