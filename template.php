<?php
    include "../template/header.php";
    include "../template/footer.php";
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
    <link rel='stylesheet' href='./styles/laba.css'>
    <title>Лаба <?php $title ?></title>
</head>
<body>
    <?php
        render_header($title);
        $mainContent;
        render_footer();
    ?>
</body>
</html>