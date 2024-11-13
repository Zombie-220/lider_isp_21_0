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

function clearLocalStorage() { localStorage.removeItem('counters'); }