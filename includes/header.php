<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>
<div class="navbar">
  <div class="nav-left">Census System</div>
  <div class="nav-right">
    Logged in as <?= $_SESSION['user']['email'] ?> |
    <a href="logout.php" class="logout-link">Logout</a>
  </div>
</div>
