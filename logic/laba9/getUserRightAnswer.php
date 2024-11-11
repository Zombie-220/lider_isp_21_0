<?php
include "./users.php";

$conn = mysqli_connect("localhost", "root", "", "quiz");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

header('Content-Type: application/json');
echo json_encode(['rightAnswer' => getUserRightAnswer($conn)]);

mysqli_close($conn);
?>