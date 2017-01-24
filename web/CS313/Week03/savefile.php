<?php
    session_start();
?>
<html>
    <head>
        <title>Yes</title>
        <link rel="stylesheet" type="text/css" href="Week03.css">
    </head>
<body>
    <?php 
    $file=file_get_contents("file.json");
   
    $data = json_decode($file, true);
    
    $_SESSION["sWeb"] = $_POST["web"];
    $_SESSION["sMedia"] = $_POST["media"];
    $_SESSION["sCity"] = $_POST["city"];
    $_SESSION["sYears"] = $_POST["years"];
    $_SESSION["taken"] = "done";
      
    if ($_SESSION["sWeb"] == "Front-End") {
        $data[0]++;
    } else if ($_SESSION["sWeb"] == "Back-End") {
        $data[1]++;
    } else if ($_SESSION["sWeb"] == "None") {
        $data[2]++;
    }
   
    if ($_SESSION["sMedia"] == "Photography") {
        $data[3]++;
    } else if ($_SESSION["sMedia"]  == "Graphic Design") {
        $data[4]++;
    } else if ($_SESSION["sMedia"] == "Social Media") {
        $data[5]++;
    } else if ($_SESSION["sMedia"] == "None") {
        $data[6]++;
    }
    
    if ($_SESSION["sCity"] == "Salem") {
        $data[7]++;
    } else if ($_SESSION["sCity"] == "Portland") {
        $data[8]++;
    } else if ($_SESSION["sCity"] == "Vancouver") {
        $data[9]++;
    } else if ($_SESSION["sCity"] == "Seattle") {
        $data[10]++;
    }
    
    if ($_SESSION["sYears"] == "0-2") {
        $data[11]++;
    } else if ($_SESSION["sYears"] == "3-5") {
        $data[12]++;
    } else if ($_SESSION["sYears"] == "6-10") {
        $data[13]++;
    } else if ($_SESSION["sYears"] == "+10") {
        $data[14]++;
    }
    
    $update = json_encode($data);
    
    if (file_put_contents("file.json", $update)) {
        
    } else {
        echo "<h2>Survey results are unavailable at this time. Please check back later for results.</h2>";
    }
    ?>
    <nav>
        <ul>
            <li><a href="https://www.instagram.com/sethoscope92/">Home</a></li>   
            <li><a href="../Assignments.html">Assignments</a></li>
            <li><a href="../Week02/aboutme.html">About me</a></li>
        </ul>
    </nav>
    <h2>Web Development Interest</h2>
    <h4>Front-End: 
    <?php echo $data[0] . "\n"; ?>
    </h4>
    <h4>Back-End:
    <?php echo $data[1] . "\n";?>
    </h4>
    <h4>None:
    <?php echo $data[2] . "\n";?>
    </h4>
    
    <h2>Media Interest</h2>
    <h4>Photography: 
    <?php echo $data[3] . "\n"; ?>
    </h4>
    <h4>Graphic Design:
    <?php echo $data[4] . "\n";?>
    </h4>
    <h4>Social Media:
    <?php echo $data[5] . "\n";?>
    </h4>
    <h4>None:
    <?php echo $data[6] . "\n";?>
    </h4>
    
    <h2>Closest City to You</h2>
    <h4>Salem: 
    <?php echo $data[7] . "\n"; ?>
    </h4>
    <h4>Portland:
    <?php echo $data[8] . "\n";?>
    </h4>
    <h4>Vancouver:
    <?php echo $data[9] . "\n";?>
    </h4>
    <h4>Seattle:
    <?php echo $data[10] . "\n";?>
    </h4>
    
    <h2>Years You Have Been in the Field</h2>
    <h4>0-2: 
    <?php echo $data[11] . "\n"; ?>
    </h4>
    <h4>3-5:
    <?php echo $data[12] . "\n";?>
    </h4>
    <h4>6-10:
    <?php echo $data[13] . "\n";?>
    </h4>
    <h4>+10:
    <?php echo $data[14] . "\n";?>
    </h4>
    
</body>
</html>