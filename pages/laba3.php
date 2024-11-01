<?php
    include "../template/header.php";
    include "../template/footer.php";
    include "../template/task.php";
    
    include "../logic/laba3/task_1.php";
    include "../logic/laba3/task_2.php";
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
    <title>Третья лаба</title>
</head>
<body>
    <?php render_header(3); ?>

    <div class="main">
        <?php
            render_task($task_1,
                1, "Даны два числа a и b. Найти их среднее арифметическое: (a + b)/2.", "firstButton", ["input_A", "input_B"], ["a", "b"]);

            render_task($task_2,
                2, "Дано двузначное число. Вывести число, полученное при перестановке цифр исходного числа.", "secondButton", ["input_Number"], ["число"]);
        ?>
        </div>
    </div>
    <?php render_footer(); ?>
</body>
</html>