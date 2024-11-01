<?php
    include "../template/header.php";
    include "../template/footer.php";
    include "../template/task.php";

    include "../logic/laba4/task_1.php";
    include "../logic/laba4/task_2.php";
    include "../logic/laba4/task_3.php";
    include "../logic/laba4/task_4.php";
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
    <title>Четвёртая лаба</title>
</head>
<body>
    <?php render_header(4); ?>

    <div class="main">
        <?php
            render_task($task_1,
                2, 1, "Даны два целых числа: A, B. Проверить истинность высказывания: «Хотя бы одно из чисел A и B нечетное».", "firstButton",
                ["text", "text"], ["input_A1", "input_B1"], ["A", "B"]
            );

            render_task($task_2,
                2, 2, "Даны две переменные вещественного типа: A, B. Перераспределить значения данных переменных так, чтобы в A оказалось меньшее из значений, а в B — большее. Вывести новые значения переменных A и B.", "secondButton",
                ["text", "text"], ["input_A2", "input_B2"], ["A", "B"]
            );

            render_task($task_3,
                1, 3, "../images/laba4/task1.png", "button3",
                ["text"], ["input_A3"], ["X"]
            );

            render_task($task_4,
                1, 4, "../images/laba4/task2.png", "button4",
                ["text"], ["input_A4"], ["X"]
            );
        ?>
    </div>
    <?php render_footer(); ?>
</body>
</html>