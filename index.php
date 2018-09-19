<?php
  session_start();
  if(!isset($_SESSION['LOGIN_STATUS'])){
      header('location:login');
  }
  header('location:app');
?>
