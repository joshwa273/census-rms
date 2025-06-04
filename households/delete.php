<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../login.php');
  exit();
}
require '../config/db.php';

$id = $_GET['id'];
$pdo->prepare("DELETE FROM households WHERE id = ?")->execute([$id]);
header('Location: index.php');
exit();
