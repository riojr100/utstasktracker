<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div id="tasks">
        <h2>Tasks</h2>
        <?php
        include('db.php'); // File koneksi database

        $sql = "SELECT * FROM tasks WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $user_id = $_SESSION['user_id'];
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo '<div class="task">';
            echo '<input type="checkbox" name="task_status" value="' . $row['id'] . '">';
            echo '<span>' . $row['task_name'] . ' - ' . $row['status'] . '</span>';
            echo '</div>';
        }


        ?>
    </div>
</body>

</html>