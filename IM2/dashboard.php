<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
?>

<!-- Dashboard Content -->
<p>This is your dashboard.</p>
<a href="logout.php">Logout</a>
