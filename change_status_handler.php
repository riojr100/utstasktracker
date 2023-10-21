<?php
if (isset($_POST['task_status'])) {
    include('db.php');
    $task_id = $_POST['task_status'];

    if ($_SESSION['role'] === 'admin') {
        $sql = "UPDATE tasks SET status = 'done' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $task_id);
        $stmt->execute();
    }
}
