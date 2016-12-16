<!DOCTYPE html> 
<html>
<head>
	<meta charset ="utf-8" />
	<link href="http://www.mathcs.bethel.edu/~nrd83539/Style.css" rel="stylesheet">
<title>Delete by Measurement ID</title>
</head>
<body>
	<div id="headerPanel">
		<h1>Delete Observations Using Measurement ID</h1>
		<h4>Please Enter the Measurement ID of the Observation you would like to Delete</h4>
	</div>
	<div id="main">

        // Form to accept Measurement ID from user
		<form id="form1" action="TesterPage.php" method="post">
			<p>Enter Measurement ID</p>
			<input name="deleteMeasurementID" type="text" required="required" /> // Measurement ID to be deleted
			<input type="submit" name="d_measurementSubmit" value="Submit" />
			<?php
			  	if(isset($_POST["d_measurementSubmit"])) { 
			 		$_SESSION["deleteMeasurementID"] = $_POST["deleteMeasurementID"];
			  	} 
			?> 
		</form>

	</div>
</body>
</html>
