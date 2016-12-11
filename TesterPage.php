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
  			//-----------------------------------------------
  			//Update Page
  			//-----------------------------------------------
  			
  			//Team Member Submission
			$_SESSION["teamName"] = $_POST["teamName"];
			$_SESSION["updatedTeamName"] = $_POST["updatedTeamName"];
				$query = "update team set team_name = \"" . $_SESSION["updatedTeamName"] . "\"  where team_name = \"" . $_SESSION["teamName"] . "\"";
				$result = mysqli_query($con, $query);	


			//Student Submission
			$_SESSION["bethelID"] = $_POST["bethelID"];
			$_SESSION["updatedName"] = $_POST["updatedName"];
			$query = "update team_member set name = \"" . $_SESSION["updatedName"] . "\"  where bethel_id = " . $_SESSION["bethelID"];
			$result = mysqli_query($con, $query);


			//Quadrant Submission
			$_SESSION["quadrantMeasurementID"] = $_POST["quadrantMeasurementID"];
			$_SESSION["latitudeID"] = $_POST["latitudeID"];
			$_SESSION["longitudeID"] = $_POST["longitudeID"];
			$_SESSION["sizeID"] = $_POST["sizeID"];
			$_SESSION["habitatDescID"] = $_POST["habitatDescID"];
			$_SESSION["notesID"] = $_POST["notesID"];
			
			if($_SESSION["latitudeID"] != "")
			{
				$query = "update quadrant set latitude = " . $_SESSION["latitudeID"] . "  where measurement_id = " . $_SESSION["quadrantMeasurementID"];
				$result = mysqli_query($con, $query);
			}

			if($_SESSION["longitudeID"] != "")
			{
				$query = "update quadrant set longitude = " . $_SESSION["longitudeID"] . "  where measurement_id = " . $_SESSION["quadrantMeasurementID"];
				$result = mysqli_query($con, $query);
			}

			if($_SESSION["sizeID"] != "")
			{
				$query = "update quadrant set size = " . $_SESSION["sizeID"] . "  where measurement_id = " . $_SESSION["quadrantMeasurementID"];
				$result = mysqli_query($con, $query);
			}

			if($_SESSION["habitatDescID"] != "")
			{
				$query = "update quadrant set habitat_desc = \"" . $_SESSION["habitatDescID"] . "\"  where measurement_id = " . $_SESSION["quadrantMeasurementID"];
				$result = mysqli_query($con, $query);
			}

			if($_SESSION["notesID"] != "")
			{
				$query = "update quadrant set notes = \"" . $_SESSION["notesID"] . "\"  where measurement_id = " . $_SESSION["quadrantMeasurementID"];
				$result = mysqli_query($con, $query);
			}

			//Species Submission
			$_SESSION["speciesMeasurementID"] = $_POST["speciesMeasurementID"];
			$_SESSION["speciesID"] = $_POST["speciesID"];
			$_SESSION["specCount"] = $_POST["specCount"];

			$query = "update species set count = " . $_SESSION["specCount"] . " where measurement_id = " . $_SESSION["speciesMeasurementID"] . " and species_id = " . $_SESSION["speciesID"];
			$result = mysqli_query($con, $query);
		
			//Measurement Submission
			$_SESSION["measurementM_id"] = $_POST["measurementM_id"];
			$_SESSION["dateID"] = $_POST["dateID"];	
			$_SESSION["t_id"] = $_POST["t_id"];		

			$query = "update measurement set date = \"" . $_SESSION["dateID"] . "\"  where measurement_id = " . $_SESSION["measurementM_id"] . " and team_id = " . $_SESSION["t_id"];
			$result = mysqli_query($con, $query);

			//Biodiversity Submission
			$_SESSION["biodiversityMeasurementID"] = $_POST["biodiversityMeasurementID"];
			$_SESSION["biodivNotesID"] = $_POST["biodivNotesID"];
			
			$query = "update biodiversity set notes = \"" . $_SESSION["biodivNotesID"] . "\"  where measurement_id = " . $_SESSION["biodiversityMeasurementID"];
			$result = mysqli_query($con, $query);

			//-----------------------------------------------
  			//End Update Page
  			//-----------------------------------------------			

			//-----------------------------------------------
			//Delete Obs on Measurement ID
			//-----------------------------------------------

	 		$_SESSION["deleteMeasurementID"] = $_POST["deleteMeasurementID"];
	 		$query = "delete from measurement where measurement_id = " . $_SESSION["deleteMeasurementID"];
			$result = mysqli_query($con, $query);

			//-----------------------------------------------
  			//End Delete Obs on Measurement ID 
  			//-----------------------------------------------

			//-----------------------------------------------
  			//Delete Obs on Team ID or Name
  			//-----------------------------------------------

		 	$_SESSION["teamOption"] = $_POST["teamOption"];
		 	$_SESSION["deleteTeamID"] = $_POST["deleteTeamID"];

		 	if($_SESSION["teamOption"] == "TeamName")
		 	{
		 		$query = "delete from team where team_name = \"" . $_SESSION["deleteTeamID"] . "\"";
				$result = mysqli_query($con, $query);

		 	}
		 	else
		 	{
		 		$query = "delete from team where team_id = " . $_SESSION["deleteTeamID"];
				$result = mysqli_query($con, $query);
		 	}

		 	//Team Member Delete Option
		 	$_SESSION["d_TMemName"] = $_POST["d_TMemName"];
		 	$query = "delete from team_member where name = \"" . $_SESSION["d_TMemName"] . "\"";
		 	$result = mysqli_query($con, $query);

		
			//Quadrant Delete Option
			$_SESSION["quadrantOption"] = $_POST["quadrantOption"];
			$_SESSION["quadrantMeasurementID"] = $_POST["quadrantMeasurementID"];

		 	if($_SESSION["quadrantOption"] == "Size")
		 	{
		 		$query = "update quadrant set size = null where measurement_id = " . $_SESSION["quadrantMeasurementID"];
				$result = mysqli_query($con, $query);
		 	}

		 	else if($_SESSION["quadrantOption"] == "Habitat Description")
		 	{
		 		$query = "update quadrant set habitat_desc = null where measurement_id = " . $_SESSION["quadrantMeasurementID"];
				$result = mysqli_query($con, $query);
		 	}

		 	else
		 	{
		 		$query = "update quadrant set notes = null where measurement_id = " . $_SESSION["quadrantMeasurementID"];
				$result = mysqli_query($con, $query);
		 	} 		 		

		 	//Biodiversity Delete Option
			$_SESSION["d_biodiversityMeasurementID"] = $_POST["d_biodiversityMeasurementID"];	

		 	$query = "update biodiversity set notes = null where measurement_id = " . $_SESSION["d_biodiversityMeasurementID"];
			$result = mysqli_query($con, $query);				 	

			echo "<br><br>Query: <u>" . $query . " </u>applied to the database." ;

		?>


	</div>
</body>
</html>