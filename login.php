<?php
session_start();
require 'config/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Census RMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('assets/images/bg.png') no-repeat center center fixed;
      background-size: cover;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 30px 40px;
      border-radius: 10px;
      max-width: 400px;
      width: 100%;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      margin: auto;
    }

    .center-wrapper {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h2 {
      text-align: center;
      color: #2e7d32;
      margin-bottom: 20px;
    }

    input[type="email"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #2e7d32;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }

    button:hover {
      background-color: #256d27;
    }

    .error {
      color: red;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="center-wrapper">
  <form method="POST" class="login-container">
    <h2>Census RMS Login</h2>
    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
</div>

</body>
</html>
