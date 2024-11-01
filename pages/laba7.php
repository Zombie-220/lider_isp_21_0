<?php
    include "../template/header.php";
    include "../template/footer.php";
    include "../template/task.php";

    include "../logic/laba7/task_1.php";
    include "../logic/laba7/task_2.php";
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
    <title>Седьмая лаба</title>
</head>
<body>
    <?php render_header(7) ?>

    <div class="main">
        <?php
            render_task($task_1,
                1, "Дана матрица размера M × N. Вывести ее элементы, расположенные в строках с четными номерами (2, 4, ...). Вывод элементов производить по строкам, условный оператор не использовать.",
                "firstButton", ["input_M1", "input_N1"], ["M", "N"]
            );

            render_task($task_2,
                2, "Дана матрица размера M × N. Зеркально отразить ее элементы относительно горизонтальной оси симметрии матрицы (при этом поменяются местами строки с номерами 1 и M, 2 и M − 1 и т. д.).",
                "secondButton", ["input_M2", "input_N2"], ["M", "N"]
            );
        ?>
    </div>
    <?php render_footer(); ?>
</body>
</html>