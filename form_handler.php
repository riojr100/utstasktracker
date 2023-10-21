<?php
if (isset($_POST['add_task'])) {
    $task_name = $_POST['task_name'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tasks (task_name, status, user_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $task_name, $status, $_SESSION['user_id']);
    $stmt->execute();
}

if (isset($_POST['change_status'])) {
    $task_id = $_POST['task_id'];
    $new_status = $_POST['new_status'];

    $sql = "UPDATE tasks SET status = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $new_status, $task_id, $_SESSION['user_id']);
    $stmt->execute();
}
