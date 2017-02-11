<?php
/* Taken From Instructor Solution to Team Assignment Week 05*/
require "dbconnect.php";
$db = get_db();

if($_POST['username'] == 'sethchilders92') {
    $id = 1;
} else
    $id = 2;

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM profile WHERE id=$id";

$statement = $db->prepare($sql);
//$statement2 = $db->prepare("if exists (SELECT username, password, id FROM person WHERE username=$username, password=$password) then end if");

$statement->execute();
//$statement2->execute();
// Go through each result
$row = $statement->fetch(PDO::FETCH_ASSOC);
//$row2 = $statement2->fetch(PDO::FETCH_ASSOC);  

?>      

<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php 
                echo "General Profile | " . $row['firstname'] . " " . $row['lastname'];
            ?>
            </title>
        <link type="text/css" rel="stylesheet" href="main.css"/>
    </head>
    <body> 
       
        
        <div class="container">
            <img class="background" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRLYse2XyJuK0MfQWeNpTkyliPUkcLOJMMon36q-zrtEAW4T2oq" width="100%">
        <img class="profilePic" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSM7ht8eWmGu6BSM6J43Kn4s2qGzezX40KNmhS60-CMXsUMZ0MzLw"/>
            <h1 class="name"><?php 
                    echo $row['firstname'] . " " . $row['lastname'];
                ?></h1>
        <div class="description">
            <h4>Description</h4>
            <p><?php 
                    echo $row['description'];
                ?></p>
            </div>
        </div>
    </body>
</html>

