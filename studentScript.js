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

// Checks all required fields and disables submit feature until fields are populated
function submitFunc() {
    var date = document.getElementById("dateVal").value;
    var lat = document.getElementById("latitudeVal").value;
    var lon = document.getElementById("longitudeVal").value;
    var stems = document.getElementById("buckthornStemVal").value;
    var density = document.getElementById("buckthornDensityVal").value;
    var cov = document.getElementById("buckthornCoverageVal").value;
    var med = document.getElementById("medBuckthornVal").value;     

    var str = "";

    if(isEmpty(date)) {
        var error = "- Date value cannot be empty.\n"
        str += error;
    }       

    if(isEmpty(lat)) {
        var error = "- Latitude value cannot be empty.\n"
        str += error;
    }   

    if(isEmpty(lon)) {
        var error = "- Longitude value cannot be empty.\n"
        str += error;
    }      

    if(isEmpty(stems)) {
        var error = "- # Buckthorn Stems value cannot be empty.\n"
        str += error;
    }   

    if(isEmpty(density)) {
        var error = "- Buckthorn Stem Density value cannot be empty.\n"
        str += error;
    }   

    if(isEmpty(cov)) {
        var error = "- Buckthorn Foliar Coverage value cannot be empty.\n"
        str += error;
    }   

    if(isEmpty(med)) {
        var error = "- Median Buckthorn Stem value cannot be empty.\n"
        str += error;
    }     

    if(!isEmpty(str)) {
        str += "\nSubmit function deactivated until required fields are fixed";
        alert(str);
        document.getElementById("submitB").style.visibility = "hidden";
    } else {
        document.getElementById("submitB").style.visibility = "visible";        
    }
}

// Increases value c to next ascii value
function nextChar(c) {
    return String.fromCharCode(c.charCodeAt(0) + 1);
}

var speciesLetter = "B";

// adds another species field for the user to input to
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

// Checks if the val is a number or not; if not a number return false
function validateNumber(val) {
    if (isNaN(val) || val < 0) {
        return false;
    } else {
        return true;
    }
}

function validateAgainstCurrent(val) {
    var d = new Date();
    var year = val.substring(0,4);
    var month = val.substring(5,7);
    var day = val.substring(8,10);

    month -= 1;

    if(year <= d.getFullYear()) {
        if(month < d.getMonth()) {
            return true;
        }
        if(month == d.getMonth()) {
            if(day <= d.getDate()) {
                return true;
            } else {
                return false;
            }s
        } else {
            return false;
        }
    }
} 

function isEmpty(val) {
    if(val.match(/^([\s])*$/)) {
        return true;
    } else {
        return false;
    }

}

