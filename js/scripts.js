"use strict"
function load() {
    var loadCounter = 0;
    var text = "";
    document.getElementById("loader").innerHTML = "Proces załadowania: ";
    do {
        text = `${loadCounter++}% `;
    }
    while (loadCounter <= 100)
    document.getElementById("loader").innerHTML = "Proces załadowania: " + text;
}



var score = 0;

function enterNamePrompt() {
    var person = prompt("Wprowadz swoje imię", "Michalina");
    if (person != "") {
        document.getElementById("name").innerHTML =
            "Cześć, " + person + "! Twoje punkty: ";
    }
    else {
        document.getElementById("name").innerHTML =
            "Witaj, Gościu! Twoje punkty: ";
    }

    document.getElementById("score").innerHTML = score;

    var luck = Math.random() * 100;

    luck = parseFloat(luck.toString());

    document.getElementById("luckMeter").innerHTML =
        "Twój dzisiejszy miernik szczęścia: " + luck.toPrecision(4);

    document.getElementById("display").style['display'] = 'block';
}


button = document.getElementById("enterName");

button.addEventListener("blur", function () {
    document.getElementById("enterName").innerHTML = "Wprowadzono";
});



var butClass = document.getElementsByClassName("buttonClicked");

for (var i = 0; i < butClass.length; i++) {
    butClass[i].addEventListener('click', function () {
        this.style['background-color'] = 'HoneyDew';
    }, false);
}




function counter() {
    document.getElementById("score").innerHTML = `${score++}`
}
function reset() {
    alert("Zaczynasz od początku");
    load(0);
    document.getElementById("score").innerHTML = `${score = 0}`
}






function rank() {
    var rank = ["Kasia 52", "Martyna 35", "Piotrek 24", "Kamil 18"];
    var text = "";
    var i;
    for (i = 0; i < rank.length; i++) {
        text += i + 1 + ". " + rank[i] + "<br />";
    }
    document.getElementById("ranking").innerHTML = text;
}

function vote() {
    var userNote = prompt("Twoja średnia ocena naszego portalu (0.0-5.0):", "5.0");
    userNote = Math.floor(userNote);
    var ourAnswer = "";
    switch (userNote) {
        case 0:
        case 1:
            ourAnswer = "Co możemy poprawić?";
            break;
        case 2:
        case 3:
            ourAnswer = "Wciąż dokładamy starań, aby było lepiej";
            break;
        case 4:
        case 5:
            ourAnswer = "Cieszymy się, że podoba Ci się :)";
            break;
        default:
            ourAnswer = "Nie udzieliłeś odpowiedzi :(";
            userNote = "?";
    }

    document.getElementById("answer").innerHTML =
        "Twoja średnia ocena: " + userNote + "<br />Nasza odpowiedź: " + ourAnswer;
}

function print() {
    var number = prompt("Podaj liczbę elementów do wyświetlenia", 10)
    var text = "";
    var i = 0;
    while (i < number) {
        text += "Element nr: " + parseInt(i + 1) + "<br />";
        i++;
    };
    document.getElementById("element").innerHTML = text;
}

function input() {
    var number = prompt("Podaj liczbę zmiennoprzecinkową", 3.4325678)
    document.getElementById("float").innerHTML = parseFloat(number);
}




window.addEventListener("click", function () {
    document.getElementsByClassName("backgroundColor")[0].style['background-color'] = 'AliceBlue';
});
