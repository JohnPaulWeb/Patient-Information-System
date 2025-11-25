<?php
require 'data.php';
// session_start();

$errors = [];
$users = read_json('users.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    
    $email = trim($_POST['email'] ?? '');
    // nag add ako ng Email

    if ($username === '' || $password === '') {
        $errors[] = 'Please fill all fields.';
    } elseif (array_filter($users, fn($u) => $u['username'] === $username)) {
        $errors[] = 'Username already exists.';
    }

    if (empty($errors)) {
        $newUser = [
            'id' => count($users) + 1,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $users[] = $newUser;
        write_json('users.json', $users);

        $_SESSION['user_id'] = $newUser['id'];
        $_SESSION['username'] = $username;

        header('Location: patients.php');
        exit;
    }
}
?>

<?php include 'header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Information System</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<div class="auth-wrapper">
  <div class="auth-box">
    <h2>Register</h2>

    
    <?php foreach ($errors as $e): ?>
      <div style="color:red; text-align:center; margin-bottom:10px;">
        <?= htmlspecialchars($e) ?>
      </div>
    <?php endforeach; ?>
    
    <form method="post">
      <label>Username</label>
      <input type="text" name="username" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <label for="email">Email</label>
      <input type="email" name="email" required>

      <button type="submit">Register</button>



      <?php include 'footer.php'; ?>
  
</body>
</html>