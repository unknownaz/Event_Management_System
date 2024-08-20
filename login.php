<?php

require_once('function.php');
require_once('session.php');

//login form
if (isset($_POST['submit'])) {

    $login = login($conn, $_POST);
    if ($login) {
        // If login is successful, set session variables
        $_SESSION['username'] = $login['username'];
        $_SESSION['password'] = $login['password'];

        header("location:index.php");
        exit();
    } else {
        echo '<script>alert("The user does not exist or the password is incorrect.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EventWizards</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
    <div class="login-container">
        <h2>Log In</h2>
        <form action="login.php" method="POST">
            <input type="text" name="text" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">Log In</button>
        </form>
        <p>Don't have an account? <a href="signup.html">Sign Up</a></p>
    </div>
    </div>
</body>
</html>


