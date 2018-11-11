<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: index1.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: home1.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: p3.php");
  exit;
 }