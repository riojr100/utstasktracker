<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('header.php');
include('view_tasks.php');
include('footer.php');
