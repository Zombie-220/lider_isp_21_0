function submitForm() {
    var userCounter = JSON.parse(localStorage.getItem('userCounters'));
    var counter = userCounter['counter'];
    var rightCounter = userCounter['rightCounter'];
    obj = {
        "counter": counter + 1,
        "rightCounter": (document.getElementById('answer').innerText == 'true') ? rightCounter+1 : rightCounter
    };
    localStorage.setItem("userCounters", JSON.stringify(obj));
}

function clearLocalstorage() { localStorage.removeItem("userCounters"); }

if (!localStorage.getItem("userCounters")) {
    obj = {
        "rightCounter": 0,
        "counter": 1
    };
    localStorage.setItem("userCounters", JSON.stringify(obj));
} else {
    var userCounter = JSON.parse(localStorage.getItem("userCounters"));
    var counter = document.getElementById('counter');
    var headerCounter = document.getElementById('headerCounter');
    counter.innerText = `question ${userCounter['counter']} of 10`;
    headerCounter.innerText = `${userCounter['counter']<=9 && userCounter['counter']>=0 ? "0": ""}${userCounter['counter']}`;

    var rightCounter = document.getElementById('rightCounter');

    var userCounter = JSON.parse(localStorage.getItem('userCounters'));
    rightCounter.innerText = `${document.getElementById('answer').innerText == 'true' ? userCounter['rightCounter']+1 : userCounter['rightCounter']}`;
}