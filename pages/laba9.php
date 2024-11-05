<?php
    include "../template/quizCard.php";
    $count = 1;
    $rightCounter = 0
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
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Викторина</title>
</head>
<body>
    <div class="main">
        <div class="main__card">
            <div class="main__card__header">
                <a class="main__card__header__buttonExit" href="../index.php"><img class="main__card__header__buttonExit__img" src="../images/icons/closeIcon.png" alt="X"></a>
                <div class="main__card__header__wrapper">
                    <p class="main__card__header__wrapper__counter"> <?php echo (($count <= 9 and $count >= 0) ? "0$count" : "$count"); ?> </p>
                </div>
                <div class="main__card__header__wrapper__rightCounter">
                    <img class="main__card__header__wrapper__rightCounter__img" src="../images/icons/heart.png" alt="?">
                    <p class="main__card__header__wrapper__rightCounter__text"><?php echo $rightCounter ?></p>
                </div>
            </div>
            <div class="main__card__body">
                <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg" alt="questionImage">
                <p class="main__card__body__counter">question <?php echo $count; ?> of 10</p>
                <p class="main__card__body__question">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, delectus.</p>
            </div>
            <div class="main__card__buttons">
                <button class="main__card__buttons__button">ответ 1</button>
                <button class="main__card__buttons__button">ответ 2</button>
                <button class="main__card__buttons__button">ответ 3</button>
                <button class="main__card__buttons__button">ответ 4</button>
            </div>
        </div>
    </div>
</body>
</html>