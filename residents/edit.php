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

// Fetch resident
$stmt = $pdo->prepare("SELECT * FROM residents WHERE id = ?");
$stmt->execute([$id]);
$resident = $stmt->fetch();
if (!$resident) {
  header('Location: index.php');
  exit();
}

// Fetch households for dropdown
$households = $pdo->query("SELECT id, household_head FROM households ORDER BY id DESC")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $age = $_POST['age'] ?? '';
  $household_id = $_POST['household_id'] ?? '';

  if ($name && $gender && $age && $household_id) {
    $stmt = $pdo->prepare("UPDATE residents SET name = ?, gender = ?, age = ?, household_id = ? WHERE id = ?");
    $stmt->execute([$name, $gender, $age, $household_id, $id]);
    header('Location: index.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Resident - Census RMS</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f8f9fa;
    }
    .main-content {
      margin-left: 220px;
      padding: 40px;
    }
    h1 {
      color: #2e7d32;
    }
    form {
      background: white;
      padding: 20px;
      border-radius: 8px;
      max-width: 600px;
      margin-top: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      background: #2e7d32;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background: #256d27;
    }
    a.back-link {
      display: inline-block;
      margin-top: 10px;
      color: #2e7d32;
      text-decoration: none;
    }
    a.back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
  <h1>Edit Resident</h1>

  <form method="POST">
    <label for="name">Full Name</label>
    <input type="text" name="name" id="name" required value="<?= htmlspecialchars($resident['name']) ?>">

    <label for="gender">Gender</label>
    <select name="gender" id="gender" required>
      <option value="">Select Gender</option>
      <option value="Male" <?= $resident['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
      <option value="Female" <?= $resident['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
    </select>

    <label for="age">Age</label>
    <input type="number" name="age" id="age" required min="0" value="<?= $resident['age'] ?>">

    <label for="household_id">Household</label>
    <select name="household_id" id="household_id" required>
      <option value="">Select Household</option>
      <?php foreach ($households as $household): ?>
        <option value="<?= $household['id'] ?>" <?= $resident['household_id'] == $household['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($household['household_head']) ?> (ID: <?= $household['id'] ?>)
        </option>
      <?php endforeach; ?>
    </select>

    <button type="submit">Update</button>
    <br>
    <a href="index.php" class="back-link">← Back to Residents</a>
  </form>
</div>

</body>
</html>
