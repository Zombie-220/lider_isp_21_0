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
        <p class="logo">Оптимизация web-приложений. Лаба №4</p>
        <a href="../index.php">Назад</a>
    </header>

    <div class="main">
        <div class="main__task">
            <p class="main__task__header">Задача 1</p>
            <p class="main__task__text">Даны два целых числа: A, B. Проверить истинность высказывания: «Хотя бы одно из чисел A и B нечетное».</p>
            <form method="post">
                <input type="text" name="input_A1" placeholder="A">
                <input type="text" name="input_B1" placeholder="B">
                <button type="submit" name="firstButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['firstButton'])) {
                    $a = (int)$_POST['input_A1'];
                    $b = (int)$_POST['input_B1'];
                    echo "<p>a = $a b = $b</p>";
                    if (($a % 2 == 0 && $b % 2 == 0)) {
                        echo "<p class='solution'>Оба числа четные</p>";
                    } else if ($a % 2 != 0 && $b % 2 != 0) {
                        echo "<p class='solution'>Оба числа не четные</p>";
                    } else {
                        echo "<p class='solution'>Одно из чисел не четное</p>";
                    }
                }
            ?>
        </div>

        <div class="main__task">
            <p class="main__task__header">Задача 2</p>
            <p class="main__task__text">Даны две переменные вещественного типа: A, B. Перераспределить значения данных переменных так, чтобы в A оказалось меньшее из значений, а в B — большее. Вывести новые значения переменных A и B.</p>
            <form method="post">
                <input type="text" name="input_A2" placeholder="A">
                <input type="text" name="input_B2" placeholder="B">
                <button type="submit" name="secondButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['secondButton'])) {
                    $a = (float)$_POST['input_A2'];
                    $b = (float)$_POST['input_B2'];
                    if ($a > $b) {
                        $temp = $a;
                        $a = $b;
                        $b = $temp;
                    }
                    echo "<p class='solution'>A = $a<BR>B = $b</p>";
                }
            ?>
        </div>

        <div class="main__task">
            <p class="main__task__header">Задача 3</p>
            <img class="main__task__img" src="../images/laba4/task1.png" alt="task 3 laba 4">
            <form method="post">
                <input type="text" name="input_A3" placeholder="X">
                <button type="submit" name="button3">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['button3'])) {
                    $a = 1.8;
                    $b = 3.3;
                    $x = (float)$_POST['input_A3'];
                    if ($x <= 3) {
                        $y = ($a*$x+1)**4;
                    } else if ($x > 3 && $x <=5) {
                        $y = 1 / (2*$x**2+$b*log10($x));
                    } else if ($x > 5) {
                        $y = $a*cos($b+$x)**2;
                    } else {
                        $y = "Введёное число не попадает ни в один диапозон";
                    }
                    echo "<p class='solution'>Введено значение: $x<BR>Результат: $y</p>";
                }
            ?>
        </div>

        <div class="main__task">
            <p class="main__task__header">Задача 4</p>
            <img class="main__task__img" src="../images/laba4/task2.png" alt="task 4 laba 4">
            <form method="post">
                <input type="text" name="input_A4" placeholder="X">
                <button type="submit" name="button4">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['button4'])) {
                    $a = 1.8;
                    $b = 3.3;
                    $x = (float)$_POST['input_A4'];
                    switch ($x) {
                        case 3:
                            $y = ($a*$x+1)**4;
                            break;
                        case 4:
                            $y = 1 / (2*$x**2+$b*log10($x));
                            break;
                        case 6:
                            $y = $a*cos($b+$x)**2;
                            break;
                        default:
                            $y = "Введённое значение не подходит под решение";
                            break;
                    }
                    echo "<p class='solution'>Введённый результат: $x<BR>Результат: $y</p>";
                }
            ?>
        </div>
    </div>
    <footer>
        <p class="footer__p">Футер</p>
    </footer>
</body>
</html>