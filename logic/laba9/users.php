<?php
function setRightAnswer($conn, $value) {
    $result = mysqli_query($conn, "UPDATE users SET rightAnswer=$value WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
}

function getUserRightAnswer($conn) {
    $result = mysqli_query($conn, "SELECT rightAnswer FROM users WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['rightAnswer'];
}

function getAskedQuestions($conn) {
    $result = mysqli_query($conn, "SELECT askedQuestions FROM users WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
    $row = mysqli_fetch_assoc($result);
    return $row['askedQuestions'];
}

function setAskedQuestions($conn, $value) {
    $result = mysqli_query($conn, "UPDATE users SET askedQuestions='$value' WHERE userName='user'");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
}

function createUser($conn, $userName) {
    $result = mysqli_query($conn, "INSERT INTO users(userName) VALUES($userName)");
    if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
}
?>