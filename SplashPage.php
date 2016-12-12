<!DOCTYPE html> 
<html>
<head>
	<meta charset ="utf-8" />
	<link href="http://www.mathcs.bethel.edu/~nrd83539/Style.css" rel="stylesheet">
<title>Administrative Access</title>
</head>
<body>
	<?php
		$con = mysqli_connect("localhost","nrd83539","Elijah#1027","BuckthornDB");
		if (mysqli_connect_errno())
  		{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
  		else
  		{
  			echo "Successful connection: " . mysqli_get_host_info($con) . PHP_EOL;
  		}
	?>
	<div id="headerPanel">
		<h1>Administrative Access</h1>
		<h4>Please Select from the Following Options:</h4>

	</div>
	<div id="main">
		<a href="http://www.mathcs.bethel.edu/~nrd83539/StudentPage.php">Add Observation</a>
		<a href="">Add New Team</a>		
		<a href="http://www.mathcs.bethel.edu/~nrd83539/UpdateSplashPage.php">Update Tables</a>
		<a href="http://www.mathcs.bethel.edu/~nrd83539/DeleteValuesSplashPage.php">Delete Values</a>
		<a href="http://www.mathcs.bethel.edu/~nrd83539/ReportGenerationPage.php">Generate Reports</a>
	</div>
</body>
</html>
