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
    <title>Седьмая лаба</title>
</head>
<body>
    <header>
        <p class="logo">Оптимизация web-приложений. Лаба №7</p>
        <a href="../index.php">Назад</a>
    </header>

    <div class="main">
        <div class="main__task">
            <p class="main__task__header">Задача 1</p>
            <p class="main__task__text">Дана матрица размера M × N. Вывести ее элементы, расположенные в строках с четными номерами (2, 4, ...). Вывод элементов производить по строкам, условный оператор не использовать.</p>
            <form method="post">
                <input type="text" name="input_M1" placeholder="M">
                <input type="text" name="input_N1" placeholder="N">
                <button type="submit" name="firstButton">Выполнить</button>
            </form>

            <?php
                function printMatrix($matrix) {
                    foreach ($matrix as $elem) {
                        echo " [";
                        foreach($elem as $matrixElem) {
                            echo "$matrixElem ";
                        }
                        echo "]";
                    }
                }

                if (isset($_POST['firstButton'])) {
                    $M = (int)$_POST['input_M1'];
                    $N = (int)$_POST['input_N1'];
                    $matrix = [];

                    for ($i = 0; $i < $M; $i++) {
                        $row = [];
                        for ($j = 0; $j < $N; $j++) {
                            $row[] = rand(-10, 10);
                        }
                        $matrix[] = $row;
                    }

                    echo "<p class='solution'>Исходный массив: [ ";
                    printMatrix($matrix);
                    echo " ]<BR>";

                    echo "Результат: [ ";
                    for ($i = 1; $i < count($matrix); $i += 2) {
                        echo "[";
                        for ($j = 0; $j < count($matrix[$i]); $j++) {
                            echo $matrix[$i][$j] . ' ';
                        }
                        echo "] ";
                    }
                    echo " ]</p>";
                }
                ?>
        </div>

        <div class="main__task">
            <p class="main__task__header">Задача 2</p>
            <p class="main__task__text">Дана матрица размера M × N. Зеркально отразить ее элементы относительно горизонтальной оси симметрии матрицы (при этом поменяются местами строки с номерами 1 и M, 2 и M − 1 и т. д.).</p>
            <form method="post">
                <input type="text" name="input_M2" placeholder="M">
                <input type="text" name="input_N2" placeholder="N">
                <button type="submit" name="secondButton">Выполнить</button>
            </form>

            <?php
                if (isset($_POST['secondButton'])) {
                    $M = (int)$_POST['input_M2'];
                    $N = (int)$_POST['input_N2'];

                    for ($i = 0; $i < $M; $i++) {
                        $row = [];
                        for ($j = 0; $j < $N; $j++) {
                            $row[] = rand(-10, 10);
                        }
                        $matrix[] = $row;
                    }

                    echo "Исходная матрица: [";
                    printMatrix($matrix);
                    echo " ]";

                    $reflectedMatrix = [];
                    for ($i = 0; $i < $M; $i++) {
                        $reflectedMatrix[] = $matrix[$M - 1 - $i];
                    }

                    echo "<BR>Отраженная матрица: [";
                    printMatrix($reflectedMatrix);
                    echo " ]";
                }
            ?>
        </div>
    </div>
    <footer>
        <p class="footer__p">Футер</p>
    </footer>
</body>
</html>