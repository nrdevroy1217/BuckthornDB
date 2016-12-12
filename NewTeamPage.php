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
    
    // Insert Into Team Table
    $_SESSION["teamName"] = $_POST["teamName"];
    
    /* Print test variables */
    echo $_SESSION["teamName"] . "\n";
    
    $query = "insert into team(team_name) values('" . $_SESSION["teamName"] . "')";
    $result = mysqli_query($con, $query);
    
    echo $query;
    
    echo "<br><br>Observation successfully applied to the database.";
    
    ?>
</div>
</body>
</html>
