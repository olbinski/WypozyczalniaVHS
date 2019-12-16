
function removeFromRoot(position) {

    var parent = document.getElementById("rootdiv");
    parent.removeChild(parent.childNodes[position]);

}

function createMyButton(name, parentId) {

    var button = document.createElement("button");
    button.id = name;
    var textNode = document.createTextNode(name);

    button.appendChild(textNode);
    button.onclick = () => removeFromRoot(0);
    var parent = document.getElementById(parentId);
    parent.appendChild(button);

}

function replace(oldId, newNode) {

    var old = document.getElementById(oldId);
    var parent = old.parentNode;
    parent.replaceChild(newNode, old);

}


function myInsertBefore(elementBeforeInsertionID, newElement) {

    var elementBeforeInsertion = document.getElementById(elementBeforeInsertionID);
    var parent = elementBeforeInsertion.parentNode;
    parent.insertBefore(newElement, elementBeforeInsertion);

}

