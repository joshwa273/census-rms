<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

if (!isset($_GET['id'])) {
  header('Location: list_users.php');
  exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
  header('Location: list_users.php');
  exit();
}

$full_name = $user['full_name'];
$email = $user['email'];
$role = $user['role'];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $full_name = trim($_POST['full_name']);
  $email = trim($_POST['email']);
  $role = $_POST['role'];

  if ($full_name && $email && $role) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = "Invalid email format.";
    } else {
      $stmt = $pdo->prepare("UPDATE users SET full_name = ?, email = ?, role = ? WHERE id = ?");
      $stmt->execute([$full_name, $email, $role, $id]);
      header('Location: list_users.php');
      exit();
    }
  } else {
    $error = "All fields are required.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User - Census RMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f4f3;
      margin: 0;
    }

    .main-content {
      margin-left: 220px;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .form-card {
      background: white;
      border-left: 5px solid #2e7d32;
      width: 600px;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.06);
    }

    .form-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .form-header h2 {
      color: #2e7d32;
      margin: 0;
    }

    .back-link {
      font-size: 14px;
      text-decoration: none;
      color: #2e7d32;
    }

    .back-link:hover {
      text-decoration: underline;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: 600;
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input, select {
      width: 100%;
      padding: 10px 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 15px;
    }

    .error {
      color: red;
      margin-bottom: 15px;
      text-align: center;
    }

    .submit-btn {
      background: #2e7d32;
      color: white;
      padding: 12px 20px;
      border: none;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
    }

    .submit-btn:hover {
      background: #256d27;
    }

    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
        padding: 20px;
      }

      .form-card {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
  <div class="form-card">
    <div class="form-header">
      <h2>Edit User</h2>
      <a class="back-link" href="list_users.php">&larr; Back</a>
    </div>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="form-group">
        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name" value="<?= htmlspecialchars($full_name) ?>" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>
      </div>

      <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="role" required>
          <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Admin</option>
          <option value="enumerator" <?= $role === 'enumerator' ? 'selected' : '' ?>>Enumerator</option>
          <option value="viewer" <?= $role === 'viewer' ? 'selected' : '' ?>>Viewer</option>
        </select>
      </div>

      <button type="submit" class="submit-btn">Update User</button>
    </form>
  </div>
</div>

</body>
</html>
