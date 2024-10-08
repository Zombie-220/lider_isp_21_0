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
    <title>Пятая лаба</title>
</head>
<body>
    <header>
        <p class="logo">Оптимизация web-приложений. Лаба №5</p>
        <a href="../index.php">Назад</a>
    </header>

    <div class="main">
        <div class="main__task">
            <p class="main__task__header">Задача 1</p>
            <p class="main__task__text">Дано целое число  N и набор из N целых чисел. Если в наборе имеются положительные числа, то вывести TRUE; в противном случае вывести FALSE.</p>
            <form method="post">
                <input type="text" name="input_N1" placeholder="N">
                <button type="submit" name="firstButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['firstButton'])) {
                    $N = (int)$_POST['input_N1'];
                    $collection = [];
                    $arrayHasMinus = FALSE;
                    for ($i=0; $i<$N; $i++) {
                        $randNumber = mt_rand();
                        $randomNumberSymbol = mt_rand(0, 1) ? 1 : -1;
                        $collection[] = $randNumber * $randomNumberSymbol;
                    }
                    for ($i=0; $i<count($collection); $i++) {
                        echo "<p>Элемент №$i: $collection[$i]</p>";
                        if ($collection[$i] < 0) {
                            $arrayHasMinus = TRUE;
                        }
                    }
                    echo "<p class='solution'>Массив ". ($arrayHasMinus? "имеет": "не имеет") ." отрицательные элементы.</p>";
                }
            ?>
        </div>

        <div class="main__task">
            <p class="main__task__header">Задача 2</p>
            <p class="main__task__text">Даны два целых числа A и B (A &lt; B). Найти сумму квадратов всех целых чисел от A до B включительно.</p>
            <form method="post">
                <input type="text" name="input_A2" placeholder="A">
                <input type="text" name="input_B2" placeholder="B">
                <button type="submit" name="secondButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['secondButton'])) {
                    $A = (int)$_POST['input_A2'];
                    $B = (int)$_POST['input_B2'];
                    if ($A > $B) {
                        echo "<p class='solution error_message'>Не вополняется условие: $A &lt; $B</p>";
                    } else {
                        $summ = 0;
                        for ($i=$A; $i<$B+1; $i++) {
                            $quad = pow($i, 2);
                            $summ += $quad;
                        }
                        echo "<p class='solution'>A = $A<BR>B = $B<BR>Реузльтат: $summ</p>";
                    }
                }
            ?>
        </div>
    </div>
    <footer>
        <p class="footer__p">Футер</p>
    </footer>
</body>
</html>