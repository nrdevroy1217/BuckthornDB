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
    
    // Insert Into Measurement Table
    $_SESSION["bethelID"] = $_POST["bethelID"];
    $_SESSION["fullName"] = $_POST["nameVal"];
    $_SESSION["teamName"] = $_POST["teamVal"];
    
    /* Print test variables */
    /*
     echo $_SESSION["TeamName"] . "\n";
     echo $_SESSION["TeamID"] . "\n";
     echo $_SESSION["teamName"] ."\n";
     */
    
    $getTIDQuery = "select team_id from team where team_name = '" . $_SESSION["TeamName"] . "'";
    $result = mysqli_query($con, $getTIDQuery);
    $row = mysqli_fetch_array($result);
    $teamID = $row[0];
    
    $query = "insert into team_member(bethel_id, name, team_id) values(" . $_SESSION["bethelID"] . ", '" . $_SESSION["fullName"] . "', " . $teamID . ")";
    $result = mysqli_query($con, $query);
    
    
    echo "<br><br>Observation successfully applied to the database.";
    
    ?>
</div>
</body>
</html>
