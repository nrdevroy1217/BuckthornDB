<!DOCTYPE html> 
<html>
<head>
	<meta charset ="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://www.mathcs.bethel.edu/~nrd83539/ReportScripts.js"></script>  	
	<link href="http://www.mathcs.bethel.edu/~nrd83539/Style.css" rel="stylesheet">

<title>Report Generation</title>
</head>
<body>
	<div id="headerPanel">
		<h1>Report Generation</h1>
		<h4>Please Select from the Following Report Options</h4>
	</div>
	<div id="main">
		<form id="form1" action="ReportPage.php" method="post">		
			<input type="radio" name="radioB" id="radio1" value="allData">Generate all Data</input><br>
			<input type="radio" name="radioB" id="radio2" value="teamName">Generate all Data from a Specific Team</input><br>		
			<input type="radio" name="radioB" id="radio3" value="dataRange">Generate all Data Within a Specific Date Range</input><br>	
			<input type="radio" name="radioB" id="radio4" value="teams">Generate a List of all the Teams</input><br>
            <input type="radio" name="radioB" id="radio5" value="students">Generate a List of all Student Researchers</input><br>
            <input type="radio" name="radioB" id="radio6" value="measurementSummary">Generate a summary of all observations</input><br>
            <input type="radio" name="radioB" id="radio7" value="measurementIDReport">Generate all data for an observation</input>
			<div id="wrapper">
				<div id="teamInput" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					<div class="t_inputBody">
						<p>Please Enter a Team Name</p>
						<input name="teamField" type="text" />
					</div>
				</div>
				<div id="dateInput" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="d_inputBody">
						<br>
						<p>Please Enter a Date Range in the Form yyyy-mm-dd</p>
						<p>Start:
						<input name="dateFieldStart" type="text" />
						</p>
						<p>End:
						<input name="dateFieldEnd" type="text" /><br><br>
						</p>
					</div>
				</div>
                <div id="obsInput" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="t_inputBody">
                        <p>Please Enter an Observation ID</p>
                        <input name="obsField" type="text" />
                    </div>
                </div>
			</div>
			<br>
			<input type="submit" name="reportSubmit" value="Submit" />
			<?php
			  	if(isset($_POST["reportSubmit"])) { 
			  		$_SESSION["radioB"] = $_POST["radioB"];
			  		$_SESSION["dateFieldStart"] = $_POST["dateFieldStart"];
			  		$_SESSION["dateFieldEnd"] = $_POST["dateFieldEnd"];		
			  		$_SESSION["teamField"] = $_POST["teamField"];
                    $_SESSION["obsField"] = $_POST["obsField"];
			  	} 
   		    ?> 
		</form>
	</div>
	<a href="http://www.mathcs.bethel.edu/~nrd83539/SplashPage.php">Back to Home Page</a>
</body>
</html>
