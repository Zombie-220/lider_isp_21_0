<?php
function setUserAnswer($conn, $value) {
    $result = mysqli_query($conn, "UPDATE users SET userAnswer=$value WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
}

function setRightAnswer($conn, $value) {
    $result = mysqli_query($conn, "UPDATE users SET rightAnswer=$value WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
}

function getUserAnswer($conn) {
    $result = mysqli_query($conn, "SELECT userAnswer FROM users WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['userAnswer'];
}

function getUserRightAnswer($conn) {
    $result = mysqli_query($conn, "SELECT rightAnswer FROM users WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['rightAnswer'];
}

function getRightScore($conn) {
    $result = mysqli_query($conn, "SELECT score FROM users WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['score'];
}
?>