<?php
include "../logic/laba9/users.php";

$conn = mysqli_connect("localhost", "root", "", "quiz");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

header('Content-Type: application/json');
echo json_encode(['message' => getUserRightAnswer($conn)]);
?>
