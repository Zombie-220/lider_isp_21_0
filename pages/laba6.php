<?php
    include "../template/header.php";
    include "../template/footer.php";
    include "../template/task.php";

    include "../logic/laba6/task_1.php";
    include "../logic/laba6/task_2.php";
?>

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
    <?php render_header(6) ?>

    <div class="main">
        <?php
            render_task($task_1,
                2, 1, "Дан массив A размера N и целое число K (1 ≤ K ≤ N ). Вывести элементы массива с порядковыми номерами, кратными K : AK , A2·K , A3·K , ... Условный оператор не использовать.",
                "firstButton", ["text", "text"], ["input_N1", "input_K1"], ["N", "K"]
            );

            render_task($task_2,
                1, 2, "Дан целочисленный массив размера N. Увеличить все нечетные числа, содержащиеся в массиве, на исходное значение последнего нечетного числа. Если нечетные числа в массиве отсутствуют, то оставить массив без изменений.",
                "secondButton", ["text"], ["input_N2"], ["N"]
            );
        ?>
        </div>
    </div>
    <?php render_footer(); ?>
</body>
</html>