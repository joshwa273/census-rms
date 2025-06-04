<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$users = $pdo->query("SELECT * FROM users ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Users - Census RMS</title>
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
    }

    h1 {
      color: #2e7d32;
      margin-bottom: 20px;
    }

    .table-wrapper {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.06);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #e8f5e9;
      color: #2e7d32;
    }

    a.btn {
      background: #2e7d32;
      color: white;
      padding: 8px 12px;
      border-radius: 4px;
      text-decoration: none;
      font-size: 14px;
    }

    a.btn:hover {
      background: #256d27;
    }

    .delete-btn {
      color: #c62828;
      text-decoration: none;
    }

    .delete-btn:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
  <h1>Users</h1>
  <a href="add_user.php" class="btn">+ Add User</a>

  <div class="table-wrapper" style="margin-top: 20px;">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['full_name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= $user['role'] ?></td>
            <td><?= $user['created_at'] ?></td>
            <td>
              <a href="edit_user.php?id=<?= $user['id'] ?>">Edit</a> |
              <a href="#" class="delete-btn" data-id="<?= $user['id'] ?>" data-name="<?= htmlspecialchars($user['full_name']) ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal" style="display:none;">
  <div class="modal-content">
    <h3>Confirm Deletion</h3>
    <p>Are you sure you want to delete <span id="userName"></span>?</p>
    <div class="modal-actions">
      <a href="#" id="confirmDelete" class="confirm-btn">Yes, Delete</a>
      <button class="cancel-btn" onclick="closeModal()">Cancel</button>
    </div>
  </div>
</div>

<style>
.modal {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.4);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 999;
}
.modal-content {
  background: #fff;
  padding: 30px;
  border-left: 5px solid #2e7d32;
  border-radius: 8px;
  width: 400px;
  text-align: center;
  box-shadow: 0 4px 16px rgba(0,0,0,0.1);
}
.modal-content h3 {
  margin-top: 0;
  color: #2e7d32;
}
.modal-actions {
  margin-top: 20px;
}
.confirm-btn {
  background: #c62828;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 6px;
  margin-right: 10px;
}
.confirm-btn:hover {
  background: #b71c1c;
}
.cancel-btn {
  background: #eee;
  color: #333;
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}
.cancel-btn:hover {
  background: #ddd;
}
</style>

<script>
document.querySelectorAll('.delete-btn').forEach(button => {
  button.addEventListener('click', function (e) {
    e.preventDefault();
    const userId = this.getAttribute('data-id');
    const userName = this.getAttribute('data-name');
    document.getElementById('userName').textContent = userName;
    document.getElementById('confirmDelete').href = 'delete_user.php?id=' + userId;
    document.getElementById('deleteModal').style.display = 'flex';
  });
});

function closeModal() {
  document.getElementById('deleteModal').style.display = 'none';
}
</script>

</body>
</html>
