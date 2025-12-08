<?php
session_start();
require 'data.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$username = $_SESSION['username'] ?? 'User';

$patients = get_patients_by_user($userId);

$totalPatients = count($patients);
$today = date('Y-m-d');
$newPatients = 0;

foreach ($patients as $p) {
    if (($p['created_at'] ?? '') === $today) {
        $newPatients++;
    }
}

$activePatients = $totalPatients;

$q = trim($_GET['q'] ?? '');
if ($q !== '') {
    $patients = array_values(array_filter($patients, function ($p) use ($q) {
        return stripos($p['name'], $q) !== false;
    }));
}

usort($patients, fn($a, $b) => $b['id'] <=> $a['id']);
$recent = array_slice($patients, 0, 5);
?>

<?php include 'header.php'; ?>

<div class="dashboard">

  <h2>Hello, <?= htmlspecialchars($username) ?></h2>
  <p>Manage patient records safely</p>

  <div class="cards">
      <div class="card"><b><?= $totalPatients ?></b><br>Total Patients</div>
      <div class="card"><b><?= $newPatients ?></b><br>New Patients</div>
      <div class="card"><b><?= $activePatients ?></b><br>Active</div>
  </div>

  <form class="search" method="get">
      <input type="text" name="q" placeholder="Search Patient" value="<?= htmlspecialchars($q) ?>">
  </form>

  <div class="list">
    <h3>Recent Patients</h3>

    <?php if (empty($recent)): ?>
        <p>No patients yet.</p>
    <?php else: ?>
        <?php foreach ($recent as $p): ?>
            <p><?= htmlspecialchars($p['name']) ?> | <?= htmlspecialchars($p['diagnosis']) ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <div class="dashboard-buttons">
      <a href="add_patient.php" class="btn primary">Add Patient</a>
      <a href="patients.php" class="btn primary view-all">View All</a>
      <a href="logout.php" class="btn primary logout">Logout</a>
  </div>

</div>

<?php include 'footer.php'; ?>
