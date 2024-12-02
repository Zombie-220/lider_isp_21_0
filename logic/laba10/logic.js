function CreateMessage(userName, time, message) {
    let messageWrapper = document.createElement('div');
    messageWrapper.className = 'messageWrapper';

    let messageHeader = document.createElement('div');
    messageHeader.className = 'messageWrapper__header';

    let header_textAuthor = document.createElement('p');
    header_textAuthor.className = 'messageWrapper__header-textAuthor';
    header_textAuthor.textContent = `${userName}`;
    let header_textTime = document.createElement('p');
    header_textTime.className = 'messageWrapper__header-textTime';
    header_textTime.textContent = `${time} (Moscow)`;

    let messageBody = document.createElement('div');
    messageBody.className = 'messageWrapper__body';
    messageBody.textContent = `${message}`;

    messageHeader.appendChild(header_textAuthor);
    messageHeader.appendChild(header_textTime);
    messageWrapper.appendChild(messageHeader);
    messageWrapper.appendChild(messageBody);
    document.getElementById("main").appendChild(messageWrapper);
}

function RegisterUser() {
    let userName = document.getElementById('loginForm-input').value;
    if (userName.length >= 4) {
        localStorage.setItem('userName', JSON.stringify(userName));
        location.reload()
    } else { document.getElementById('loginForm-error').style = "display: block"; }
}

function postMessage() {
    if (document.getElementById('message').value.replace(/\s+/g, '') != '') {
        fetch('http://deniskxw.beget.tech/chat/messages/add', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                'userName': JSON.parse(localStorage.getItem('userName')),
                'message': document.getElementById('message').value,
                'ip': JSON.parse(localStorage.getItem('ip'))
            })
        }).then(response => response.json()).then(data => {
            document.getElementById('message').value = '';
        }).catch(err => { console.log(err); })
    }
}

function getAllMessage() {
    fetch('http://deniskxw.beget.tech/chat/messages/all')
    .then(response => response.json()).then(data => {
        if (data.users.length != 0) {
            let messageBoxes = document.getElementsByClassName('messageWrapper__body');

            if (messageBoxes.length == 0) { CreateMessage(data.users[0], data.timeStamp[0], data.message[0]); }
            
            for (let i = 0; i < data.users.length; i++) {
                if (!messageBoxes[i]) { CreateMessage(data.users[i], data.timeStamp[i], data.message[i]); }
            }
        }
    }).catch(err => { console.log(err); })
}