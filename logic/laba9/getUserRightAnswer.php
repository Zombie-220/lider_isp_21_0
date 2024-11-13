<?php
include "./users.php";

$conn = mysqli_connect("localhost", "root", "", "quiz");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

$result = mysqli_query($conn, "SELECT rightAnswer FROM users WHERE userName='user'");
if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
$row = mysqli_fetch_assoc($result);
$rightAnswer = $row['rightAnswer'];

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode(['rightAnswer' => $rightAnswer]);

?>