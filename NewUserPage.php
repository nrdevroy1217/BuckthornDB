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
    
    // Insert Into Measurement Table
    $_SESSION["bethelID"] = $_POST["bethelID"];
    $_SESSION["fullName"] = $_POST["fullName"];
    $_SESSION["teamName"] = $_POST["teamName"];
    
    /* Print test variables */
    //echo $_SESSION["bethelID"] . "\n";
    //echo $_SESSION["fullName"] . "\n";
    //echo $_SESSION["teamName"] ."\n";
    
    $getTIDQuery = "select team_id from team where team_name = '" . $_SESSION["teamName"] . "'";
    $result = mysqli_query($con, $getTIDQuery);
    $row = mysqli_fetch_array($result);
    $teamID = $row[0];
    
    $query = "insert into team_member(bethel_id, name, team_id) values(" . $_SESSION["bethelID"] . ", '" . $_SESSION["fullName"] . "', " . $teamID . ")";
    $result = mysqli_query($con, $query);
    
    if($con->errno){
        $con->rollback();
        echo "<br><br>Failed to create user.\nError: " . $con->error;
    } else {
        $con->commit();
        echo "<br><br>Successfully created user with name " . $_SESSION["fullName"] . ".";
    }
    
    
    ?>
</div>
</body>
</html>
