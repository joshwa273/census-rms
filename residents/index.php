<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

// Fetch residents with household name
$stmt = $pdo->query("SELECT r.id, r.first_name, r.last_name, r.gender, r.birthdate, h.head_name AS household_name
                     FROM residents r
                     JOIN households h ON r.household_id = h.id
                     ORDER BY r.id DESC");
$residents = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Residents - Census RMS</title>
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
      td:nth-of-type(2)::before { content: "First Name"; }
      td:nth-of-type(3)::before { content: "Last Name"; }
      td:nth-of-type(4)::before { content: "Gender"; }
      td:nth-of-type(5)::before { content: "Age"; }
      td:nth-of-type(6)::before { content: "Household"; }
      td:nth-of-type(7)::before { content: "Actions"; }
    }
  </style>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
  <h1>Resident Management</h1>

  <a class="add-button" href="create.php">+ Add New Resident</a>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Household</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($residents): ?>
        <?php foreach ($residents as $resident): ?>
          <?php
            $birthdate = new DateTime($resident['birthdate']);
            $today = new DateTime();
            $age = $birthdate->diff($today)->y;
          ?>
          <tr>
            <td><?= htmlspecialchars($resident['id']) ?></td>
            <td><?= htmlspecialchars($resident['first_name']) ?></td>
            <td><?= htmlspecialchars($resident['last_name']) ?></td>
            <td><?= htmlspecialchars($resident['gender']) ?></td>
            <td><?= $age ?></td>
            <td><?= htmlspecialchars($resident['household_name']) ?></td>
            <td class="actions">
              <a href="edit.php?id=<?= $resident['id'] ?>">Edit</a>
              <a href="delete.php?id=<?= $resident['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="7">No residents found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
]