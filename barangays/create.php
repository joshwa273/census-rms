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
$municipality_id = '';

// Fetch municipalities for the dropdown
$stmt = $pdo->query("SELECT id, name FROM municipalities ORDER BY name ASC");
$municipalities = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $code = trim($_POST['code']);
  $municipality_id = $_POST['municipality_id'];

  if (empty($name)) $errors[] = "Barangay name is required.";
  if (empty($municipality_id)) $errors[] = "Municipality is required.";

  if (empty($errors)) {
    $stmt = $pdo->prepare("INSERT INTO barangays (name, code, municipality_id) VALUES (?, ?, ?)");
    $stmt->execute([$name, $code, $municipality_id]);
    header('Location: index.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Barangay - Census System</title>
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
  <h1>Add New Barangay</h1>

  <div class="form-container">
    <?php if ($errors): ?>
      <div class="error">
        <?php foreach ($errors as $error) echo "<p>$error</p>"; ?>
      </div>
    <?php endif; ?>

    <form method="post">
      <label for="name">Barangay Name</label>
      <input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>">

      <label for="code">Barangay Code (Optional)</label>
      <input type="text" name="code" id="code" value="<?= htmlspecialchars($code) ?>">

      <label for="municipality_id">Municipality</label>
      <select name="municipality_id" id="municipality_id">
        <option value="">-- Select Municipality --</option>
        <?php foreach ($municipalities as $municipality): ?>
          <option value="<?= $municipality['id'] ?>" <?= $municipality_id == $municipality['id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($municipality['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <button class="btn" type="submit">Save Barangay</button>
    </form>
  </div>
</div>

</body>
</html>
