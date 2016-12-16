$(document).ready(function () {
	$("#teamInput").hide();
    $("#dateInput").hide();
    $("#obsInput").hide();
    $("input[name='radioB']").click(function () {
        var checkedValue = $("input[name='radioB']:checked").val();
        console.log(checkedValue);
        if (checkedValue == "teamName") {
        	$("#teamInput").show();
        	$("#dateInput").hide();
            $("#obsInput").hide();
        } else if (checkedValue == "dataRange") {
        	$("#teamInput").hide();
        	$("#dateInput").show();
            $("#obsInput").hide();
        } else if (checkedValue == "allData"){
        	$("#teamInput").hide();
       		$("#dateInput").hide();
            $("#obsInput").hide();
	    }
	    else if (checkedValue == "teams") {
	    	$("#teamInput").hide();
       		$("#dateInput").hide();
            $("#obsInput").hide();
	    }
        else if (checkedValue == "students") {
            $("#teamInput").hide();
            $("#dateInput").hide();
            $("#obsInput").hide();
        }
        else if (checkedValue == "measurementSummary") {
            $("#teamInput").hide();
            $("#dateInput").hide();
            $("#obsInput").hide();
        }
        else if (checkedValue == "measurementIDReport") {
            $("#teamInput").hide();
            $("#dateInput").hide();
            $("#obsInput").show();
        }
	});
});