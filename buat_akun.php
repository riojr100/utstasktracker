<?php
include "db.php";

// Metode register
$username = "loler";
$password = password_hash("loler", PASSWORD_BCRYPT);
$level = "admin";
echo $password;
$q = "INSERT INTO users VALUES (NULL, ?, ?, ?)";
$stmt = $conn->prepare($q);
$stmt->bind_param('sss', $username, $password, $level);
$stmt->execute();
