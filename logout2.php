<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: index2.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: home2.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: p4.php");
  exit;
 }