<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


function is_logged_in()
{
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
      <div style="display: flex; justify-content: space-between; align-items: center;">
        <span style="color: white;">Hello, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b></span>
        <div style="text-align: center; flex: 1;">
          <a href="patients.php"><button>My Patients</button></a> 
          <a href="add_patient.php"><button>Add Patient</button></a>
        </div>
        <div>
          <a href="logout.php">Logout</a>
        </div>
      </div>
    <?php else: ?>
      <!-- <a href="login.php">Login</a> |
      <a href="register.php">Register</a> -->
    <?php endif; ?>
  </nav>