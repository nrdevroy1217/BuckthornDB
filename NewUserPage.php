<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8" />
<link href="http://www.mathcs.bethel.edu/~nrd83539/Style.css" rel="stylesheet">
<title>Create New User</title>
</head>
<body>

<div id="main">
<?php
    $con = mysqli_connect("localhost","nrd83539","Elijah#1027","BuckthornDB");
    if (mysqli_connect_errno()) // Connection error
    {
        echo "<div id=\"headerPanel\"><h1>Error</h1></div>"; // Print Error title
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else // Connection successfull, disable autocommit
    {
        $con->autocommit(FALSE);
    }
    
    // Insert Into Measurement Table
    $_SESSION["bethelID"] = $_POST["bethelID"];
    $_SESSION["fullName"] = $_POST["fullName"];
    $_SESSION["teamName"] = $_POST["teamName"];
    
    // Retrieve team_id from team_name
    $getTIDQuery = "select team_id from team where team_name = '" . $_SESSION["teamName"] . "'";
    $result = mysqli_query($con, $getTIDQuery);
    $row = mysqli_fetch_array($result);
    $teamID = $row[0];
    
    // Insert into team_member with new user's bethel_id, name, and team_id retrieved previously
    $query = "insert into team_member(bethel_id, name, team_id) values(" . $_SESSION["bethelID"] . ", '" . $_SESSION["fullName"] . "', " . $teamID . ")";
    $result = mysqli_query($con, $query);
    
    if($con->errno){ // MySQL Error occurs - rollback and print error
        $con->rollback();
        echo "<div id=\"headerPanel\"><h1>Error</h1></div>"; // Print Error title
        echo "<br><br>Failed to create user.\nError: " . $con->error; // Print error details
    } else { // MySQL Insert successfully applied - commit and print details
        $con->commit();
        echo "<div id=\"headerPanel\"><h1>Success!</h1></div>";
        echo "<br><br>Successfully created user with name " . $_SESSION["fullName"] . ".";
    }
    
    
    ?>
</div>
</body>
</html>
