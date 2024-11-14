function getAnswer(number) {
    var questionId = JSON.parse(localStorage.getItem("counters")).questionNumber;

    fetch('../logic/laba9/getRightAnswerById.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ 'questionId': questionId })
    }).then(response => response.json()).then(data => {
        if (`${number}` === `${data.answer}`) { var temp_rightCounter = JSON.parse(localStorage.getItem('counters')).rightCounter + 1; }
        else { var temp_rightCounter = JSON.parse(localStorage.getItem('counters')).rightCounter; }

        localStorage.setItem('counters', JSON.stringify({
            'rightCounter': temp_rightCounter,
            'questionCounter': JSON.parse(localStorage.getItem('counters')).questionCounter + 1,
            // 'askedQuestions': JSON.parse(localStorage.getItem('counters')).askedQuestions + `,${questionId}`,
            'askedQuestions': "0",
            'questionNumber': 0
        }));
    }).catch(error => { console.error('Error at getRightAnswerById:', error) })

    location.reload();
}

function clearLocalStorage() { localStorage.removeItem('counters'); }