function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
  }
  
function getAnswer(number) {
    var questionId = JSON.parse(sessionStorage.getItem("counters")).questionCounter;
    fetch('../logic/laba9/getRightAnswerById.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ 'questionId': questionId })
    }).then(response => response.json()).then(data => {
        if (`${number}` === `${data.answer}`) { var temp_rightCounter = JSON.parse(sessionStorage.getItem('counters')).rightCounter + 1; }
        else { var temp_rightCounter = JSON.parse(sessionStorage.getItem('counters')).rightCounter; }

        sessionStorage.setItem('counters', JSON.stringify({
            'rightCounter': temp_rightCounter,
            'questionCounter': JSON.parse(sessionStorage.getItem('counters')).questionCounter + 1,
        }));
    }).catch(error => { console.error('Error at getRightAnswerById:', error) })
    setTimeout(() => {location.reload()}, 50);
}

function clearSessionStorage() { sessionStorage.removeItem('counters'); }

function createUser() {
    var userName = document.getElementById("hiddenDiv__input").value;
    if (userName != "") {
        console.log(userName, JSON.parse(sessionStorage.getItem("counters")).rightCounter);
        fetch('../logic/laba9/addUserToDatabase.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                'userName': userName,
                'score': JSON.parse(sessionStorage.getItem("counters")).rightCounter
            })
        }).then(response => response.json()).then(data => {  }).catch(error => { console.error('Error at addUserToDatabase:', error) })
        window.location.href = "../pages/laba9_liderPage.php";
    } else { document.getElementById("hiddenWarningText").style.display = "block"; }
}