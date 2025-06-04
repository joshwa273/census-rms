<!-- /includes/sidebar.php -->
<style>
  .sidebar {
    height: 100vh;
    width: 220px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #2e7d32;
    padding-top: 20px;
    color: white;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
  }

  .sidebar h2 {
    text-align: center;
    font-size: 1.2rem;
    margin-bottom: 1rem;
    padding: 0 20px;
    font-weight: 600;
    line-height: 1.4;
  }

  .sidebar a {
    display: block;
    color: white;
    padding: 12px 20px;
    text-decoration: none;
    transition: background 0.3s ease;
    font-size: 15px;
    line-height: 1.4;
  }

  .sidebar a:hover,
  .sidebar a.active {
    background-color: #1b5e20;
    font-weight: 600;
  }

  .main-content {
    margin-left: 220px;
    padding: 20px;
  }
</style>

<?php
  $uri = $_SERVER['REQUEST_URI'];
?>

<div class="sidebar">
  <h2>Census RMS</h2>
  <a href="/cen-rsm/dashboard.php" class="<?= strpos($uri, 'dashboard') !== false ? 'active' : '' ?>">Dashboard</a>
  <a href="/cen-rsm/regions/index.php" class="<?= strpos($uri, 'regions') !== false ? 'active' : '' ?>">Regions</a>
  <a href="/cen-rsm/provinces/index.php" class="<?= strpos($uri, 'provinces') !== false ? 'active' : '' ?>">Provinces</a>
  <a href="/cen-rsm/municipalities/index.php" class="<?= strpos($uri, 'municipalities') !== false ? 'active' : '' ?>">Municipalities</a>
  <a href="/cen-rsm/barangays/index.php" class="<?= strpos($uri, 'barangays') !== false ? 'active' : '' ?>">Barangays</a>
  <a href="/cen-rsm/households/index.php" class="<?= strpos($uri, 'households') !== false ? 'active' : '' ?>">Households</a>
  <a href="/cen-rsm/residents/index.php" class="<?= strpos($uri, 'residents') !== false ? 'active' : '' ?>">Residents</a>
  <a href="/cen-rsm/users/index.php" class="<?= strpos($uri, 'users') !== false ? 'active' : '' ?>">Users</a>
  <a href="/cen-rsm/logout.php">Logout</a>
</div>
