<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="login-form">
        <h2>Register</h2>
        <form action="register_handler.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="passwordConfirm" placeholder="Confirm Password" required>
            <input type="submit" name="register" value="Register">
            <p>Don't have an account? <a href="register.php">Register here!</a></p>
        </form>
    </div>
</body>

</html>