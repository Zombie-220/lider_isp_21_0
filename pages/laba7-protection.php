
<?php
include "../template/header.php";
include "../template/footer.php";
include "../template/task.php";

include '../logic/protection/laba7/laba7.php';
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
    <title>Защита 7 лабы</title>
</head>
<body>
    <?php render_header("7 - защита") ?>

    <div class="main">
        <?php
            render_task($task,
                1, "1. написать класс для отрисовки таблицы списка пользователей, список создан заранее в конструкторе<BR>
                2. создать дочерний класс на основе родительского из прошлого задания с возможностью редактирования пользователей", "firstButton", [], []
            );
        ?>
    </div>

    <?php render_footer(); ?>
</body>
</html>