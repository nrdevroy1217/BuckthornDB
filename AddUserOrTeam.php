<!DOCTYPE html>
<html>
<head>
<link href="http://www.mathcs.bethel.edu/~nrd83539/Common.css" rel="stylesheet">
<script type="text/javascript" src="http://www.mathcs.bethel.edu/~nrd83539/studentScript.js"></script>
<title>Student Access</title>
</head>
<body>
<div id="headerPanel">
<h1>Update User Access</h1> <!-- how to autoincrement -->
</div>

<div id="addUserPanel">
<h2>Add New user</h2>

// Form to add new user
<form id="newUser" action="NewUserPage.php" method="post">
<p>Bethel ID Number: <input type="text" name="bethelID" value="" required="required" /></p> // Bethel ID for new user
<p>Full Name: <input type="text" name="fullName" value="" required="required" /></p> // Name for new user
<p>Team: <input type="text" name="teamName" value="" /></p> //Team, if any, for the new user. can be left blank
<input type="submit" name="submit" value="Submit" />
<?php
    if (isset($_POST["submit"])) {
        $_SESSION["bethelID"] = $_POST["bethelID"];
        $_SESSION["fullName"] = $_POST["fullName"];
        $_SESSION["teamName"] = $_POST["teamName"];
    }
    ?>
</form>
</div>

// Form to add new team
<div id="addTeamPanel">
<h2>Add New Team</h2>
<form id="newTeam" action="NewTeamPage.php" method = "post">
<p>Team Name: <input type="text" name="teamName" value="" /></p> // Name for new team
<input type="submit" name="submit" value="Submit" />
<?php
    if (isset($_POST["submit"])) {
        $_SESSION["teamName"] = $_POST["teamName"];
    }
    ?>
</form>
</div>

</body>
</html>
