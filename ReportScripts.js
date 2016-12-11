$(document).ready(function () {
	$("#teamInput").hide();
    $("#dateInput").hide();
    $("input[name='radioB']").click(function () {
        var checkedValue = $("input[name='radioB']:checked").val();
        console.log(checkedValue);
        if (checkedValue == "teamName") {
        	$("#teamInput").show();
        	$("#dateInput").hide();
        } else if (checkedValue == "dataRange") {
        	$("#teamInput").hide();
        	$("#dateInput").show();		        	
        } else if (checkedValue == "allData"){
        	$("#teamInput").hide();
       		$("#dateInput").hide();
	    }
	    else if (checkedValue == "teams") {
	    	$("#teamInput").hide();
       		$("#dateInput").hide();
	    }
	});
});