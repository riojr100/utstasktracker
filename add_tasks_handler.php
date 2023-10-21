<?php
if (isset($_POST['add_task'])) {
    include('db.php');
    $task_name = $_POST['task_name'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO tasks (task_name, status, user_id) VALUES (?, 'not yet started', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $task_name, $user_id);
    $stmt->execute();
}
