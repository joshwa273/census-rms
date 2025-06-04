<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$errors = [];
$household_name = '';
$barangay_id = '';

// Fetch barangays for the dropdown
$stmt = $pdo->query("SELECT id, name FROM barangays ORDER BY name ASC");
$barangays = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $household_name = trim($_POST['household_name']);
  $barangay_id = $_POST['barangay_id'];

  if (empty($household_name)) $errors[] = "Household name is required.";
  if (empty($barangay_id)) $errors[] = "Barangay is required.";

  if (empty($errors)) {
    $stmt = $pdo->prepare("INSERT INTO households (name, barangay_id) VALUES (?, ?)");
    $stmt->execute([$household_name, $barangay_id]);
    header('Location: index.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Household - Census System</title>
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
  <h1>Add New Household</h1>

  <div class="form-container">
    <?php if ($errors): ?>
      <div class="error">
        <?php foreach ($errors as $error) echo "<p>$error</p>"; ?>
      </div>
    <?php endif; ?>

    <form method="post">
      <label for="household_name">Household Name</label>
      <input type="text" name="household_name" id="household_name" value="<?= htmlspecialchars($household_name) ?>">

      <label for="barangay_id">Barangay</label>
      <select name="barangay_id" id="barangay_id">
        <option value="">-- Select Barangay --</option>
        <?php foreach ($barangays as $barangay): ?>
          <option value="<?= $barangay['id'] ?>" <?= $barangay_id == $barangay['id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($barangay['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <button class="btn" type="submit">Save Household</button>
    </form>
  </div>
</div>

</body>
</html>
