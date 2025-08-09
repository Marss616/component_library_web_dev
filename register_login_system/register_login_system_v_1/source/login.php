<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'config.php';

// If already logged in, bounce to dashboard
if (!empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email && $password) {
        try {
            $sql  = "SELECT id, firstname, lastname, email, password FROM users WHERE email = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // (Optional) rotate session id to prevent fixation
                session_regenerate_id(true);

                $_SESSION['user_id']    = $user['id'];
                $_SESSION['user_name']  = $user['firstname'] . ' ' . $user['lastname'];
                $_SESSION['user_email'] = $user['email'];

                header('Location: index.php');
                exit;
            } else {
                $msg = 'Invalid email or password.';
            }
        } catch (PDOException $e) {
            $msg = 'Database error: ' . $e->getMessage();
        }
    } else {
        $msg = 'Please enter both email and password.';
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"><title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php if ($msg) : ?>
  <p><strong><?= htmlspecialchars($msg) ?></strong></p>
<?php endif; ?>

<form method="post" action="login.php">
  <label>Email <input type="email" name="email" required></label><br>
  <label>Password <input type="password" name="password" required></label><br>
  <button type="submit">Log in</button>
</form>
<p><a href="registration.php">Need an account?</a></p>
</body>
</html>
