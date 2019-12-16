function changeColor(styleName) {

    var color = document.getElementById("colorPicker").value
    var root = document.getElementById("rootdiv");
    root.style[styleName] = color;
}


function changeTextFont(font) {

    var root = document.getElementById("rootdiv");

    root.style.fontFamily = font;

}


