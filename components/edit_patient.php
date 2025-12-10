<?php
require 'data.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

$id = (int)($_GET['id'] ?? 0);
$patient = get_patient_by_id($id);
if (!$patient || $patient['user_id'] != $_SESSION['user_id']) {
  echo "<p style='color:red;'>Patient not found.</p>";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $age = (int)($_POST['age'] ?? 0);
  $diagnosis = trim($_POST['diagnosis'] ?? '');
  $contact = trim($_POST['contact_info'] ?? '');
  $location = trim($_POST['location'] ?? '');
  update_patient($id, $_SESSION['user_id'], $name, $age, $diagnosis, $contact, $location);
  header('Location: patients.php');
  exit;
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
  <h2>Edit Patient</h2>
  <form method="post">
    <label>Name</label>
    <input name="name" value="<?= htmlspecialchars($patient['name']) ?>" required>
    <label>Age</label>
    <input name="age" type="number" min="0" value="<?= htmlspecialchars($patient['age']) ?>" required>
    <label>Diagnosis</label>
    <textarea name="diagnosis" required><?= htmlspecialchars($patient['diagnosis']) ?></textarea>
    <label>Contact Info</label>
    <input name="contact_info" required value="<?= htmlspecialchars($patient['contact_info']) ?>">
    <label>Location</label>
    <input name="location" value="<?= htmlspecialchars($patient['location'] ?? '') ?>" required>
    <button type="submit">Update</button>
  </form>
</div>

</body>
</html>