<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$stmt = $pdo->query("SELECT h.id, h.head_name, h.address, b.name AS barangay, h.created_at
                      FROM households h
                      JOIN barangays b ON h.barangay_id = b.id
                      ORDER BY h.id DESC");
$households = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Households - Census System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body { font-family: Arial, sans-serif; background: #f8f9fa; margin: 0; }
    .main-content { margin-left: 220px; padding: 20px; }
    h1 { color: #2e7d32; margin-top: 0; }
    .actions a { margin-right: 10px; color: #2e7d32; text-decoration: none; font-weight: bold; }
    .actions a:hover { text-decoration: underline; }
    table { width: 100%; border-collapse: collapse; margin-top: 1rem; background: white; border-radius: 4px; overflow: hidden; }
    table, th, td { border: 1px solid #ccc; }
    th { background: #e8f5e9; color: #2e7d32; }
    th, td { padding: 12px; text-align: left; }
    .add-button { display: inline-block; background: #2e7d32; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; margin-bottom: 10px; }
    .add-button:hover { background: #256d27; }
  </style>
</head>
<body>
<?php include '../includes/sidebar.php'; ?>
<div class="main-content">
  <h1>Household Management</h1>
  <a class="add-button" href="create.php">+ Add New Household</a>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Head Name</th>
        <th>Barangay</th>
        <th>Address</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($households): ?>
        <?php $no = 1; foreach ($households as $hh): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($hh['head_name']) ?></td>
            <td><?= htmlspecialchars($hh['barangay']) ?></td>
            <td><?= htmlspecialchars($hh['address']) ?></td>
            <td><?= $hh['created_at'] ?? '—' ?></td>
            <td class="actions">
              <a href="edit.php?id=<?= $hh['id'] ?>">Edit</a>
              <a href="delete.php?id=<?= $hh['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="6">No households found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>