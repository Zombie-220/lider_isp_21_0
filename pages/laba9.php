<?php
    include "../logic/laba9/questions.php";
    include "../logic/laba9/users.php";

    $conn = mysqli_connect("localhost", "root", "", "quiz");
    if (!$conn) { die("Ошибка подключения: " . mysqli_connect_error()); }

    // echo "Мониторинг вопросов (чекай конец по длинне массива, а не по счетчику)<BR>";
    // echo "Несколько пользователей<BR>";
    // echo "Таймер";
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
                    <p class="main__card__header__wrapper__rightCounter__text" id='rightCounter'>rightCounter</p>
                </div>
            </div>
            <div class="main__card__body">
                <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg" alt="questionImage">
                <p class="main__card__body__counter" id="questionsCounter">question ? of 10</p>
                <p class="main__card__body__question" id='questionWording'>questionWording</p>
            </div>
            <div class="main__card__buttons">
                <button class="main__card__buttons__form__button" onClick="getAnswer(1)">answer_1</button>
                <button class="main__card__buttons__form__button" onClick="getAnswer(2)">answer_2</button>
                <button class="main__card__buttons__form__button" onClick="getAnswer(3)">answer_3</button>
                <button class="main__card__buttons__form__button" onClick="getAnswer(4)">answer_4</button>
            </div>
        </div>
    </div>

<script>
    if (!(localStorage.getItem('counters'))) {
        localStorage.setItem('counters', JSON.stringify({
            "rightCounter": 0,
            "questionCounter": 1,
            "askedQuestions": "0",
            "questionNumber": 0
        }));
        var rightCounter = 0;
        var questionCounter = 1;
        var askedQuestions = '0';
        var questionNumber = 0;
    } else {
        var rightCounter = JSON.parse(localStorage.getItem('counters')).rightCounter;
        var questionCounter = JSON.parse(localStorage.getItem('counters')).questionCounter;
        var askedQuestions = JSON.parse(localStorage.getItem('counters')).askedQuestions;
        var questionNumber = JSON.parse(localStorage.getItem('counters')).questionNumber;
    }
    document.getElementById('rightCounter').innerText = rightCounter;
    document.getElementById('questionsCounter').innerText = `question ${questionCounter} of 10`;

    // let askedQuestionsArray = askedQuestions.split(",");
    // while (questionNumber in askedQuestionsArray) { questionNumber = Math.floor(Math.random() * 10) + 1; }

    // for (let i=0; i<askedQuestionsArray.length; i++) {
    //     console.log(`${questionNumber}` === `${askedQuestionsArray[i]}`);
    // }

    localStorage.setItem('counters', JSON.stringify({
        'rightCounter': rightCounter,
        'questionCounter': JSON.parse(localStorage.getItem('counters')).questionCounter,
        'askedQuestions': JSON.parse(localStorage.getItem('counters')).askedQuestions,
        'questionNumber': questionNumber
    }))

    fetch('../logic/laba9/getQuestionById.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ 'questionNumber': questionCounter })
    }).then(response => response.json()).then(data => {
        document.getElementById('questionWording').innerText = (JSON.stringify(data.question)).slice(1, -1);
    }).catch(error => { console.error('Error at getQuestionById:', error) })

    fetch('../logic/laba9/getAnswersById.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ 'questionNumber': questionCounter })
    }).then(response => response.json()).then(data => {
        let buttonsArray = document.getElementsByClassName("main__card__buttons__form__button");
        for(var i=0; i<buttonsArray.length; i++) {
            buttonsArray[i].innerText = (data.answers[i]);
        }
    }).catch(error => { console.error('Error at getAnswersById:', error) })

    /*
        1. запрос за правильным ответом и его проврека
        --- старый функционал готов ---
        2. учет заданых вопросов делай на localStorage, можно прям в counters
        3. по окончании вопросов выводить форму с добавлением пользователя (
            1. пользователь вводит имя
            2. отправляем запись в базу с именем и score
        )
        4. ебучий таймер (30000 ms)...
        5. таблица лидеров отдельной page



        1 день: 1, 2 пункты
        2 день: 3 и 5 пункты
        3 - 4 день: 4 пункт
    */
</script>

<script src='../logic/laba9/logic.js'></script>
</body>
</html>

<?php mysqli_close($conn); ?>