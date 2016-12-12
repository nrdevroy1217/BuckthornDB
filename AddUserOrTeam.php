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
<form id="newUser" action="NewTeamPage.php" method="post">
<p>Bethel ID Number: <input type="text" id="bethelIDVal" name="BethelID" value="" required="required" /></p>
<p>Full Name: <input type="text" id="nameVal" name="fullName" value="" required="required" /></p>
<p>Team: <input type="text" id="teamVal" name="teamName" value="" /></p>
<input type="submit" name="submit" value="Submit" />
<?php
    if (isset($_POST["submit"])) {
        $_SESSION["bethelID"] = $_POST["bethelIDVal"];
        $_SESSION["fullName"] = $_POST["nameVal"];
        $_SESSION["teamName"] = $_POST["teamVal"];
    }
    ?>
</form>
</div>

</body>
</html>
