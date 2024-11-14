<?php
function __getAnswer($conn, $number, $n) {
    $temp = "answer_$n";
    $result = mysqli_query($conn, "SELECT $temp FROM questions WHERE id = $number");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row["$temp"];
}

$data = json_decode(file_get_contents('php://input', true));

$conn = mysqli_connect("localhost", "root", "", "quiz");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

$answers = array(
    __getAnswer($conn, $data->questionNumber, 1),
    __getAnswer($conn, $data->questionNumber, 2),
    __getAnswer($conn, $data->questionNumber, 3),
    __getAnswer($conn, $data->questionNumber, 4)
);

mysqli_close($conn);

header('Content-type: application/json');
echo json_encode([ 'answers' => $answers ]);
?>