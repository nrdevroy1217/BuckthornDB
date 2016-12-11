<?php
	session_start();
?>

<!DOCTYPE html> 
<html>
<head>
	<meta charset ="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://www.mathcs.bethel.edu/~nrd83539/UpdateStyles.css" rel="stylesheet">
	<script type="text/javascript" src="http://www.mathcs.bethel.edu/~nrd83539/Common.js"></script>

<title>Update Tables</title>
</head>
<body>
	<div id="headerPanel">
		<h1>Update Tables</h1>
		<h4>Please Select from the Following Tables to Perform Updates</h4>
		<div id="tabbedPane">
			<ul class="tab">
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Team')">Team</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'TeamMembers')">Team Member</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Quadrant')">Quadrant</a></li>
	  		  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Species')">Species</a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Measurement')">Measurement</a></li>
	  		  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Biodiversity')">Biodiversity</a></li>  		  
			</ul>

			<!-- TEAM OPTION -->
			<div id="Team" class="tabcontent">
			  <h3>Team Update</h3>
			  <p>Enter Team Name</p>
			  <form id="form1" action="TesterPage.php" method="post">
				  <input type="text" name="teamName" required="required"/>
				  <br/>
				  <p>Enter Updated Team Name</p>
				  <input type="text"  name="updatedTeamName" required="required" />
				  <input type="submit" name="teamSubmit" value="Submit" />
				  <?php
				  	if(isset($_POST["teamSubmit"])) { 
				  		$_SESSION["teamName"] = $_POST["teamName"];
				  		$_SESSION["updatedTeamName"] = $_POST["updatedTeamName"];
				  	} 
				  ?> 
			  </form>
			</div>

			<!-- TEAM MEMBER OPTION -->
			<div id="TeamMembers" class="tabcontent">
			  <h3>Team Member Update</h3>
			  <p>Enter Bethel ID of the Name you are Changing</p>
			  <form id="form2" action="TesterPage.php" method="post">
				  <input name="bethelID" type="text" required="required" />
				  <br/>
				  <p>Enter Updated Name</p>
				  <input name="updatedName" type="text" required="required" />
				  <input type="submit" name="updateTeamMemberName" value="submit" />
				  <?php
				  	if(isset($_POST["updateTeamMemberName"])) { 
				  		$_SESSION["bethelID"] = $_POST["bethelID"];
				  		$_SESSION["updatedName"] = $_POST["updatedName"];
				  	}
				  ?>
			  </form>
			</div>

			<!-- QUADRANT OPTION -->
			<div id="Quadrant" class="tabcontent">
			  <h3>Quadrant Update</h3>
			  <p>Enter Measurement ID</p>
			  <form id="form3" action="TesterPage.php" method="post">			  
	  			  <input name="quadrantMeasurementID" type="text" required="required" />
	  			  <br /><br />
	  			  <hr>
	  			  <p>Latitude</p>
	  			  <input name="latitudeID" type="text" />
				  <p>Longitude</p>
	   			  <input name="longitudeID" type="text" />
				  <p>Size</p>
	  			  <input name="sizeID" type="text" />
				  <p>Habitat Description</p>
	   			  <textarea name="habitatDescID" rows="6" cols="50"></textarea>
                  <br>
				  <input type="submit" name="updateQuadrantValues" value="submit" />	
				  <?php
					if (isset($_POST["updateQuadrantValues"])) {
						$_SESSION["quadrantMeasurementID"] = $_POST["quadrantMeasurementID"];
						$_SESSION["latitudeID"] = $_POST["latitudeID"];
						$_SESSION["longitudeID"] = $_POST["longitudeID"];
						$_SESSION["sizeID"] = $_POST["sizeID"];
						$_SESSION["habitatDescID"] = $_POST["habitatDescID"];
					}
				?>  			  
			  </form>			  		  
			</div>

			<!-- SPECIES OPTION -->
			<div id="Species" class="tabcontent">
			  <h3>Species Update</h3>
			   <form id="form4" action="TesterPage.php" method="post">
			  	  <p>Enter Measurement ID</p>
  			  	  <input name="speciesMeasurementID" type="text" required="required" />
  			  	  <p>Enter Species ID</p>
	   			  <input name="speciesID" type="text" required="required" /> 			  
	  			  <br /><br />
	  			  <hr>
	   			  <p>Count</p>
	   			  <input name="specCount" type="text" /> 	
				  <input type="submit" name="updateSpecies" value="submit" />	
				  <?php
					if (isset($_POST["updateSpecies"])) {
						$_SESSION["speciesMeasurementID"] = $_POST["speciesMeasurementID"];
						$_SESSION["speciesID"] = $_POST["speciesID"];
						$_SESSION["specCount"] = $_POST["specCount"];
					}
				   ?> 

  			  </form>  			  	  			  
			</div>

			<!-- MEASUREMENT OPTION -->
			<div id="Measurement" class="tabcontent">
			  <h3>Measurement Update</h3>
			  <form id="form4" action="TesterPage.php" method="post">
			  	  <p>Enter Measurement ID</p>
	  			  <input name="measurementM_id" type="text" required="required" />
	  			  <p>Team ID</p>
	  			  <input name="t_id" type="text" required="required" />
	   			  <br><br>
	   			  <hr>
	   			  <p>Date Using the Format yyyy-mm-dd</p>
	  			  <input name="dateID" type="text" />   
				  <input type="submit" name="updateMeasurement" value="submit" />
				  <?php	
					if (isset($_POST["updateMeasurement"])) {
						$_SESSION["measurementM_id"] = $_POST["measurementM_id"];
						$_SESSION["dateID"] = $_POST["dateID"];
						$_SESSION["t_id"] = $_POST["t_id"];
					}
				   ?> 				  
  			  </form>		  
			</div>

			<!-- BIODIVERSITY OPTION -->
			<div id="Biodiversity" class="tabcontent">
			<form id="form5" action="TesterPage.php" method="post">
			  <h3>Biodiversity Update</h3>
			  <p>Enter Measurement ID</p>
  			  <input name="biodiversityMeasurementID" type="text" required="required" />
   			  <br><br>
   			  <hr>
  			  <p>Notes</p>	
  			  <textarea name="biodivNotesID" rows="6" cols="50"></textarea>
			  <input type="submit" name="updateBio" value="submit" />
			  <?php
			  	if (isset($_POST["updateBio"])) {
					$_SESSION["biodiversityMeasurementID"] = $_POST["biodiversityMeasurementID"];
					$_SESSION["biodivNotesID"] = $_POST["biodivNotesID"];
				}
			  ?> 
  			</form>  			  
			</div>
		</div>	
	</div>
</body>
</html> 