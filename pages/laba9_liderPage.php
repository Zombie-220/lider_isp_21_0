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
    <title>Лидеры</title>
</head>

<body>
    <header class="liderPage__header">
        <p class="liderPage__header__header">Таблица лидеров</p>
        <button onClick="clearSessionStorage()" class="liderPage__header__button">
            <a href="../index.php" class="liderPage__header__button__link">Назад</a>
        </button>
    </header>
    <table id="table" border="1">
        <thead>
            <tr>
                <th>Имя пользователя</th>
                <th>Счёт</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>

<script>
    fetch('http://deniskxw.beget.tech/users/liders')
    .then(response => response.json()).then(data => {
        var table = document.getElementById("table").getElementsByTagName('tbody')[0];
        for (let i = 0; i < data.usersTable.length; i++) {

            var newRow = table.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            cell1.innerHTML = `${data.usersTable[i]}`;
            cell2.innerHTML = `${data.scoreTable[i]}`;
        }
    }).catch(error => { console.error('Error at getUsersByScore.php:', error); })
</script>

<script src="../logic/laba9/logic.js"></script>
</html>