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
        $con->autocommit(FALSE);
    }
    
    // Insert Into Team Table
    $_SESSION["teamName"] = $_POST["teamName"];
    
    /* Print test variables */
    echo $_SESSION["teamName"] . "\n";
    
    try {
        $query = "insert into team(team_name) values('" . $_SESSION["teamName"] . "')";
        $result = mysqli_query($con, $query);
        $con->commit();
        echo "<br><br>Successfully created team " . $_SESSION[teamName] . "\n";
    } catch (Exception $e) {
        $con->rollback();
        echo "<br><br>Failed to create team.";
    }
    
    ?>
</div>
</body>
</html>
