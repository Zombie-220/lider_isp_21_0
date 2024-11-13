<?php
$data = json_decode(file_get_contents('php://input', true));

$conn = mysqli_connect("localhost", "root", "", "quiz");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

$result = mysqli_query($conn, "SELECT title FROM questions WHERE id = $data->randomNumber");
if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
$row = mysqli_fetch_assoc($result);
$qustion = $row['title'];

mysqli_close($conn);

header('Content-type: application/json');
echo json_encode([ 'question' => $qustion ]);
?>