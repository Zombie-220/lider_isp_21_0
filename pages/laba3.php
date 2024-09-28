<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="description" content="main page">
    <meta name="keywords" content="php, html">
    <meta name="author" content="Lider Denis">
    <link rel="stylesheet" href="../styles/all.css">
    <link rel="stylesheet" href="../styles/laba.css">
    <title>Третья лаба</title>
</head>
<body>
    <header>
        <p class="logo">Оптимизация web-приложений. Лаба №3</p>
        <a href="../index.php">Назад</a>
    </header>

    <div class="main">
        <div class="main__task">
            <p class="main__task__header">Задача 1</p>
            <p class="main__task__text">Даны два числа a и b. Найти их среднее арифметическое: (a + b)/2.</p>
            <form action="" method="post">
                <input type="text" name="input_A" placeholder="a">
                <input type="text" name="input_B" placeholder="b">
                <button type="submit" name="firstButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['firstButton'])) {
                    $a = $_POST['input_A'];
                    $b = $_POST['input_B'];
                    if ((is_numeric($a) && is_numeric($b))) {
                        $average = ($a + $b) / 2;
                        echo "<p class='solution'> Среднее арифметическое = $average</p>";
                    } else {
                        echo "<p class='solution'>Данные введены не корректно</p>";           
                    }
                }
            ?>
        </div>

        <div class="main__task">
            <p class="main__task__header">Задача 2</p>
            <p class="main__task__text">Дано двузначное число. Вывести число, полученное при перестановке цифр исходного числа.</p>
            <form action="" method="post">
                <input type="text" name="input_Number" placeholder="число">
                <button type="submit" name="secondButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['secondButton'])) {
                    $number = $_POST['input_Number'];
                    if ($number >= 10 && $number <= 99) {
                        $firstDigit = intdiv($number, 10);
                        $secondDigit = $number % 10;
                        $newNumber = $secondDigit * 10 + $firstDigit;
                        echo "<p class='solution'>Результат: $newNumber</p>";
                    } else { echo "<p class='solution'>Введенное число не является двузначным.</p>"; }
                }
            ?>
        </div>
    </div>
    <footer>
        <p class="footer__p">Футер</p>
    </footer>
</body>
</html>