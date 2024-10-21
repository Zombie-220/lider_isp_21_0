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
    <title>Шестая лаба</title>
</head>
<body>
    <header>
        <p class="logo">Оптимизация web-приложений. Лаба №6</p>
        <a href="../index.php">Назад</a>
    </header>

    <div class="main">
        <div class="main__task">
            <p class="main__task__header">Задача 1</p>
            <p class="main__task__text">Дан массив A размера N и целое число K (1 ≤ K ≤ N ). Вывести элементы массива с порядковыми номерами, кратными K : AK , A2·K , A3·K , ... Условный оператор не использовать.</p>
            <form method="post">
                <input type="text" name="input_N1" placeholder="N">
                <input type="text" name="input_K1" placeholder="K">
                <button type="submit" name="firstButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['firstButton'])) {
                    $N = (int)$_POST['input_N1'];
                    $K = (int)$_POST['input_K1'];
                    $array[] = array();
                    $solution = "N = $N, K = $K<BR>Массив: [";

                    for ($i=0; $i<$N; $i++) {
                        $number = mt_rand(-10, 10);
                        $array[] = $number;
                        $solution .= " $number";
                    }
                    $solution .= " ]<BR>";

                    $solution .= "Результат:";
                    for ($i=$K; $i<=$N; $i+=$K) {
                        $solution .= " $array[$i]";
                    }
                    echo "<p class='solution'>$solution</p>";
                }
            ?>
        </div>

        <div class="main__task">
            <p class="main__task__header">Задача 2</p>
            <p class="main__task__text">Дан целочисленный массив размера N. Увеличить все нечетные числа, содержащиеся в массиве, на исходное значение последнего нечетного числа. Если нечетные числа в массиве отсутствуют, то оставить массив без изменений.</p>
            <form method="post">
                <input type="text" name="input_N2" placeholder="N">
                <button type="submit" name="secondButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['secondButton'])) {
                    $N = (int)$_POST['input_N2'];
                    $array = array();
                    $solution = "Массив: [";
                    $lastNumber = -11;

                    for ($i=0; $i<$N; $i++) {
                        $newNumber = mt_rand(-10, 10);
                        $array[] = $newNumber;
                        if ($newNumber%2 != 0) { $lastNumber=$newNumber; }
                        $solution .= " $newNumber";
                    }
                    $solution .= " ]<BR>Новый массив: [";

                    if ($lastNumber != -11) {
                        for ($i=0; $i<$N; $i++) {
                            if ($array[$i]%2 != 0) {  $array[$i] = $array[$i] + $lastNumber; }
                            $solution .= " $array[$i]";
                        }
                        $solution .= " ]";
                    }
                    echo "<p class='solution'>$solution</p>";
                }
            ?>
        </div>
    </div>
    <footer>
        <p class="footer__p">Футер</p>
    </footer>
</body>
</html>