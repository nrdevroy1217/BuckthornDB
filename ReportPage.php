<!DOCTYPE html> 
<html>
<head>
	<meta charset ="utf-8" />
	<link href="http://www.mathcs.bethel.edu/~nrd83539/Style.css" rel="stylesheet">
<title>Report Page</title>
</head>
<body>
	<div id="headerPanel">
		<h1>Report Results</h1>
	</div>
	<div id="main2">
		<table border="1">
			<?php
				$con = mysqli_connect("localhost","nrd83539","Elijah#1027","BuckthornDB");

				$_SESSION["radioB"] = $_POST["radioB"];
			  	$_SESSION["dateFieldStart"] = $_POST["dateFieldStart"];
			  	$_SESSION["dateFieldEnd"] = $_POST["dateFieldEnd"];	
			  	$_SESSION["teamField"] = $_POST["teamField"];			  	


				if($_SESSION["radioB"] == "allData")
				{
					echo "<h3><u>List of all Observation Entries in the Database:</u></h3>";
					$query = "select team.team_name, measurement.measurement_id, measurement.date, quadrant.size, quadrant.habitat_desc from team natural join measurement natural join quadrant";
					$result = mysqli_query($con, $query);
					echo "<tr><th>Team Name</th><th>Measurement ID</th><th>Date</th><th>Quadrant Size</th><th>Habitat Description</th></tr>";
					while($row = mysqli_fetch_array($result)) 
					{	
						echo "<tr><td>" . $row['team_name'] . "</td><td>" . $row['measurement_id'] . "</td><td>" . $row["date"] . "</td><td>" . $row["size"] . "</td><td width=\"150px\">" . $row["habitat_desc"] . "</td></tr>\n"; 	
					}
				}
				else if($_SESSION["radioB"] == "teamName")
				{
					echo "<h3><u>List of all Observation Entries in the Database:</u></h3>";
					echo "<h4>Organized by Team Name</h4>";
					$query = "select team.team_name, measurement.measurement_id, measurement.date, quadrant.size, quadrant.habitat_desc from team natural join measurement natural join quadrant where team_name = " . "\"" . $_SESSION["teamField"] . "\"";
					$result = mysqli_query($con, $query);
					echo "<tr><th>Team Name</th><th>Measurement ID</th><th>Date</th><th>Quadrant Size</th><th>Habitat Description</th></tr>";
					while($row = mysqli_fetch_array($result)) 
					{	
						echo "<tr><td>" . $row['team_name'] . "</td><td>" . $row['measurement_id'] . "</td><td>" . $row["date"] . "</td><td>" . $row["size"] . "</td><td width=\"150px\">" . $row["habitat_desc"] . "</td></tr>\n"; 	
					}	

				}
				else if($_SESSION["radioB"] == "dataRange")
				{
					echo "<h3><u>List of all Observation Entries in the Database:</u></h3>";
					echo "<h4>Organized by Date Range</h4>";
					$query = "select team.team_name, measurement.measurement_id, measurement.date, quadrant.size, quadrant.habitat_desc from team natural join measurement natural join quadrant where date between \"" . $_SESSION["dateFieldStart"] . "\" and \"" . $_SESSION["dateFieldEnd"] . "\"";
					$result = mysqli_query($con, $query);
					echo "<tr><th>Team Name</th><th>Measurement ID</th><th>Date</th><th>Quadrant Size</th><th>Habitat Description</th></tr>";
					while($row = mysqli_fetch_array($result)) 
					{	
						echo "<tr><td>" . $row['team_name'] . "</td><td>" . $row['measurement_id'] . "</td><td>" . $row["date"] . "</td><td>" . $row["size"] . "</td><td width=\"150px\">" . $row["habitat_desc"] . "</td></tr>\n"; 	
					}										
				}
				else if($_SESSION["radioB"] == "teams")
				{
					echo "<h3><u>List of all Teams in the Database:</u></h3>";
					$query = "select team_id as 'Team ID', team_name as 'Team Name' from team";
					$result = mysqli_query($con, $query);
					echo "<tr><th>Team ID</th><th>Team Name</th></tr>";
					while($row = mysqli_fetch_array($result)) 
					{	
						echo "<tr><td>" . $row['Team ID'] . "</td><td>" . $row['Team Name'] . "</td></tr>\n"; 	
					}
				}  
			?>
		</table>
	</div>
</body>
</html>

