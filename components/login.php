<?php
require '../components/data.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$errors = [];
$users = read_json('../JSON/users.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $email = trim($_POST['email'] ?? '');
    
    $user = null;
    foreach ($users as $u) {
        if ($u['username'] === $username) {
            $user = $u;
            break;
        }
    }

    if ($user) {
        if (!password_verify($password, $user['password'])) {
            $errors[] = 'Invalid username or password.';
        } elseif (!isset($user['email']) || strtolower($user['email']) !== strtolower($email)) {
            $errors[] = 'Email does not match registered email.';
        } else {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'] ?? '';
            header('Location: patients.php');
            exit;
        }
    } else {
        $errors[] = 'Invalid username or password.';
    }
}
?>

<?php include '../components/header.php'; ?>

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
    <h2>Login</h2>

    <?php foreach ($errors as $e): ?>
      <div style="color:red; text-align:center; margin-bottom:10px;">
        <?= htmlspecialchars($e) ?>
      </div>
    <?php endforeach; ?>

    <form method="post">
      <label>Username</label>
      <input type="text" placeholder="Enter your Username" name="username" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

      <label>Password</label>
      <input type="password" placeholder="Enter your Password" name="password" required>

      <label>Email</label>
      <input type="email" placeholder="Enter your Email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

      <button type="submit">Login</button>
    </form>

    <p>Don’t have an account? <a href="register.php">Register</a></p>
  </div>
</div>

<?php include '../components/footer.php'; ?>

</body>
</html>