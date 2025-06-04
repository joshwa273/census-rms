<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$id = $_GET['id'] ?? null;
if ($id) {
  $stmt = $pdo->prepare("DELETE FROM municipalities WHERE id = ?");
  $stmt->execute([$id]);
}
header("Location: index.php");
exit();
