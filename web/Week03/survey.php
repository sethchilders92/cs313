<?php
session_start();
    
if ($_SESSION["taken"] == "done") {
    $results = "/CS313/Ponder/savefile.php";
    header('Location: '. $results);
}
?>
<!doctype html>
<html>
    <head>
        <title>Web Development Survey</title>
        <link rel="stylesheet" type="text/css" href="Week03.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="https://www.instagram.com/sethoscope92/">Home</a></li>   
                <li><a href="Assignments.html">Assignments</a></li>
                <li><a href="#">About me</a></li>
            </ul>
        </nav>
        <h1>Survey | Portland Metro Area</h1><hr/>
        <h2>Please Enter the Following</h2>
        
        <form id="theForm" action="savefile.php" method="post">
            <h2>Web Development Interest</h2>
            <input type="radio" name="web" value="Front-End" required>Front-End<br/>
            <input type="radio" name="web" value="Back-End">Back-End<br/>
            <input type="radio" name="web" value="None">None<br/>
            
            <h2>Media Interest</h2>
            <input type="radio" name="media" value="Photography" required>Photography<br/>
            <input type="radio" name="media" value="Graphic Design">Graphic Design<br/>
            <input type="radio" name="media" value="Social Media">Social Media<br/>
            <input type="radio" name="media" value="None">None<br/><br/>
            
            <h2>Closest City to You</h2>
            <input type="radio" name="city" value="Salem"required>Salem<br/>
            <input type="radio" name="city" value="Portland">Portland<br/>
            <input type="radio" name="city" value="Vancouver">Vancouver<br/>
            <input type="radio" name="city" value="Seattle">Seattle<br/>
            
            <h2>Years You Have Been in the Field</h2>
            <input type="radio" name="years" value="0-2" required>0-2<br/>
            <input type="radio" name="years" value="3-5">3-5<br/>
            <input type="radio" name="years" value="6-10">6-10<br/>
            <input type="radio" name="years" value="+10">+10<br/><br/>
                       
            <a href="savefile.php">Results</a><br/>
            <button type="submit" value="submit">Submit</button>
        </form>
    </body>
</html>