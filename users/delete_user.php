<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}

require '../config/db.php';

if (!isset($_GET['id'])) {
  header('Location: list_users.php');
  exit();
}

$id = $_GET['id'];

if ($_SESSION['user']['id'] == $id) {
  $_SESSION['error'] = "You cannot delete your own account.";
  header('Location: list_users.php');
  exit();
}

$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

header('Location: list_users.php');
exit();
