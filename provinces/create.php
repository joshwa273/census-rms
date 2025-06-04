<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$name = '';
$code = '';
$region_id = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $code = trim($_POST['code']);
  $region_id = $_POST['region_id'];

  if ($name && $code && $region_id) {
    $stmt = $pdo->prepare("INSERT INTO provinces (name, code, region_id) VALUES (?, ?, ?)");
    $stmt->execute([$name, $code, $region_id]);
    header("Location: index.php");
    exit();
  } else {
    $error = "All fields are required.";
  }
}

$regions = $pdo->query("SELECT id, name FROM regions ORDER BY name")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Province - Census RMS</title>
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

    input[type="text"], select {
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
      <h2>New Province</h2>
      <a class="back-link" href="index.php">&larr; Back</a>
    </div>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="form-group">
        <label for="name">Province Name</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" required>
      </div>

      <div class="form-group">
        <label for="code">Province Code</label>
        <input type="text" name="code" id="code" value="<?= htmlspecialchars($code) ?>" required>
      </div>

      <div class="form-group">
        <label for="region_id">Region</label>
        <select name="region_id" id="region_id" required>
          <option value="">-- Select Region --</option>
          <?php foreach ($regions as $region): ?>
            <option value="<?= $region['id'] ?>" <?= $region_id == $region['id'] ? 'selected' : '' ?>><?= htmlspecialchars($region['name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <button class="submit-btn" type="submit">Save Province</button>
    </form>
  </div>
</div>

</body>
</html>
