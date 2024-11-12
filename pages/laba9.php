<?php
    include "../logic/laba9/questions.php";
    include "../logic/laba9/users.php";

    $conn = mysqli_connect("localhost", "root", "", "quiz");
    if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

    $randNumber = rand(1, 10);
    $askedQuestions = getAskedQuestions($conn);
    echo "Счетчик вопросов (чекай конец по длинне массива, а не по счетчику)<BR>";
    echo "Несколько пользователей<BR>";
    echo "Таймер";
    $askedQuestionsArray = explode(',', $askedQuestions);
    while (in_array($randNumber, $askedQuestionsArray) !== false) { $randNumber = rand(1, 10); }

    $rightAnswer = getRightAnswer($conn, $randNumber);
    setRightAnswer($conn, $rightAnswer);
    $question = getQuestion($conn, $randNumber);
    $answers = array(getAnswer($conn, $randNumber, 1), getAnswer($conn, $randNumber, 2), getAnswer($conn, $randNumber, 3), getAnswer($conn, $randNumber, 4));

    // setAskedQuestions($conn, $askedQuestions.",$randNumber");
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
    <link rel="stylesheet" href="../styles/quiz.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atomic+Age&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Викторина</title>
</head>
<body>
    <div class="main">

        <div id="auth">
            <input id="auth_userNameInput" type="text" placeholder="Имя пользователя">
            <button onClick="auth()">Авторизоваться</button>
        </div>

        <div class="main__card" id="card">
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
                <button class="main__card__buttons__form__button" onClick="getAnswer(1)"> <?php echo $answers[0] ?> </button>
                <button class="main__card__buttons__form__button" onClick="getAnswer(2)"> <?php echo $answers[1] ?> </button>
                <button class="main__card__buttons__form__button" onClick="getAnswer(3)"> <?php echo $answers[2] ?> </button>
                <button class="main__card__buttons__form__button" onClick="getAnswer(4)"> <?php echo $answers[3] ?> </button>
            </div>
        </div>
    </div>

<script src='../logic/laba9/logic.js'></script>
</body>
</html>

<?php mysqli_close($conn); ?>