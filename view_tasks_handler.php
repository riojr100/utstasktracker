<?php
$sql = "SELECT id, task_name, status FROM tasks WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['task_name'] . " (Status: " . $row['status'] . ")";
        if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'task_manager') {
            echo ' <a href="task.php?task_id=' . $row['id'] . '">Change Status</a>';
        }
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "No tasks to display.";
}
?>
