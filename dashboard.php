<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
require 'config/db.php';

// Count queries
$regionCount = $pdo->query("SELECT COUNT(*) FROM regions")->fetchColumn();
$provinceCount = $pdo->query("SELECT COUNT(*) FROM provinces")->fetchColumn();
$municipalityCount = $pdo->query("SELECT COUNT(*) FROM municipalities")->fetchColumn();
$barangayCount = $pdo->query("SELECT COUNT(*) FROM barangays")->fetchColumn();
$userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Census System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f6fdf7;
      margin: 0;
    }

    .main-content {
      margin-left: 220px;
      padding: 20px;
    }

    h1 {
      color: #2e7d32;
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .greeting {
      font-size: 1.1rem;
      margin-bottom: 20px;
      color: #333;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 1rem;
    }

    .card {
      background-color: white;
      border-left: 5px solid #2e7d32;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
      margin: 0;
      font-size: 1.1rem;
      color: #2e7d32;
    }

    .card p {
      margin-top: 0.5rem;
      font-size: 1.5rem;
      font-weight: bold;
      color: #333;
    }

    @media (max-width: 600px) {
      .main-content {
        margin-left: 0;
        padding: 1rem;
      }
    }
  </style>
</head>
<body>

<?php include 'includes/sidebar.php'; ?>

<div class="main-content">
  <h1>Dashboard</h1>
  <div class="greeting">
    Welcome, <?= htmlspecialchars($_SESSION['user']['full_name']) ?>!
  </div>

  <div class="card-grid">
    <div class="card">
      <h3>Total Regions</h3>
      <p><?= $regionCount ?></p>
    </div>
    <div class="card">
      <h3>Total Provinces</h3>
      <p><?= $provinceCount ?></p>
    </div>
    <div class="card">
      <h3>Total Municipalities</h3>
      <p><?= $municipalityCount ?></p>
    </div>
    <div class="card">
      <h3>Total Barangays</h3>
      <p><?= $barangayCount ?></p>
    </div>
    <div class="card">
      <h3>Total Users</h3>
      <p><?= $userCount ?></p>
    </div>
  </div>
</div>

</body>
</html>
