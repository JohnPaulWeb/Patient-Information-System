<?php
require 'data.php';
session_start();

if (!isset($_SESSION['user_id'])) { 
  header('Location: login.php'); 
  exit; 
}

$id = (int)($_GET['id'] ?? 0);
delete_patient($id, $_SESSION['user_id']);
header('Location: patients.php');
exit;
?>
