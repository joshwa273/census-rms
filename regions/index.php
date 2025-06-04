<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM regions ORDER BY id DESC");
$regions = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Regions - Census System</title>
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
      padding: 20px;
    }
    h1 {
      color: #2e7d32;
      margin-top: 0;
    }
    .actions a {
      margin-right: 10px;
      color: #2e7d32;
      text-decoration: none;
      font-weight: bold;
    }
    .actions a:hover {
      text-decoration: underline;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      background: white;
      border-radius: 4px;
      overflow: hidden;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th {
      background: #e8f5e9;
      color: #2e7d32;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    .add-button {
      display: inline-block;
      background: #2e7d32;
      color: white;
      padding: 8px 16px;
      border-radius: 4px;
      text-decoration: none;
      margin-bottom: 10px;
    }
    .add-button:hover {
      background: #256d27;
    }
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
        padding: 10px;
      }
      table, thead, tbody, th, td, tr {
        display: block;
      }
      th {
        display: none;
      }
      td {
        border: none;
        position: relative;
        padding-left: 50%;
        margin-bottom: 10px;
      }
      td::before {
        position: absolute;
        left: 10px;
        font-weight: bold;
      }
      td:nth-of-type(1)::before { content: "ID"; }
      td:nth-of-type(2)::before { content: "Region Name"; }
      td:nth-of-type(3)::before { content: "Region Code"; }
      td:nth-of-type(4)::before { content: "Created At"; }
      td:nth-of-type(5)::before { content: "Actions"; }
    }
  </style>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
  <h1>Region Management</h1>

  <a class="add-button" href="create.php">+ Add New Region</a>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Region Name</th>
        <th>Region Code</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
  <?php if ($regions): ?>
    <?php $no = 1; ?>
    <?php foreach ($regions as $region): ?>
      <tr>
        <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($region['name']) ?></td>
            <td><?= htmlspecialchars($region['code']) ?></td>
            <td><?= $region['created_at'] ?? '—' ?></td>
            <td class="actions">
              <a href="edit.php?id=<?= $region['id'] ?>">Edit</a>
              <a href="delete.php?id=<?= $region['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="5">No regions found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
