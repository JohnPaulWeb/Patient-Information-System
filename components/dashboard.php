<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Information System</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>

<header>
    <h1>Patient Information System</h1>
</header>

<div class="welcome-message">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>.</h2>
    <p>Here’s your dashboard</p>
</div>

<div class="dashboard-container">
    <div class="dashboard-buttons">
        <a href="patients.php" class="dash-btn">My Patients</a>
        <a href="add_patient.php" class="dash-btn">Add Patient</a>
        <a href="logout.php" class="dash-btn logout">Logout</a>
    </div>
</div>

</body>
</html>
