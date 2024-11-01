<?php
    include "./template/header.php";
    include "./template/footer.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='robots' content='noindex'>
        <meta name='description' content='main page'>
        <meta name='keywords' content='php, html'>
        <meta name='author' content="Lider_Denis">
        <link rel='stylesheet' href='./styles/all.css'>
        <link rel='stylesheet' href='./styles/index.css'>
        <title>Главная</title>
    </head>
<body>
    <?php render_header(); ?>

    <div class="main">
        <h1>Лабораторные работы</h1>
        <p>Исполнитель: Лидер Денис ИСП-21</p>
        <a href="./pages/laba3.php" class="main__url">Лабораторная работа №3</a>
        <a href="./pages/laba4.php" class="main__url">Лабораторная работа №4</a>
        <a href="./pages/laba5.php" class="main__url">Лабораторная работа №5</a>
        <a href="./pages/laba6.php" class="main__url">Лабораторная работа №6</a>
        <a href="./pages/laba7.php" class="main__url">Лабораторная работа №7</a>
    </div>

    <?php render_footer(); ?>

</body>
</html>