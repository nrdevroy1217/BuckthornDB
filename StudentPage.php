<!DOCTYPE html> 
<html>
	<head>
		<link href="http://www.mathcs.bethel.edu/~nrd83539/student.css" rel="stylesheet">
		<script type="text/javascript" src="http://www.mathcs.bethel.edu/~nrd83539/studentScript.js"></script>		
			<title>Student Access</title>
		</head>
		<body>
			<div id="headerPanel">
				<h1>Buckthorn Observation</h1> <!-- how to autoincrement -->
			</div>
			
			<div id="tabbedPane">
				<ul class="tab">
					<li>
						<a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'TeamInfo')">Team Info</a>
					</li>
					<li>
						<a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'BuckthornInfo')">Buckthorn Info</a>
					</li>
					<li>
						<a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'BiodiversityInfo')">Biodiversity Info</a>
					</li>
					<li>
						<a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'SubmitTab')">Submit</a>
					</li>
					
				</ul>
				<!-- Content for Team Info Tab -->			
				<div id="TeamInfo" class="tabcontent">						
					<p>Team Name: <input type="text" id="teamVal" name="TeamName" value="" required="required" onblur="blurFunc()" /></p>
					<p>Team ID: <input type="text" name="TeamID" value="" required="required" /></p>
					<p>Date (yyyy/mm/dd): <input type="text" name="Date" value="" required="required" /></p>
				</div>

				<!-- Content for Quadrant and Buckthorn Info Tab -->
				<div id="BuckthornInfo" class="tabcontent">
					<h3>Quadrant</h3>
					<p>Latitude: <input type="text" name="Latitute" value="" required="required"></p>
					<p>Longitude: <input type="text" name="Longitude" value="" required="required"></p>
					<p>Quadrant Size: <input type="text" name="QuadrantSize" value="" required="required"></p>
					
					<h3>Buckthorn</h3>
					<p># Buckthron Stems: <input type="text" name="BuckthornStems" value=""></p>
					<p>Buckthorn Stem Density: <input type="text" name="BuckthornDensity" value=""></p>
					<p>% Buckthorn Foliar Coverage: <input type="text" name="BuckthornCoverage" value=""></p>
					<p>Median Buckthorn Stem: <input type="text" name="MedianBuckthorn" value=""></p>
					<p>Habitat description: </br><textarea name="HabitatDesc" value="" rows="5" cols="50"></textarea></p>
					<p>Other Notes: </br><textarea name="OtherNotes" value="" rows="5" cols="50"></textarea></p>
				</div>

				<div id="BiodiversityInfo" class="tabcontent">
					<div id="species">
					<p>Species (A): <input type="text" name="SpeciesA" value="" required="required"></p>
					</div>
					<!-- Function to add more species -->
					<button type="button" onclick="addSpecies()">Add Species</button>
					<p>Shannon-Wiener Index: <input type="text" name="SWI" value=""></p>
					<p>Biodiversity Notes: </br><textarea name="BiodiversityNotes" value="" rows="5" cols="50"></textarea></p>
				</div>
				
				<div id="SubmitTab" class="tabcontent">
					<h4> **Please double check your data before submitting!**</br></br> Please click submit when you are done.</h4>
					<form id="sendData" action="ObservationTestPage.php" method="post">
					<input type="submit" name="submit" value="Submit" />
					<input type="hidden" id="link1" name="link1" value="0"/>
					<?php
						if (isset($_POST["submit"])) {
						$_SESSION["TeamName"] = $_POST["link1"];
						//$_SESSION["TeamID"] = $teamID;
						//$_SESSION["Date"] = $date;
						//$_SESSION["Latitute"] = $_POST["Latitute"];
						//$_SESSION["Longitude"] = $_POST["Longitude"];
						//$_SESSION["QuadrantSize"] = $_POST["QuadrantSize"];
						//$_SESSION["BuckthornStems"] = $_POST["BuckthornStems"];
						//$_SESSION["BuckthornDensity"] = $_POST["BuckthornDensity"];
						//$_SESSION["BuckthornCoverage"] = $_POST["BuckthornCoverage"];
						//$_SESSION["MedianBuckthorn"] = $_POST["MedianBuckthorn"];
						//$_SESSION["HabitatDesc"] = $_POST["HabitatDesc"];
						//$_SESSION["OtherNotes"] = $_POST["OtherNotes"];
						//$_SESSION["SpeciesA"] = $_POST["SpeciesA"];
						//$_SESSION["SWI"] = $_POST["SWI"];
						//$_SESSION["BiodiversityNotes"] = $_POST["BiodiversityNotes"];
						}
					?>
					</form>
				</div>
	
				
			</div>
		</body>
	</html>