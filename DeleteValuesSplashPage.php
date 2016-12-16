<!DOCTYPE html> 
<html>
<head>
	<meta charset ="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://www.mathcs.bethel.edu/~nrd83539/UpdateStyles.css" rel="stylesheet">
	<script type="text/javascript" src="http://www.mathcs.bethel.edu/~nrd83539/Common.js"></script>

<title>Delete Values</title>
</head>
<body>
	<div id="headerPanel">
		<h1>Delete Values</h1>
		<h4>Please Select from the Following Tables to Perform Deletes on Specific Attributes.</h4>
		<div id="tabbedPane">
			<ul class="tab">
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Team')">Team</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'TeamMembers')">Team Member</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Quadrant')">Quadrant</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Measurement')">Measurement</a></li>
	  		  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Biodiversity')">Biodiversity</a></li>  		  
			</ul>

			<!-- TEAM OPTION -->
            // Allows user to delete a team
			<div id="Team" class="tabcontent">
				<form id="form1" action="TesterPage.php" method="post">
					<h3>Team Delete</h3>
					<select name ="teamOption">
			  		  <option value="TeamID">Team ID</option> // If selected, allows user to delete by team ID
			  		  <option value="TeamName">Team Name</option> // If selected, allows user to delete by team name
			  		</select>
			  		<br><br>
			  		<input name="deleteTeamID" type="text" required="required" /> // 
					<input type="submit" name="d_teamSubmit" value="Submit" />
					<?php
					  	if(isset($_POST["d_teamSubmit"])) { 
					 		$_SESSION["teamOption"] = $_POST["teamOption"];
					 		$_SESSION["deleteTeamID"] = $_POST["deleteTeamID"];
					  	} 
					?> 	
			  	</form>	
			  </form>
			</div>

			<!-- TEAM MEMBER OPTION -->
			<div id="TeamMembers" class="tabcontent">
				<form id="form1" action="TesterPage.php" method="post">
					<h3>Team Member Delete</h3>
					<p>Enter the Name of the Team Member you are Deleting</p>
			  		<input name="d_TMemName" type="text" required="required" />
					<input type="submit" name="d_teamSubmit" value="Submit" />
					<?php
					  	if(isset($_POST["d_teamSubmit"])) { 
					 		$_SESSION["d_TMemName"] = $_POST["d_TMemName"];
					  	} 
					?> 	
			  	</form>	
			</div>

			<!-- QUADRANT OPTION -->
			<div id="Quadrant" class="tabcontent">
			<form id="form1" action="TesterPage.php" method="post">
				  <h3>Quadrant Delete</h3>
				  <p>Enter Measurement ID</p>
	  			  <input name="quadrantMeasurementID" type="text" required="required" />
	  			  <br /><br />
	  			  <hr>
	  			  <p>Delete Values:</p>
	  			  <select name="quadrantOption">
	  			  	<option value="Size">Size</option>
	  			  	<option value="Habitat Description">Habitat Description</option>
	  			  	<option value="Notes">Notes</option>
	  			  </select>
					<input type="submit" name="d_Quad_DeleteSubmit" value="Submit" />
				  <?php
				  	if(isset($_POST["d_Quad_DeleteSubmit"])) { 
				 		$_SESSION["quadrantOption"] = $_POST["quadrantOption"];
				 		$_SESSION["quadrantMeasurementID"] = $_POST["quadrantMeasurementID"];
				  	} 
				  ?> 		
			</form>			  		  
			</div>

			<!-- MEASUREMENT OPTION -->
			<div id="Measurement" class="tabcontent">
				<form id="form1" action="TesterPage.php" method="post">
					<h3>Measurement Delete</h3>
					<p>*Warning: Deleting a measurement will cause all observation data under the measurement ID to delete as well</p>
					<p>Enter Measurement ID</p>
					<input name="deleteMeasurementID" type="text" required="required" />
					<input type="submit" name="d_measurementSubmit" value="Submit" />
					<?php
					  	if(isset($_POST["d_measurementSubmit"])) { 
					 		$_SESSION["deleteMeasurementID"] = $_POST["deleteMeasurementID"];
					  	} 
					?> 
				</form>		  
			</div>

			<!-- BIODIVERSITY OPTION -->
			<div id="Biodiversity" class="tabcontent">
				<form id="form1" action="TesterPage.php" method="post">
				  <h3>Biodiversity Delete</h3>
				  <p>Enter Measurement ID</p>
	  			  <input name="d_biodiversityMeasurementID" type="text" />
	   			  <br><br>
	   			  <hr>
	   			  <p>Click submit to delete biodiversity notes</p>
				  <input type="submit" name="d_bioDSubmit" value="Submit" />
				  <?php
					  	if(isset($_POST["d_bioDSubmit"])) { 
					 		$_SESSION["d_biodiversityMeasurementID"] = $_POST["d_biodiversityMeasurementID"];					 		
					  	} 
				  ?> 		  
	  			</form>  			  
			</div>
		</div>	
	</div>
	</div>
	<div id="route">
	<a href="http://www.mathcs.bethel.edu/~nrd83539/SplashPage.php">Back to Home Page</a>
	</div>
</body>
</html>