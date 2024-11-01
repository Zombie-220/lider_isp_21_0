<?php
    include "../template/header.php";
    include "../template/footer.php";
    include "../template/task.php";

    include "../logic/laba5/task_1.php";
    include "../logic/laba5/task_2.php";
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
    <title>Пятая лаба</title>
</head>
<body>
    <?php render_header(5) ?>

    <div class="main">
        <?php
            render_task($task_1,
                1, "Дано целое число N и набор из N целых чисел. Если в наборе имеются положительные числа, то вывести TRUE; в противном случае вывести FALSE.",
                "firstButton", ["input_N1"], ["N"]
            );

            render_task($task_2,
                2, "Даны два целых числа A и B (A < B). Найти сумму квадратов всех целых чисел от A до B включительно.",
                "secondButton", ["input_A2", "input_B2"], ["A", "B"]
            );
        ?>
    </div>
    <?php render_footer(); ?>
</body>
</html>