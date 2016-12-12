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
			$_SESSION["TeamName"] = $_POST["teamNameHidden"];
			$_SESSION["TeamID"] = $_POST["teamIDHidden"];
			$_SESSION["Date"] = $_POST["dateHidden"];
			$_SESSION["Latitute"] = $_POST["latitudeHidden"];
			$_SESSION["Longitude"] = $_POST["longitudeHidden"];
			$_SESSION["QuadrantSize"] = $_POST["quadrantSizeHidden"];
			$_SESSION["BuckthornStems"] = $_POST["buckthornStemHidden"];
			$_SESSION["BuckthornDensity"] = $_POST["buckthornDensityHidden"];
			$_SESSION["BuckthornCoverage"] = $_POST["buckthornCoverageHidden"];
			$_SESSION["MedianBuckthorn"] = $_POST["medianBuckthornHidden"];
			$_SESSION["HabitatDesc"] = $_POST["habitatDescHidden"];
			$_SESSION["OtherNotes"] = $_POST["otherNotesHidden"];
			$_SESSION["SpeciesA"] = $_POST["speciesHidden"];
			$_SESSION["SWI"] = $_POST["swiHidden"];
			$_SESSION["BiodiversityNotes"] = $_POST["biodivHidden"];		
			
			/* Print test variables */
			/*
			echo $_SESSION["TeamName"] . "\n";
			echo $_SESSION["TeamID"] . "\n";
			echo $_SESSION["Date"] . "\n";
			echo $_SESSION["Latitute"] . "\n";
			echo $_SESSION["Longitude"] . "\n";
			echo $_SESSION["QuadrantSize"] . "\n";
			echo $_SESSION["BuckthornStems"] . "\n";
			echo $_SESSION["BuckthornDensity"] . "\n";
			echo $_SESSION["BuckthornCoverage"] . "\n";
			echo $_SESSION["MedianBuckthorn"] . "\n";
			echo $_SESSION["HabitatDesc"] . "\n";
			echo $_SESSION["OtherNotes"] . "\n";
			echo $_SESSION["SpeciesA"] . "\n";
			echo $_SESSION["SWI"] . "\n";
			echo $_SESSION["BiodiversityNotes"] . "\n";									
		*/

			$query = "insert into measurement(date, team_id) values(" . "\"" . $_SESSION["Date"] . "\"" . ", " . $_SESSION["TeamID"] . ")";
			$result = mysqli_query($con, $query);

			// Grabbing measurement_id
			$query = "select max(measurement_id) as 'ID' from measurement";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			$measurementID = $row[0];

			// Insert Into Quadrant Table
			$query = "insert into quadrant(measurement_id, latitude, longitude, size, habitat_desc) 
						values(" . $measurementID . "," . 
						$_SESSION["Latitute"] . "," . 
						$_SESSION["Longitude"] . "," .
						$_SESSION["QuadrantSize"] . "," . 
						"\"" . $_SESSION["HabitatDesc"] . "\");";
			$result = mysqli_query($con, $query);


			// Insert Into Buckthorn Table
			$query = "insert into buckthorn(measurement_id, num_stems, stem_density, 
						foliar_coverage, median_stem_circum, photos, notes) 
						values(" . $measurementID . "," . 
						$_SESSION["BuckthornStems"] . "," . 
						$_SESSION["BuckthornDensity"] . "," . 
						$_SESSION["BuckthornCoverage"] . "," . 
						$_SESSION["MedianBuckthorn"] . "," . 
						"\"null\"" . "," . 
						"\"" . $_SESSION["OtherNotes"] . "\")";
			$result = mysqli_query($con, $query);

			// Insert Into Biodiversity Table
			$query = "insert into biodiversity(measurement_id, sw_index, notes) 
				values(" . $measurementID . "," . $_SESSION["SWI"] . "," . "\"" . 
				$_SESSION["BiodiversityNotes"] . "\")";
			$result = mysqli_query($con, $query);

			// Insert Into Species Table
			$query = "insert into species(measurement_id, species_id, count) 
						values(" . $measurementID . "," .
						"'A'" . "," . 
						$_SESSION["SpeciesA"] . ")";

			$result = mysqli_query($con, $query);

			echo "<br><br>Observation: <u>" . $query . " </u>applied to the database."; 

		?>
	</div>
</body>
</html>
