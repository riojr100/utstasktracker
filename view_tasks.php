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