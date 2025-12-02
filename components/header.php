<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


function is_logged_in() {
  return isset($_SESSION['user_id']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Patient Information System</title>
  <link rel="stylesheet" href="style.css"> 
</head>
<body>
<header>
  <h1>Patient Information System</h1>
</header>
<nav>
  <?php if (isset($_SESSION['username'])): ?>
    Hello, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b> |
    <a href="patients.php">My Patients</a> |
    <a href="add_patient.php">Add Patient</a> |
    <a href="logout.php">Logout</a>
  <?php else: ?>
    <a href="login.php">Login</a> |
    <a href="register.php">Register</a>
  <?php endif; ?>
</nav>
