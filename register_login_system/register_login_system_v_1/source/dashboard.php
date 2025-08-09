<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Dashboard</title></head>
<body>
<h1>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?></h1>
<p>Your email: <?= htmlspecialchars($_SESSION['user_email']) ?></p>
<p><a href="logout.php">Log out</a></p>
</body>
</html>
