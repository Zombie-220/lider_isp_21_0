<?php
function getRightAnswer($conn, $number) {
    $result = mysqli_query($conn, "SELECT answer FROM questions WHERE id = $number");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['answer'];
}
?>