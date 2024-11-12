if (!(localStorage.getItem('counter'))) {
    localStorage.setItem('counter', JSON.stringify({
        "rightCounter": 0,
        "questionCounter": 1
    }));
    var rightCounter = 0;
    var questionCounter = 1;
} else {
    var rightCounter = JSON.parse(localStorage.getItem('counter')).rightCounter;
    var questionCounter = JSON.parse(localStorage.getItem('counter')).questionCounter;
}
document.getElementById('rightCounter').innerText = rightCounter;
document.getElementById('questionsCounter').innerText = `question ${questionCounter} of 10`;

if (!(JSON.parse(localStorage.getItem("quiz_user")))) { document.getElementById("card").style.display = "none" }
else { document.getElementById("auth").style.display = "none"; }



function auth() {
    let userName = document.getElementById("auth_userNameInput").value;
    
    localStorage.setItem("quiz_user", JSON.stringify({"userName": userName}));
    // location.reload();
}

function getAnswer(number) {
    fetch('../logic/laba9/getUserRightAnswer.php').then(response => response.json()).then(data => {
        if (`${number}` === data.rightAnswer) {
            var temp_rightCounter = JSON.parse(localStorage.getItem('counter')).rightCounter + 1;
        } else {
            var temp_rightCounter = JSON.parse(localStorage.getItem('counter')).rightCounter;
        }
        var temp_questionsCounter = JSON.parse(localStorage.getItem('counter')).questionCounter + 1;

        localStorage.setItem('counter', JSON.stringify({
            "rightCounter": temp_rightCounter,
            "questionCounter": temp_questionsCounter
        }));
    }).catch(error => console.error('Error:', error));

    location.reload();
}

function clearLocalStorage() { localStorage.removeItem('counter'); }