<?php
$data = json_decode(file_get_contents('php://input', true));

$conn = mysqli_connect("localhost", "root", "", "quiz");
if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

$usersTable = array();
$scoreTable = array();

$result = mysqli_query($conn, 'SELECT id FROM users ORDER BY id DESC;');
if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
$row = mysqli_fetch_assoc($result);
$length = $row['id'];

for ($i=1; $i<=$length; $i++) {
    $result = mysqli_query($conn, "SELECT userName, score FROM users WHERE id=$i;");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $usersTable[] = $row['userName'];
        $scoreTable[] = $row['score'];
    }
}

mysqli_close($conn);

header('Content-type: application/json');
echo json_encode([ 'usersTable' => $usersTable, 'scoreTable' => $scoreTable ]);
?>