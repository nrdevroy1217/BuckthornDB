<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8" />
<link href="http://www.mathcs.bethel.edu/~nrd83539/Style.css" rel="stylesheet">
<title>Create New Team</title>
</head>
<body>

<div id="main">
<?php
    $con = mysqli_connect("localhost","nrd83539","Elijah#1027","BuckthornDB");
    if (mysqli_connect_errno()) // Connection Error
    {
        echo "<div id=\"headerPanel\"><h1>Error</h1></div>"; // Print Error title
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else //Connection successful, disable autocommit
    {
        $con->autocommit(FALSE);
    }
    
    // Insert Into Team Table
    $_SESSION["teamName"] = $_POST["teamName"];
    $query = "insert into team(team_name) values('" . $_SESSION["teamName"] . "')";
    $result = mysqli_query($con, $query);
    
    if($con->errno) { // MySQL Error occurs - rollback and print error
        $con->rollback();
        echo "<div id=\"headerPanel\"><h1>Error</h1></div>"; // Print Error title
        echo "<br><br>Could not create the team.\nError: " . $con->error; // Print error details
    } else { // MySQL Insert successfully applied - commit and print details
        $con->commit();
        echo "<div id=\"headerPanel\"><h1>Success!</h1></div>";
        echo "<br><br>Successfully created team " . $_SESSION[teamName] . "\n";
    }
    ?>
</div>
</body>
</html>
