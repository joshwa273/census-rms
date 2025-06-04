<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$id = $_GET['id'];
$household = $pdo->query("SELECT * FROM households WHERE id = $id")->fetch();
$barangays = $pdo->query("SELECT id, name FROM barangays ORDER BY name ASC")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $head_name = $_POST['head_name'];
  $barangay_id = $_POST['barangay_id'];
  $address = $_POST['address'];

  $stmt = $pdo->prepare("UPDATE households SET head_name=?, barangay_id=?, address=? WHERE id=?");
  $stmt->execute([$head_name, $barangay_id, $address, $id]);
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Household</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php include '../includes/sidebar.php'; ?>
<div class="main-content">
  <h1>Edit Household</h1>
  <form method="POST">
    <label>Head of Household:</label><br>
    <input type="text" name="head_name" value="<?= $household['head_name'] ?>" required><br><br>

    <label>Barangay:</label><br>
    <select name="barangay_id" required>
      <?php foreach ($barangays as $brgy): ?>
        <option value="<?= $brgy['id'] ?>" <?= $brgy['id'] == $household['barangay_id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($brgy['name']) ?>
        </option>
      <?php endforeach; ?>
    </select><br><br>

    <label>Address:</label><br>
    <input type="text" name="address" value="<?= $household['address'] ?>" required><br><br>

    <button type="submit">Update</button>
  </form>
</div>
</body>
</html>