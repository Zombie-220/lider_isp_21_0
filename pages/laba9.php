<?php
    $conn = new mysqli("localhost", "root", "", "quiz");

    if ($conn->connect_error) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }
    
    $randNumber = rand(1, 10);
    $rigthAnswer = getRightAnswer();

    function getQuestion() {
        global $randNumber;
        global $conn;

        $result = $conn->query("SELECT title FROM questions WHERE id = $randNumber;");
        if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
        $row = mysqli_fetch_assoc($result);
        return $row['title'];
    }

    function getAnswer($n) {
        global $randNumber;
        global $conn;

        $var = "question_$n";
        $result = $conn->query("SELECT $var FROM questions WHERE id = $randNumber;");
        if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
        $row = mysqli_fetch_assoc($result);
        return $row["$var"];
    }

    function getRightScore() {
        global $randNumber;
        global $conn;

        $result = $conn->query("SELECT score FROM users WHERE userName='user';");
        if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
        $row = mysqli_fetch_assoc($result);
        return $row['score'];
    }

    function getRightAnswer() {
        global $randNumber;
        global $conn;
        
        $result = mysqli_query($conn, "SELECT answer FROM questions WHERE id = $randNumber");
        if (!$result) { die("Ошибка выполнения запроса: " . mysqli_error($conn)); }
        $row = mysqli_fetch_assoc($result);
        return $row['answer'];
    }
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

        <div class="circle"></div>

        <div class="main__card">
            <div class="main__card__header">
                <button class="main__card__header__closeButton" onClick="clearLocalstorage()">
                    <a class="main__card__header__buttonExit" href="../index.php">
                        <img class="main__card__header__buttonExit__img" src="../images/icons/closeIcon.png" alt="X">
                    </a>
                </button>
                <div class="main__card__header__wrapper">
                    <p class="main__card__header__wrapper__counter" id="headerCounter"> 01 </p>
                </div>
                <div class="main__card__header__wrapper__rightCounter">
                    <img class="main__card__header__wrapper__rightCounter__img" src="../images/icons/heart.png" alt="?">
                    <p class="main__card__header__wrapper__rightCounter__text" id="rightCounter">0</p>
                </div>
            </div>
            <div class="main__card__body">
                <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg" alt="questionImage">
                <p class="main__card__body__counter" id="counter">question 1 of 10</p>
                <p class="main__card__body__question"><?php echo getQuestion(); ?></p>
            </div>
            <div class="main__card__buttons" method="post">
                <form class="main__card__buttons__form" method="post">
                    <div class="main__card__buttons__buttonWrappers">
                        <label for=""><?php echo getAnswer(1) ?> </label>
                        <input type="radio" class="main__card__buttons__buttonRadio" name="answerButtonCheck" value="1">
                    </div>
                    <div class="main__card__buttons__buttonWrappers">
                        <label for=""><?php echo getAnswer(2) ?> </label>
                        <input type="radio" class="main__card__buttons__buttonRadio" name="answerButtonCheck" value="2">
                    </div>
                    <div class="main__card__buttons__buttonWrappers">
                        <label for=""><?php echo getAnswer(3) ?> </label>
                        <input type="radio" class="main__card__buttons__buttonRadio" name="answerButtonCheck" value="3">
                    </div>
                    <div class="main__card__buttons__buttonWrappers">
                        <label for=""><?php echo getAnswer(4) ?> </label>
                        <input type="radio" class="main__card__buttons__buttonRadio" name="answerButtonCheck" value="4">
                    </div>
                    <button type="submit" name="answerButton" class="main__card__buttons__button" onclick="submitForm()">ОТВЕТИТЬ</button>
                </form>
                <?php echo getRightAnswer(); ?>
                <?php
                    if(isset($_POST['answerButton'])) {
                        $userAnswer = (int)$_POST["answerButtonCheck"];
                        if ($userAnswer == $rigthAnswer) { echo "<p id='answer'>true</p>"; }
                        else { echo "<p id='answer'>false</p>"; }
                        echo $userAnswer . "==" . $rigthAnswer;
                    }
                ?>
            </div>
        </div>
    </div>
<script src="../scripts/laba9.js"></script>
</body>
</html>

<?php $conn->close(); ?>

<!-- мы не видим будущее -->