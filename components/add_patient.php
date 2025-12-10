<?php
require 'data.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: ../components/login.php');
  exit;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $age = (int)($_POST['age'] ?? 0);
  $diagnosis = trim($_POST['diagnosis'] ?? '');
  $contact = trim($_POST['contact_info'] ?? '');
  $location = trim($_POST['location'] ?? '');

  if ($name === '' || $age <= 0) $errors[] = 'Name and valid age are required.';

  if (empty($errors)) {
    add_patient($_SESSION['user_id'], $name, $age, $diagnosis, $contact, $location);
    header('Location: patients.php');
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Patient Information System</title>
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>

  <div class="container">
    <h2>Add Patient</h2>

    <?php foreach ($errors as $e) echo "<div style='color:red;'>$e</div>"; ?>

    <form method="post">
      <label>Name:</label>
      <input name="name" required>
      <label>Age:</label>
      <input name="age" type="number" min="0" required>
      <label>Diagnosis:</label>
      <textarea name="diagnosis"></textarea>
      <label>Contact Info:</label>
      <input name="contact_info">
      <label>Location:</label>
      <input name="location">
      <button type="submit">Add</button>
    </form>
  </div>

</body>

</html>