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
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
        <a class="navbar-brand" href="#"><b>To Do List</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="navbar-nav ms-auto">
                <div id="user-info">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                    ?>
                        Hello, <?= $_SESSION['username'] ?>
                        <a href="logout.php" class="btn btn-secondary">Logout</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function autoSubmit() {
            var formObj = document.forms['taskForm']
        }
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Tasks</h2>
            </div>
        </div>
        <div class="row">
            <div id="tasks">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Task</th>
                            <th scope="col">Done</th>
                            <th scope="col">Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('db.php'); // File koneksi database

                        $sql = "SELECT * FROM tasks WHERE user_id = ?";
                        $stmt = $conn->prepare($sql);
                        $user_id = $_SESSION['user_id'];
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            $i++;
                        ?>


                            <tr>

                                <th><?= $i ?></th>
                                <th>
                                    <span><?= $row['task_name'] . ' - ' . $row['status'] ?></span>
                                </th>
                                <td>
                                    <form action="task_handler.php" method="post">
                                        <input type="checkbox" name="doneCheck" id="done" value="done"> Done
                                        <input type="hidden" name="id" value="done"> Done
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="task_handler.php" id='theForm<?= $row['id'] ?>'>
                                        <select name="statusSelect" class="custom-select" onchange="autoSubmit()">
                                            <option value="not yet started" <?php if ($row['status'] == "not yet started") { ?> selected <?php } ?>>not yet started</option>
                                            <option value="in progress" <?php if ($row['status'] == "in progress") { ?> selected <?php } ?>>in progress</option>
                                            <option hidden value="done" <?php if ($row['status'] == "done") { ?> selected <?php } ?>>done</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>