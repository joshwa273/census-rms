<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM provinces WHERE id = ?");
$stmt->execute([$id]);
$province = $stmt->fetch();

$stmt = $pdo->query("SELECT * FROM regions ORDER BY name ASC");
$regions = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $code = $_POST['code'];
  $region_id = $_POST['region_id'];

  $stmt = $pdo->prepare("UPDATE provinces SET name = ?, code = ?, region_id = ? WHERE id = ?");
  $stmt->execute([$name, $code, $region_id, $id]);

  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Province</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    .main-content { margin-left: 220px; padding: 20px; }
    h1 { color: #2e7d32; }
    form { max-width: 500px; }
    input, select, button {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px;
    }
    button {
      background: #2e7d32;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover { background: #256d27; }
  </style>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
  <h1>Edit Province</h1>
  <form method="POST">
    <label>Province Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($province['name']) ?>" required>
    <label>Province Code:</label>
    <input type="text" name="code" value="<?= htmlspecialchars($province['code']) ?>" required>
    <label>Region:</label>
    <select name="region_id" required>
      <?php foreach ($regions as $region): ?>
        <option value="<?= $region['id'] ?>" <?= $province['region_id'] == $region['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($region['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <button type="submit">Update Province</button>
  </form>
</div>

</body>
</html>
