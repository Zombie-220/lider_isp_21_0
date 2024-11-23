<?php
$data = json_decode(file_get_contents('php://input', true));

$conn = mysqli_connect("localhost", "root", "", "quiz");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

$result = mysqli_query($conn, "INSERT INTO users(userName, score) VALUES('$data->userName', $data->score)");
if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }

mysqli_close($conn);

header('Content-type: application/json');
echo json_encode([ 'status' => 200 ]);
?>