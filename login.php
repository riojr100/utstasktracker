<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    include('login_handler.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="body-login">
    <div class="form-bg">
        <div class="container">
            <h1 class="app-title">Task Tracker</h1>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form class="form-horizontal" action="login.php" method="post">
                        <span class="heading">Log In</span>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="form-group help">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="form-group">
                            <p>Don't have an account? <a href="register.php">Register here!</a></p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>