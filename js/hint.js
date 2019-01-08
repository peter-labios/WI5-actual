// Get the modal (Agent)
var modal = document.getElementById("myModal");

// Get the button that opens the modal (Agent)
var btn = document.getElementById("hint-button");

// Get the <span> element that closes the modal (Agent)
var span = document.getElementsByClassName("close")[0];

// Hint Timer variable
var hint_timer = 0;

// Page Timer variable
var page_timer = 0;

// Hint Click var
var click_count = 0;

// 200 words per minute
var aveReadingSpeed = 200/60;

// When the user clicks the button, open the modal (Agent)
btn.onclick = function () {
    modal.style.display = "block";
    if (click_count == 0) {
        hint = setTimeout(addHint, 1000);
    }
    else {
        hint = temp;
        hint = setTimeout(addHint, 1000);
    }

    click_count++;
    document.getElementById("hint-click-count").value = click_count;
}

// When the user clicks on <span> (x), close the modal (Agent)
span.onclick = function () {
    modal.style.display = "none";
    temp = hint;
    clearTimeout(hint);
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        temp = hint;
        clearTimeout(hint);
    }
}

var start = document.getElementById('hint-button'),
resume = document.getElementById('hint-button'),
pause = document.getElementById('pause'),
clear = document.getElementById('clear'),
page, hint = 0,
temp;

function add() {
    page_timer++;
    if(document.getElementById('checkAgent').value=="yes"){

        if(document.getElementById('answer-streak').value > 0 && document.getElementById('answer-streak').value < 5 && page_timer < 10){
            //var image = document.getElementById('hint-button');
            //image.src = getBaseUrl() + "img/agent/Positive (frame 1).png";
            $.ajax({
                method: "POST",
                url: getBaseUrl() + "/GameController/setCurrentAgentAvatar/",
                data: {'currentAvatar': getBaseUrl() + "img/agent/Positive (frame 1).png"
                },
                dataType: "text"
            });
        }

        if(document.getElementById('answer-streak').value >= 5 && page_timer < 10){
            //var image = document.getElementById('hint-button');
            //image.src = getBaseUrl() + "img/agent/Fired-up Face (frame 1).png";
            $.ajax({
                method: "POST",
                url: getBaseUrl() + "/GameController/setCurrentAgentAvatar/",
                data: {'currentAvatar': getBaseUrl() + "img/agent/Fired-up Face (frame 1).png"
                },
                dataType: "text"
            });
        }

        if(page_timer > 5 && page_timer < 10){
            var image = document.getElementById('hint-button');
            image.src = getBaseUrl() + "img/agent/Idle, Answering too slow (frame 1).png";
            $.ajax({
                method: "POST",
                url: getBaseUrl() + "/GameController/setCurrentAgentAvatar/",
                data: {'currentAvatar': getBaseUrl() + "img/agent/Idle, Answering too slow (frame 1).png"
                },
                dataType: "text"
            });
        }

        if(page_timer > 10){
            var image = document.getElementById('hint-button');
            image.src = getBaseUrl() + "img/agent/Negative reaction (frame 1).png";
            $.ajax({
                method: "POST",
                url: getBaseUrl() + "/GameController/setCurrentAgentAvatar/",
                data: {'currentAvatar': getBaseUrl() + "img/agent/Negative reaction (frame 1).png"
                },
                dataType: "text"
            });
        }
    }
    
    timer();
    document.getElementById("ans-time").value = page_timer;
}

function addHint() {
    hint_timer++;
    timerHint();
    document.getElementById("hint-time").value = hint_timer;
}

function timer() {
    page = setTimeout(add, 1000);
}

function timerHint() {
    hint = setTimeout(addHint, 1000);
}

function calculateReadingSpeed(){
    s = document.getElementById("actual-question").value;
    s = s.replace(/(^\s*)|(\s*$)/gi,"");
    s = s.replace(/[ ]{2,}/gi," ");
    s = s.replace(/\n /,"\n");
    return (s.split(' ').length)/aveReadingSpeed;
}

function getBaseUrl(){
    return document.getElementById("base-url").value;
}

//RANDOMIZER

$(function () {
    var parent = $("#multiple");
    var divs = parent.children();
    while (divs.length) {
        parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
    }
    widthFix();
});

//RESPONSIVE CHOICES

function widthFix() {
    var a = document.getElementById('a').offsetWidth;
    var b = document.getElementById('b').offsetWidth;
    var c = document.getElementById('c').offsetWidth;
    var d = document.getElementById('d').offsetWidth;
    var longest = Math.max(a, b, c, d);

    document.getElementById('a').style.width = longest + "px";
    document.getElementById('b').style.width = longest + "px";
    document.getElementById('c').style.width = longest + "px";
    document.getElementById('d').style.width = longest + "px";
}