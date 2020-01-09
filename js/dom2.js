


function changeColor(styleName) {
    var color = document.getElementById("colorPicker").value
    var root = document.getElementById("rootdiv");
    root.style[styleName] = color;
 

    addCookieAsync(styleName, color.replace("#", ""));
}


function changeTextFont(font) {

    var root = document.getElementById("rootdiv");

    root.style.fontFamily = font;

  addCookieAsync("fontFamily", font);

}


function addCookieAsync(key, value){

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
    }
  };

  console.log("../ajax.php?key=" + key + "&value=" + value)
  xhttp.open("GET", "../ajax.php?key=" + key + "&value=" + value, true);
  
  xhttp.send();
}


