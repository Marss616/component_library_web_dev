<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

<div>
    <?php
    if (isset($_POST['create'])) {

        // Capture form values safely
        $firstname    = $_POST['firstname'];
        $lastname     = $_POST['lastname'];
        $email        = $_POST['email'];
        $phonenumber  = $_POST['phonenumber'];
        $password     = $_POST['password']; // Note: password should be hashed later!

        $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password) VALUES (?, ?, ?, ?, ?)";

        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
        if($result){
            echo 'Successfully saved.';
        }
        else {
            echo 'Issue with saving data.';
        }

        // For now, just echo the values (you will use them for MySQL INSERT)
        echo '<h3>User Submitted</h3>';
        echo '<p>First Name: ' . htmlspecialchars($firstname) . '</p>';
        echo '<p>Last Name: ' . htmlspecialchars($lastname) . '</p>';
        echo '<p>Email: ' . htmlspecialchars($email) . '</p>';
        echo '<p>Phone Number: ' . htmlspecialchars($phonenumber) . '</p>';
        // Do not echo password in real apps! This is just for test:
        echo '<p>Password: ' . htmlspecialchars($password) . '</p>';
    }
    ?>
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
                    <input class="form-control" type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name</b></label>
                    <input class="form-control" type="text" name="lastname" required>

                    <label for="email"><b>Email</b></label>
                    <input class="form-control" type="email" name="email" required>
                    
                    <label for="phonenumber"><b>Phone Number</b></label>
                    <input class="form-control" type="text" name="phonenumber" required>
                    
                    <label for="password"><b>Password</b></label>
                    <input class="form-control" type="password" name="password" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign up">
                </div>
            </div>
        </div>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){
            e.preventDefault(); // Prevent form from submitting immediately

            var valid = this.form.checkValidity();
            if(valid){
                alert("form works");
            } else {
                alert("form does not work");
            }

            var firstname = $('#firstname').val()
            var lastname = $('#lastname').val()
            var email = $('#email').val()
            var phonenumber = $('#phonenumber').val()
            var password = $('#password').val()

            
            Swal.fire({
                title: 'Hello world',
                text: 'This is good',
                icon: 'success'
            }).then(function(){
                // After alert is closed, submit the form manually
                $('#registrationForm').submit();
            });
        });
    });
</script>

</body>
</html>
