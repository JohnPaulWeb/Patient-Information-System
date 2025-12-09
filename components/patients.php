<?php
require '../components/data.php';
include '../components/header.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: ../components/login.php');
  exit;
}

$patients = get_patients_by_user($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patients Information System </title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<div class="container">
  <h2>My Patients</h2>
  <a href="add_patient.php" style="display:inline-block; margin-bottom:10px;">+ Add New Patient</a>

  <table>
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Diagnosis</th>
      <th>Contact</th>
       <th>Location</th>
      <th>Action</th>
     
    </tr>
    <?php foreach ($patients as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['age']) ?></td>
        <td><?= htmlspecialchars($row['diagnosis']) ?></td>
        <td><?= htmlspecialchars($row['contact_info']) ?></td>
        <td><?= htmlspecialchars($row['location'] ?? 'N/A') ?></td>
        <td>
          <a href="edit_patient.php?id=<?= $row['id'] ?>">Edit</a> |
          <a href="delete_patient.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this patient?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php include 'footer.php'; ?>
  
</body>
</html>