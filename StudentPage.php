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
			<p>Team Name: 
				<select id="teamVal" onblur="teamNameBlurFunc()" >
					<?php
						$con = mysqli_connect("localhost","nrd83539","Elijah#1027","BuckthornDB");					
						$query = "select team_name from team";
						$result = mysqli_query($con, $query);
						while($row = mysqli_fetch_array($result)) 
						{	
							echo "<option value=\"" . $row['team_name'] . "\">" . $row['team_name'] . "</option>";     	
						}	
					?>	
				</select></p>
				<p>Date (using form yyyy-mm-dd): <input type="text" id="dateVal" name="Date" value="" required="required" onblur="dateBlurFunc()" /></p>
			</div>

			<!-- Content for Quadrant and Buckthorn Info Tab -->
			<div id="BuckthornInfo" class="tabcontent">
				<form>
					<h3>Quadrant</h3>
					<p>Latitude: <input type="text" id="latitudeVal" name="Latitute" value="" required="required" onblur="latitudeValFunc()" /></p>
					<p>Longitude: <input type="text" id="longitudeVal" name="Longitude" value="" required="required" onblur="longitudeValFunc()" /></p>
					<p>Quadrant Size (in square meters): <input type="text" id="quadSizeVal" name="QuadrantSize" value="" required="required" onblur="quadSizeValFunc()" /></p>
					
					<h3>Buckthorn</h3>
					<p># Buckthorn Stems: <input type="text" id="buckthornStemVal" name="BuckthornStems" value="" onblur="buckthornStemValFunc()" /></p>
					<p>Buckthorn Stem Density: <input type="text" id="buckthornDensityVal" name="BuckthornDensity" value="" onblur="buckthornDensityValFunc()" /></p>
					<p>% Buckthorn Foliar Coverage: <input type="text" id="buckthornCoverageVal" name="BuckthornCoverage" value="" onblur="buckthornCoverageValFunc()" /></p>
					<p>Median Buckthorn Stem: <input type="text" id="medBuckthornVal" name="MedianBuckthorn" value="" onblur="medBuckthornValFunc()" /></p>
					<p>Habitat description: </br><textarea name="HabitatDesc" id="habDescVal" value="" rows="5" cols="50" onblur="habDescValFunc()" ></textarea></p>
					<p>Other Notes: </br><textarea name="OtherNotes" id="otherNotesVal"value="" rows="5" cols="50" onblur="otherNotesValFunc()"></textarea></p>
				</form>
			</div>

			<div id="BiodiversityInfo" class="tabcontent">
				<div id="species">
				<p>Species (A): <input type="text" id="speciesVal" name="SpeciesA" value="" required="required" onblur="speciesFunc()" /></p>
				</div>
				<!-- Function to add more species -->
				<button type="button" onclick="addSpecies()">Add Species</button>
				<p>Shannon-Wiener Index: <input type="text" id="swiVal" name="SWI" value="" onblur="swiFunc()" /></p>
				<p>Biodiversity Notes: </br><textarea name="BiodiversityNotes" id="biodivVal" value="" rows="5" cols="50" onblur="biodivFunc()"></textarea></p>
			</div>
			
			<div id="SubmitTab" class="tabcontent">
				<h4> **Please double check your data before submitting!**</br></br> Please click submit when you are done.</h4>
				<form id="sendData" action="ObservationTestPage.php" method="post">
				
				<!-- Submit Button -->
				<input type="submit" name="submit" value="Submit" />
				
				<!-- Hidden Fields -->
				<input type="hidden" id="teamNameHidden" name="teamNameHidden" value="0"/>
				<input type="hidden" id="dateHidden" name="dateHidden" value="0"/>
				<input type="hidden" id="latitudeHidden" name="latitudeHidden" value="0"/>
				<input type="hidden" id="longitudeHidden" name="longitudeHidden" value="0"/>
				<input type="hidden" id="quadrantSizeHidden" name="quadrantSizeHidden" value="0"/>
				<input type="hidden" id="buckthornStemHidden" name="buckthornStemHidden" value="0"/>
				<input type="hidden" id="buckthornDensityHidden" name="buckthornDensityHidden" value="0"/>
				<input type="hidden" id="buckthornCoverageHidden" name="buckthornCoverageHidden" value="0"/>
				<input type="hidden" id="medianBuckthornHidden" name="medianBuckthornHidden" value="0"/>
				<input type="hidden" id="habitatDescHidden" name="habitatDescHidden" value="0"/>
				<input type="hidden" id="otherNotesHidden" name="otherNotesHidden" value="0"/>	
				<input type="hidden" id="speciesHidden" name="speciesHidden" value="0"/>	
				<input type="hidden" id="swiHidden" name="swiHidden" value="0"/>	
				<input type="hidden" id="biodivHidden" name="biodivHidden" value="0"/>																																																												
				<?php
					if (isset($_POST["submit"])) {
					$_SESSION["TeamName"] = $_POST["teamNameHidden"];;
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
					}
				?>
				</form>
			</div>
		</div>
	</body>
</html>
