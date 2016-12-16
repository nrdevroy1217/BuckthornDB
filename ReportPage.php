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
					//echo "<tr><th>Team ID</th><th>Team Name</th></tr>";
					while($row = mysqli_fetch_array($result)) 
					{	
						echo "<h3>" . $row['Team ID'] . "&nbsp" . $row['Team Name'] . "</h3>";
                        $subquery = "select name as 'Name', bethel_id as 'Bethel ID' from team_member where team_id = " . $row['Team ID'];
                        $subresult = mysqli_query($con, $subquery);
                        while($subrow = mysqli_fetch_array($subresult))
                        {
                            echo "&nbsp" . $subrow['Name'] . "&nbsp" . $subrow['Bethel ID'];
                        }
					}
				}
                else if($_SESSION["radioB"] == "students")
                {
                    echo "<h3><u>List of all student researchers in the Database:</u></h3>";
                    $query = "select bethel_id as 'Bethel ID', name as 'Name' from team_member";
                    $result = mysqli_query($con, $query);
                    echo "<tr><th>Name</th><th>Bethel ID</th></tr>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Bethel ID'] . "</td></tr>\n";
                    }
                }
                else if($_SESSION["radioB"] == "measurementSummary")
                {
                    echo "<h3><u>Summary of all observations in the Database:</u></h3>";
                    $query = "select measurement_id as 'Measurement ID', date as 'Date', team_name as 'Team Name' from measurement natural join team";
                    $result = mysqli_query($con, $query);
                    echo "<tr><th>Observation ID</th><th>Date</th><th>Team Name</th></tr>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr><td>" . $row['Measurement ID'] . "</td><td>" . $row['Date'] . "</td><td>" . $row['Team Name'] . "</td></tr>\n";
                    }
                }
                else if($_SESSION["radioB"] == "measurementIDReport")
                {
                    $obsID = 54; // Test value. Not sure how to gather observation ID from previous page / JavaScript?
                    echo "<h3><u>Observation # " . $obsID . ":</u></h3>";
                    $query1 = "select team.team_name, measurement.measurement_id, measurement.date, quadrant.latitude, quadrant.longitude, quadrant.size, quadrant.habitat_desc from team natural join measurement natural join quadrant where measurement.measurement_id = " . $obsID;
                    $query2 = "select num_stems, stem_density, foliar_coverage, median_stem_circum, sw_index from buckthorn natural join biodiversity where buckthorn.measurement_id = " . $obsID;
                    $query3 = "select species_id, count from species where measurement_id = " . $obsID;
                    $query4 = "select buckthorn_id, dbh_buckthorn, dbh_buckthorn_neighbor, distance_nearest_buckthorn, distance_nearest_nonbuckthorn from competition where measurement_id = " . $obsID;
                    $result1 = mysqli_query($con, $query1);
                    $result2 = mysqli_query($con, $query2);
                    $result3 = mysqli_query($con, $query3);
                    $result4 = mysqli_query($con, $query4);
                    
                    // Print general observation details
                    echo "<table border=\"1\">";
                    echo "<tr><th>Team Name</th><th>Observation ID</th><th>Date</th><th>Latitude</th><th>Longitude</th><th>Size</th><th>Habitat Description</th></tr>";
                    while($row = mysqli_fetch_array($result1))
                    {
                        echo "<tr><td>" . $row['team_name'] . "</td><td>" . $row['measurement_id'] . "</td><td>" . $row['date'] . "</td><td>" . $row['latitude'] . "</td><td>" . $row['longitude'] . "</td><td>" . $row['size'] . "</td><td>" . $row['habitat_desc'] . "</td></tr>";
                    }
                    
                    // Print Buckthorn details
                    echo "</table><br><br><h4>Buckthorn Data</h4><table border=\"1\">";
                    echo "<tr><th>Number of Stems</th><th>Stem Density</th><th>Foliar Coverage</th><th>Median Stem Circumference</th><th>Shannon Weiner Index</th></tr>";
                    while($row = mysqli_fetch_array($result2))
                    {
                        echo "<tr><td>" . $row['num_stems'] . "</td><td>" . $row['stem_density'] . "</td><td>" . $row['foliar_coverage'] . "</td><td>" . $row['median_stem_circum'] . "</td><td>" . $row['sw_index'] . "</td></tr>";
                    }
                    
                    // Print other species information
                    echo "</table><br><br><h4>Other Species Species</h4><table border=\"1\">";
                    echo "<tr><th>Species ID</th><th>Count</th></tr>";
                    while($row = mysqli_fetch_array($result3))
                    {
                        echo "<tr><td>" . $row['species_id'] . "</td><td>" . $row['count'] . "</td></tr>\n";
                    }
                    
                    // Print competition data
                    echo "</table><br><br><h4>Competition</h4><table border=\"1\">";
                    echo "<tr><th>Buckthorn ID</th><th>DBH</th><th>DBH Nearest Buckthorn</th><th>Distance Nearest Buckthorn</th><th>Distance Nearest Non-buckthorn</th></tr>";
                    while($row = mysqli_fetch_array($result4))
                    {
                        echo "<tr><td>" . $row['buckthorn_id'] . "</td><td>" . $row['dbh_buckthorn'] . "</td><td>" . $row['dbh_buckthorn_neighbor'] . "</td><td>" . $row['distance_nearest_buckthorn'] . "</td><td>" . $row['distance_nearest_nonbuckthorn'] . "</td></tr>\n";
                    }
                    echo "</table>";
                }
			?>
		</table>
	</div>
</body>
</html>


