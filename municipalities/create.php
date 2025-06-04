<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$errors = [];
$name = '';
$code = '';
$province_id = '';

// Fetch provinces for dropdown
$stmt = $pdo->query("SELECT id, name FROM provinces ORDER BY name ASC");
$provinces = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $code = trim($_POST['code']);
  $province_id = $_POST['province_id'];

  if (empty($name)) $errors[] = "Municipality name is required.";
  if (empty($province_id)) $errors[] = "Province is required.";

  if (empty($errors)) {
    $stmt = $pdo->prepare("INSERT INTO municipalities (name, code, province_id) VALUES (?, ?, ?)");
    $stmt->execute([$name, $code, $province_id]);
    header('Location: index.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Municipality - Census RMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      margin: 0;
    }
    .main-content {
      margin-left: 220px;
      padding: 30px;
    }
    .form-container {
      max-width: 600px;
      background: white;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    h1 {
      color: #2e7d32;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }
    input[type="text"], select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    .btn {
      background-color: #2e7d32;
      color: white;
      padding: 10px 18px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #256d27;
    }
    .error {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
  <h1>Add New Municipality</h1>

  <div class="form-container">
    <?php if ($errors): ?>
      <div class="error">
        <?php foreach ($errors as $error) echo "<p>$error</p>"; ?>
      </div>
    <?php endif; ?>

    <form method="post">
      <label for="name">Municipality Name</label>
      <input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>">

      <label for="code">Municipality Code</label>
      <input type="text" name="code" id="code" value="<?= htmlspecialchars($code) ?>">

      <label for="province_id">Province</label>
      <select name="province_id" id="province_id">
        <option value="">-- Select Province --</option>
        <?php foreach ($provinces as $province): ?>
          <option value="<?= $province['id'] ?>" <?= $province_id == $province['id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($province['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <button class="btn" type="submit">Save Municipality</button>
    </form>
  </div>
</div>

</body>
</html>
