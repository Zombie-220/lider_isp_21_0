<?php
    include "../logic/laba9/questions.php";
    include "../logic/laba9/users.php";

    $conn = mysqli_connect("localhost", "root", "", "quiz");
    if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

    $randNumber = rand(1, 10);
    $askedQuestions = getAskedQuestions($conn);
    echo $askedQuestions.",$randNumber";
    $askedQuestionsArray = explode(',', $askedQuestions);
    while (in_array($randNumber, $askedQuestionsArray) !== false) { $randNumber = rand(1, 10); }

    $rightAnswer = getRightAnswer($conn, $randNumber);
    setRightAnswer($conn, $rightAnswer);
    $question = getQuestion($conn, $randNumber);
    $answers = array(getAnswer($conn, $randNumber, 1), getAnswer($conn, $randNumber, 2), getAnswer($conn, $randNumber, 3), getAnswer($conn, $randNumber, 4));

    setAskedQuestions($conn, $askedQuestions.",$randNumber");
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
                <button onClick="clearLocalStorage()" class='main__card__header__buttonExit__closeButton'>
                    <a class="main__card__header__buttonExit" href="../index.php">
                        <img class="main__card__header__buttonExit__img" src="../images/icons/closeIcon.png" alt="X">
                    </a>
                </button>
                <div class="main__card__header__wrapper">
                    <p class="main__card__header__wrapper__counter">тут таймер, сука</p>
                </div>
                <div class="main__card__header__wrapper__rightCounter">
                    <img class="main__card__header__wrapper__rightCounter__img" src="../images/icons/heart.png" alt="?">
                    <p class="main__card__header__wrapper__rightCounter__text" id='rightCounter'>?</p>
                </div>
            </div>
            <div class="main__card__body">
                <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg" alt="questionImage">
                <p class="main__card__body__counter" id="questionsCounter">question ? of 10</p>
                <p class="main__card__body__question"><?php echo $question; ?></p>
            </div>
            <div class="main__card__buttons">
                <form class="main__card__buttons__form">
                    <div class="main__card__buttons__buttonWrappers">
                        <label for=""> <?php echo $answers[0]; ?> </label>
                        <input type="radio" class="main__card__buttons__buttonRadio" name="answerButtonCheck" value="1">
                    </div>
                    <div class="main__card__buttons__buttonWrappers">
                        <label for=""> <?php echo $answers[1] ?> </label>
                        <input type="radio" class="main__card__buttons__buttonRadio" name="answerButtonCheck" value="2">
                    </div>
                    <div class="main__card__buttons__buttonWrappers">
                        <label for=""> <?php echo $answers[2] ?> </label>
                        <input type="radio" class="main__card__buttons__buttonRadio" name="answerButtonCheck" value="3">
                    </div>
                    <div class="main__card__buttons__buttonWrappers">
                        <label for=""> <?php echo $answers[3] ?> </label>
                        <input type="radio" class="main__card__buttons__buttonRadio" name="answerButtonCheck" value="4">
                    </div>
                    <button id='renredSite' style="display: none;">!!!</button>
                </form>
                <button onClick='getAnswer()' class="main__card__buttons__button">ОТВЕТИТЬ</button>
            </div>
        </div>
    </div>

<script src='../logic/laba9/logic.js'></script>
</body>
</html>

<?php mysqli_close($conn); ?>