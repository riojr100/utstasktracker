<!DOCTYPE html>
<html>

<head>
    <title>To-Do List</title>
</head>

<body>
    <div id="header">
        <h1>Welcome to the To-Do List</h1>
        <div id="user-info">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo "Hello, " . $_SESSION['username'];
                echo " | <a href='logout.php'>Logout</a>";
            }
            ?>
        </div>
    </div>

</body>

</html>