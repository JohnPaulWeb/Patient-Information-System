<?php
require 'data.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$errors = [];
$users = read_json('../JSON/users.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $email = trim($_POST['email'] ?? '');

    if ($username === '' || $password === '' || $email === '') {
        $errors[] = 'Please fill all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address.';
    } elseif (array_filter($users, fn($u) => $u['username'] === $username)) {
        $errors[] = 'Username has been exists.';
    } elseif (array_filter($users, fn($u) => isset($u['email']) && $u['email'] === $email)) { 
        $errors[] = 'Email has been registered.';
    }

    if (empty($errors)) {
        $newUser = [
            'id' => count($users) + 1,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email
        ];
        
        $users[] = $newUser;
        write_json('../JSON/users.json', $users);

        $_SESSION['user_id'] = $newUser['id'];
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

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

    
    <label for="email">Email</label>
      <input type="email" placeholder="Enter your Email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

      <label>Username</label>
      <input type="text" placeholder="Enter your Username" name="username" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

      <label>Password</label>
      <input type="password" placeholder="Enter your Password" name="password" required>

      
      <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>

  </div>
</div>



</body>
</html>