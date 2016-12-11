<!DOCTYPE html> 
<html>
<head>
	<meta charset ="utf-8" />
	<link href="http://www.mathcs.bethel.edu/~nrd83539/Style.css" rel="stylesheet">
<title>Response Page</title>
</head>
<body>
	<div id="headerPanel">
		<h1>Query Results</h1>
	</div>
	<div id="main">
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

  			// Insert Into Measurement Table
			//$_SESSION["TeamID"] = $_POST["TeamID"];
			//$_SESSION["Date"] = $_POST["Date"];
			$_SESSION["TeamName"] = $_POST["link1"];
			echo $_SESSION["TeamName"];
			//echo $_SESSION["Date"];
			/*$query = "insert into measurement(date, team_id) values(" . $_SESSION["Date"] . "," . $_SESSION["TeamID"] . ")";
			echo $query;
			$result = mysqli_query($con, $query);

			// Grabbing measurement_id
			$query = "select max(measurement_id) from measurement;";
			$measurementValue = mysqli_query($con, $query);

			// Insert Into Quadrant Table
			$_SESSION["Latitude"] = $_POST["Latitude"];
			$_SESSION["Longitude"] = $_POST["Longitude"];
			$_SESSION["QuadrantSize"] = $_POST["QuadrantSize"];
			$_SESSION["HabitatDesc"] = $_POST["HabitatDesc"];
			$_SESSION["OtherNotes"] = $_POST["OtherNotes"];

			$query = "insert into quadrant(measurement_id, latitude, longitude, size, habitat_desc, notes) 
						values(" . $measurementValue . "," . 
						$_SESSION["Latitude"] . "," . 
						$_SESSION["Longitude"] . "," .
						$_SESSION["QuadrantSize"] . "," . 
						$_SESSION["HabitatDesc"] . "," . 
						$_SESSION["OtherNotes"];
			$result = mysqli_query($con, $query);

			// Insert Into Buckthorn Table
			$_SESSION["BuckthornStems"] = $_POST["BuckthornStems"];
			$_SESSION["BuckthornDensity"] = $_POST["BuckthornDensity"];
			$_SESSION["BuckthornCoverage"] = $_POST["BuckthornCoverage"];
			$_SESSION["MedianBuckthorn"] = $_POST["MedianBuckthorn"];
			$_SESSION["OtherNotes"] = $_POST["OtherNotes"];

			$query = "insert into buckthorn(measurement_id, num_stems, stem_density, 
						foliar_coverage, median_stem_circum, photos, notes) 
						values(" . $measurementValue . "," . 
						$_SESSION["BuckthornStems"] . "," . 
						$_SESSION["BuckthornDensity"] . "," . 
						$_SESSION["BuckthornCoverage"] . "," . 
						$_SESSION["MedianBuckthorn"] . "," . 
						NULL . "," . 
						$_SESSION["OtherNotes"] . ")";
			$result = mysqli_query($con, $query);

			// Insert Into Biodiversity Table
			$_SESSION["SWI"] = $_POST["SWI"];
			$_SESSION["BiodiversityNotes"] = $_POST["BiodiversityNotes"];

			$query = "insert into biodiversity(measurement_id, sw_index, notes) 
						values(" . $measurementValue . "," 
						$_SESSION["SWI"] = $_POST["SWI"] . "," .
						$_SESSION["BiodiversityNotes"] . ")";
			$result = mysqli_query($con, $query);

			// Insert Into Species Table
			$_SESSION["SpeciesA"] = $_POST["SpeciesA"];

			$query = "insert into species(measurement_id, species_id, count) 
						values(" . $measurementValue . "," .
						"A" . "," .
						$_SESSION["SpeciesA"] . ")";

			$result = mysqli_query($con, $query);

			
			echo "<br><br>Query: <u>" . $query . " </u>applied to the database."; */

		?>
	</div>
</body>
</html>