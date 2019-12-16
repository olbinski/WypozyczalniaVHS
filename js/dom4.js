let screenLog = document.querySelector('#screen-log');
document.getElementById("rootdiv").addEventListener('mousemove', logKey);
document.getElementById("rootdiv").addEventListener('mousedown', mouseDownFun);
document.getElementById("rootdiv").addEventListener('mouseup', mouseUpFun);
document.getElementById("button1").addEventListener('mouseover', mouseOverFun);
document.getElementById("button1").addEventListener('mouseout', mouseOutFun);


function logKey(e) {
    screenLog.innerText = `
    Screen X/Y: ${e.screenX}, ${e.screenY}
    Client X/Y: ${e.clientX}, ${e.clientY}`;
}

var backgroundColor = "white";

function mouseDownFun(e) {
    backgroundColor = document.getElementById("rootdiv").style.background
    document.getElementById("rootdiv").style.background = "black";
}

function mouseUpFun(e) {
    document.getElementById("rootdiv").style.background = backgroundColor;
}

function mouseOverFun(e) {
    document.getElementById("button1").style.color = "red";
}

function mouseOutFun(e) {
    document.getElementById("button1").style.color = "";
    // alert("opuściłeś diva")
}

function keys(event) {

    if (event.altKey) {
        alert("alt");
    } else if (event.shiftKey) {
        alert("shift");
    }
    else if (event.ctrlKey) {
        alert("ctrl")
    }
    else if (event.keyCode == 32) {
        alert("space");
    }


}