<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: index3.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: home3.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: p5.php");
  exit;
 }