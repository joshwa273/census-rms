<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  header("Location: index.php");
  exit();
}

$stmt = $pdo->prepare("SELECT * FROM municipalities WHERE id = ?");
$stmt->execute([$id]);
$municipality = $stmt->fetch();

if (!$municipality) {
  echo "Municipality not found.";
  exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $province_id = $_POST['province_id'];

  if ($name && $province_id) {
    $stmt = $pdo->prepare("UPDATE municipalities SET name = ?, province_id = ? WHERE id = ?");
    $stmt->execute([$name, $province_id, $id]);
    header("Location: index.php");
    exit();
  } else {
    $error = "All fields are required.";
  }
}

// Load provinces
$provinces = $pdo->query("SELECT * FROM provinces ORDER BY name")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Municipality</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <?php include '../includes/sidebar.php'; ?>
  <div class="main-content">
    <h1>Edit Municipality</h1>
    <?php if ($error): ?><p style="color:red"><?= $error ?></p><?php endif; ?>
    <form method="POST">
      <label for="province_id">Province:</label><br>
      <select name="province_id" required>
        <?php foreach ($provinces as $prov): ?>
          <option value="<?= $prov['id'] ?>" <?= $prov['id'] == $municipality['province_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($prov['name']) ?>
          </option>
        <?php endforeach; ?>
      </select><br><br>

      <label for="name">Municipality Name:</label><br>
      <input type="text" name="name" value="<?= htmlspecialchars($municipality['name']) ?>" required><br><br>

      <button type="submit" class="button-green">Update</button>
    </form>
  </div>
</body>
</html>