function validateDate(val) {
    if(val.match(/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/) && 
        validateAgainstCurrent(val) == true) {
        //If month is February: limit dates > 28
        if(val.charAt(6) == 2) {
            if(val.charAt(8) <= 2 && val.charAt(9) <= 8) {
                return true;
            } else {
                return false;
            }
        //If month is April, June, November, September: limit dates > 30    
        } else if((val.charAt(6) == 9) || (val.charAt(6) == 4) || (val.charAt(6) == 6) ||
                (val.charAt(6) == 11)) {
            if(val.charAt(8) == 3) {
                if(val.charAt(9) <= 0) {
                    return true; 
                } else {
                    return false;                   
                }
            }
        //Otherwise, run accordingly    
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function formatString(val) {
    var newVal = val
    for(var i = 0; i < newVal.length; i++) {
        if(newVal.charAt(i) == '"') {
            newVal = newVal.substring(0, i) + "\\" + newVal.substring(i, newVal.length);
            i++;
        }
    }
    return newVal;
}

function teamNameBlurFunc() {
    var val = document.getElementById("teamVal").value;
    document.getElementById("teamNameHidden").value = val;
    var updated = document.getElementById("teamNameHidden").value;
}

function teamIDBlurFunc() {
    var val = document.getElementsByClassName("idVal").value;
    document.getElementById("teamIDHidden").value = val;
    var updated = document.getElementById("teamIDHidden").value;
}

function dateBlurFunc() {
    var val = document.getElementById("dateVal").value;
    if(validateDate(val) === false) {
        alert('Your date is incorrect or is formatted incorrectly.');
        document.getElementById("dateVal").value = "";
        document.getElementById("dateVal").blur();

    } else {
        document.getElementById("dateHidden").value = val;
        var updated = document.getElementById("dateHidden").value;
    }
}

// Checks if latitude value is a number, if not alert and error message and delete value
function latitudeValFunc() {
    var val = document.getElementById("latitudeVal").value;
    if(validateNumber(val) === false) {
        alert('Your coordinate input is incorrect. Please enter a valid coordinate.');
        document.getElementById("latitudeVal").value = "";       
    } else {
        document.getElementById("latitudeHidden").value = val;
        var updated = document.getElementById("latitudeHidden").value;
    }
}

// Checks if longitude value is a number, if not alert and error message and delete value
function longitudeValFunc() {
    var val = document.getElementById("longitudeVal").value;
    if(validateNumber(val) === false) {
        alert('Your coordinate input is incorrect. Please enter a valid coordinate.');
        document.getElementById("longitudeVal").value = "";           
    } else {
        document.getElementById("longitudeHidden").value = val;
        var updated = document.getElementById("longitudeHidden").value;
    }

}

// Checks if Quadrant value is a number, if not alert and error message and delete value
function quadSizeValFunc() {
    var val = document.getElementById("quadSizeVal").value;
    if(validateNumber(val) === false) {
        alert('Your quandrant size value is incorrect. Value must be a number.');
        document.getElementById("quadSizeVal").value = "";
    } else {
        document.getElementById("quadrantSizeHidden").value = val;
        var updated = document.getElementById("quadrantSizeHidden").value;
    }
}

// Checks if # buckthorn stem value is a number, if not alert and error message and delete value
function buckthornStemValFunc() {
    var val = document.getElementById("buckthornStemVal").value;
    if(validateNumber(val) === false) {
        alert('Your value of buckthorn stems is incorrect. Value must be a number.');
        document.getElementById("buckthornStemVal").value = "";
    } else {
        document.getElementById("buckthornStemHidden").value = val;
        var updated = document.getElementById("buckthornStemHidden").value;
    }
}

// Checks if buckthorn density value is a number, if not alert and error message and delete value
function buckthornDensityValFunc() {
    var val = document.getElementById("buckthornDensityVal").value;
    if(validateNumber(val) === false) {
        alert('Your buckthorn density value is incorrect. Value must be a number.');
        document.getElementById("buckthornDensityVal").value = "";
    } else {
        document.getElementById("buckthornDensityHidden").value = val;
        var updated = document.getElementById("buckthornDensityHidden").value;
    }
}

// Checks if buckthorn coverage value is a number, if not alert and error message and delete value
function buckthornCoverageValFunc() {
    var val = document.getElementById("buckthornCoverageVal").value;
    if(validateNumber(val) === false || val > 100) { //Value should not be > 100%
        alert('Your buckthorn coverage value is incorrect. Value must be a number.');
        document.getElementById("buckthornCoverageVal").value = "";
    } else {
        document.getElementById("buckthornCoverageHidden").value = val;
        var updated = document.getElementById("buckthornCoverageHidden").value;
    }
}

// Checks if Median buckthorn value is a number, if not alert and error message and delete value
function medBuckthornValFunc() {
    var val = document.getElementById("medBuckthornVal").value;
    if(validateNumber(val) === false) {
        alert('Your buckthorn coverage value is incorrect. Value must be a number.');
        document.getElementById("medBuckthornVal").value = "";
    } else {
        document.getElementById("medianBuckthornHidden").value = val;
        var updated = document.getElementById("medianBuckthornHidden").value;
    }
}

function otherNotesValFunc() {
    var val = document.getElementById("otherNotesVal").value;
    val = formatString(val);   
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
    val = formatString(val);      
    document.getElementById("biodivHidden").value = val;
    var updated = document.getElementById("biodivHidden").value;  
}
