<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}
require '../config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM regions WHERE id = ?");
$stmt->execute([$id]);
$region = $stmt->fetch();

if (!$region) {
    header('Location: index.php');
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $code = trim($_POST['code']);

    if ($name && $code) {
        $stmt = $pdo->prepare("UPDATE regions SET name = ?, code = ? WHERE id = ?");
        $stmt->execute([$name, $code, $id]);
        header('Location: index.php');
        exit();
    } else {
        $error = 'All fields are required.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Region</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    .main-content {
      margin-left: 220px;
      padding: 20px;
    }
    form {
      max-width: 400px;
      background: white;
      padding: 20px;
      border-radius: 8px;
    }
    input[type="text"], button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 4px;
    }
    button {
      background: #2e7d32;
      color: white;
      border: none;
    }
    button:hover {
      background: #256d27;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
  <h2>Edit Region</h2>
  <?php if ($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
  <form method="POST">
    <label>Region Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($region['name']) ?>" required>
    <label>Region Code</label>
    <input type="text" name="code" value="<?= htmlspecialchars($region['code']) ?>" required>
    <button type="submit">Update</button>
  </form>
</div>

</body>
</html>
