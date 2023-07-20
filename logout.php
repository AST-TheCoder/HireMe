<?php
  session_start();
  include_once 'config/Constants.php';
  unset($_SESSION['user']['id']);
  header('location: ' . ROOT . 'login.php');
?>