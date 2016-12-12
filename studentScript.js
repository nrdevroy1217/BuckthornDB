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

function teamNameBlurFunc() {
    var val = document.getElementById("teamVal").value;
    document.getElementById("teamNameHidden").value = val;
    var updated = document.getElementById("teamNameHidden").value;
}

function teamIDBlurFunc() {
    var val = document.getElementById("idVal").value;
    document.getElementById("teamIDHidden").value = val;
    var updated = document.getElementById("teamIDHidden").value;
}

function dateBlurFunc() {
    var val = document.getElementById("dateVal").value;
    document.getElementById("dateHidden").value = val;
    var updated = document.getElementById("dateHidden").value;
}

function latitudeValFunc() {
    var val = document.getElementById("latitudeVal").value;
    document.getElementById("latitudeHidden").value = val;
    var updated = document.getElementById("latitudeHidden").value;
}

function longitudeValFunc() {
    var val = document.getElementById("longitudeVal").value;
    document.getElementById("longitudeHidden").value = val;
    var updated = document.getElementById("longitudeHidden").value;
}

function quadSizeValFunc() {
    var val = document.getElementById("quadSizeVal").value;
    document.getElementById("quadrantSizeHidden").value = val;
    var updated = document.getElementById("quadrantSizeHidden").value;
}

function buckthornStemValFunc() {
    var val = document.getElementById("buckthornStemVal").value;
    document.getElementById("buckthornStemHidden").value = val;
    var updated = document.getElementById("buckthornStemHidden").value;
}

function buckthornDensityValFunc() {
    var val = document.getElementById("buckthornDensityVal").value;
    document.getElementById("buckthornDensityHidden").value = val;
    var updated = document.getElementById("buckthornDensityHidden").value;
}

function buckthornCoverageValFunc() {
    var val = document.getElementById("buckthornCoverageVal").value;
    document.getElementById("buckthornCoverageHidden").value = val;
    var updated = document.getElementById("buckthornCoverageHidden").value;
}

function medBuckthornValFunc() {
    var val = document.getElementById("medBuckthornVal").value;
    document.getElementById("medianBuckthornHidden").value = val;
    var updated = document.getElementById("medianBuckthornHidden").value;
}

function habDescValFunc() {
    var val = document.getElementById("habDescVal").value;
    document.getElementById("habitatDescHidden").value = val;
    var updated = document.getElementById("habitatDescHidden").value;
}

function otherNotesValFunc() {
    var val = document.getElementById("otherNotesVal").value;
    document.getElementById("otherNotesHidden").value = val;
    var updated = document.getElementById("otherNotesHidden").value;
}

function speciesFunc() {
    var val = document.getElementById("speciesVal").value;
    document.getElementById("speciesHidden").value = val;
    var updated = document.getElementById("speciesHidden").value;
}

function swiFunc() {
    var val = document.getElementById("swiVal").value;
    document.getElementById("swiHidden").value = val;
    var updated = document.getElementById("swiHidden").value;
}

function biodivFunc() {
    var val = document.getElementById("biodivVal").value;
    document.getElementById("biodivHidden").value = val;
    var updated = document.getElementById("biodivHidden").value;  
}
