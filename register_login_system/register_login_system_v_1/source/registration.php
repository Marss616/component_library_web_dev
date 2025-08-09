<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {

    // Capture form values safely
    $firstname   = trim($_POST['firstname'] ?? '');
    $lastname    = trim($_POST['lastname'] ?? '');
    $email       = trim($_POST['email'] ?? '');
    $phonenumber = trim($_POST['phonenumber'] ?? '');
    $password    = $_POST['password'] ?? '';

    if ($firstname && $lastname && $email && $phonenumber && $password) {
        try {
            // Hash the password (don’t store plain text)
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password)
                    VALUES (?, ?, ?, ?, ?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $hash]);

            if ($result) {
                $msg = 'User added.';
            } else {
                $err = $stmtinsert->errorInfo();
                $msg = 'User add failed: ' . implode(' | ', $err);
            }
        } catch (PDOException $e) {
            $msg = 'Database error: ' . $e->getMessage(); // <-- () added
        }
    } else {
        $msg = 'Missing required fields.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Registration</title>
</head>
<body>

<div>
    <?php if (!empty($msg)): ?>
        <p><strong><?= htmlspecialchars($msg) ?></strong></p>
    <?php endif; ?>
</div>

<div>
    <form id="registrationForm" action="registration.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Registration</h1>
                    <p>Fill out with correct values</p>
                    <hr class="mb-3">

                    <label for="firstname"><b>First Name</b></label>
                    <input id="firstname" class="form-control" type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name</b></label>
                    <input id="lastname" class="form-control" type="text" name="lastname" required>

                    <label for="email"><b>Email</b></label>
                    <input id="email" class="form-control" type="email" name="email" required>
                    
                    <label for="phonenumber"><b>Phone Number</b></label>
                    <input id="phonenumber" class="form-control" type="text" name="phonenumber" required>
                    
                    <label for="password"><b>Password</b></label>
                    <input id="password" class="form-control" type="password" name="password" required>

                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign up">
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Removed the AJAX that intercepted submission -->
</body>
</html>
