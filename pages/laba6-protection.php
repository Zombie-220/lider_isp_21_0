<?php
    include "../template/header.php";
    include "../template/footer.php";
    include "../template/task.php";

    include "../logic/protection/laba6.php";
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
    <title>Защита 6 лабы</title>
</head>
<body>
    <?php render_header("6 - защита") ?>

    <div class="main">
        <?php
            render_task($task,
                1, "Дан одномерный массив из 10 элементов, найти наибольший и наименьший элементы и среднее арифметическое всех элементов массива", "firstButton", [], []
            );
        ?>
    </div>

    <?php render_footer(); ?>
</body>
</html>