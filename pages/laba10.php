<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="description" content="chat page">
    <meta name="keywords" content="php, html">
    <meta name="author" content="Lider Denis">
    <link rel="stylesheet" href="../styles/all.css">
    <link rel="stylesheet" href="../styles/chat.css">
    <title>Чат</title>
</head>
<body>
    <div id='chat' style='display: none'>
        <header class="header">
            <a class="header-linkBack" href="../index.php">
                <img src="../images/laba10/back.png" alt="back" class="header-linkBack-img">
                <p class="header-linkBack-text">Назад</p>
            </a>
        </header>
        <div class="main" id="main">

        </div>
        <footer class="footer">
            <input class="footer-input" type="text" placeholder="Напишите сообщение" id="message">
            <button class="footer-button" onClick="postMessage()"><img src="../images/laba10/send.png" alt="sendMessage" class="footer-button-img"></button>
        </footer>
    </div>

    <div id='loginForm' style='display: none'>
        <input type="text" id="loginForm-input" placeholder="Введите имя">
        <p id='loginForm-error' style="display: none">Имя должно содержать от 4 символов</p>
        <button class="loginForm-button" onClick="RegisterUser()">Впустите меня!!</button>
    </div>

<script src='../logic/laba10/logic.js'></script>
<script>
    fetch('../logic/laba10/getIP.php').then(resp => resp.json())
    .then(data => {
        localStorage.setItem('ip', JSON.stringify(data.ip))
    }).catch(err => console.log(err))

    if (localStorage.getItem('userName')) {
        document.getElementById('chat').style = 'display: block';
        getAllMessage();
        const intervalId = setInterval(getAllMessage, 2000);
    } else { document.getElementById('loginForm').style = 'display: flex'; }
</script>
</body>
</html>