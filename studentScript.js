function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function nextChar(c) {
    return String.fromCharCode(c.charCodeAt(0) + 1);
}

var speciesLetter = "B";

function addSpecies() {
    var newParagraph = document.createElement("p");
    var newInput = document.createElement("input");
    var text = document.createTextNode("Species (" + speciesLetter + ") :");
    newParagraph.appendChild(text);
    newParagraph.appendChild(newInput);
    document.getElementById("species").appendChild(newParagraph);
    speciesLetter = nextChar(speciesLetter);
}

function checkData() {
    // check Species
    // figure out SWI
}

function resetData(){
    // reset all data to ""
    // increase observation # by 1

}

function blurFunc() {
    var val = document.getElementById("teamVal").value;
    document.getElementById("link1").value = val;
    var updated = document.getElementById("link1").value;
    alert(updated);



}
