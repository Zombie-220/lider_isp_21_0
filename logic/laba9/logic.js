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



function getAnswer() {
    var radioButtons = document.querySelectorAll('input[name="answerButtonCheck"]');
    for (var radioButton of radioButtons) {
        if (radioButton.checked) {
            var userAnswer = radioButton.value;
        }
    }

    fetch('../logic/laba9/getUserRightAnswer.php').then(response => response.json()).then(data => {
        if (userAnswer === data.rightAnswer) {
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

    document.getElementById('renredSite').click();
}

function clearLocalStorage() { localStorage.removeItem('counter'); }