<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$id = $_GET['id'];
$municipality = $pdo->prepare("SELECT * FROM municipalities WHERE id = ?");
$municipality->execute([$id]);
$data = $municipality->fetch();

if (!$data) {
  echo "Municipality not found.";
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $province_id = $_POST['province_id'];
  $name = $_POST['name'];

  $stmt = $pdo->prepare("UPDATE municipalities SET province_id = ?, name = ? WHERE id = ?");
  $stmt->execute([$province_id, $name, $id]);
  header('Location: index.php');
  exit();
}

$provinces = $pdo->query("SELECT * FROM provinces ORDER BY name ASC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Municipality - Census RMS</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php include '../includes/sidebar.php'; ?>
<div class="main-content">
  <h1>Edit Municipality</h1>
  <form method="POST">
    <label for="province_id">Province:</label>
    <select name="province_id" required>
      <?php foreach ($provinces as $province): ?>
        <option value="<?= $province['id'] ?>" <?= $province['id'] == $data['province_id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($province['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    <label for="name">Municipality Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>

    <button type="submit" class="button-green">Update</button>
  </form>
</div>
</body>
</html>
