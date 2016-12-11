<!DOCTYPE html> 
<html>
<head>
	<meta charset ="utf-8" />
	<link href="http://www.mathcs.bethel.edu/~nrd83539/Style.css" rel="stylesheet">
<title>Delete by Team</title>
</head>
<body>
	<div id="headerPanel">
		<h1>Delete by Team</h1>
		<h4>Please Enter the Team ID or Team Name of the Observation you would like to Delete</h4>
	</div>
	<div id="main">
	<form id="form1" action="TesterPage.php" method="post">
		<br>
		<select name ="teamOption">
  		  <option value="TeamID">Team ID</option>
  		  <option value="TeamName">Team Name</option>
  		</select>
  		<br><br>
  		<input name="deleteTeamID" type="text" required="required" />
		<input type="submit" name="d_teamSubmit" value="Submit" />
		<?php
		  	if(isset($_POST["d_teamSubmit"])) { 
		 		$_SESSION["teamOption"] = $_POST["teamOption"];
		 		$_SESSION["deleteTeamID"] = $_POST["deleteTeamID"];
		  	} 
		?> 	
  	</form>	
	</div>
</body>
</html>

