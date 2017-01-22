<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            The Results
        </title>
    </head>
    <body>
        <?php  
        // Set session variables
        $_SESSION["sWeb"] = $_POST["web"];
        $_SESSION["sMedia"] = $_POST["media"];
        $_SESSION["sCity"] = $_POST["city"];
        $_SESSION["sYears"] = $_POST["years"];
        echo "Session Variables Set";
        echo $_SESSION["sWeb"];
        echo $_SESSION["sMedia"];
        ?>
        
        <h1>Survey | Portland Metro Area</h1>
        <hr/>
        
        <p>Name: <?php echo $_SESSION["sName"]; ?></p>
        <p>Email: <?php echo $_SESSION["sEmail"]; ?></p>
        <p>Photography Interests: <?php echo $_SESSION["sInterest"]; ?>
        </p>
        <p>Closest City: <?php echo $_SESSION["sCity"]; ?></p>
        <p>Comments: <?php echo $_SESSION["sComments"]; ?></p>
    </body>
</html>