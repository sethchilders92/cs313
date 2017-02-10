<?php
/* Taken From Instructor Solution to Team Assignment Week 05*/
require "dbconnect.php";
$db = get_db();
?>
 <?php
$statement = $db->prepare("SELECT firstname, lastname, description, id FROM profile WHERE firstname='Seth'");
$statement2 = $db->prepare("SELECT username, password, id FROM person WHERE username='sethchilders92'");
$statement->execute();
// Go through each result
$row = $statement->fetch(PDO::FETCH_ASSOC);
$row2 = $statement2->fetch(PDO::FETCH_ASSOC);
//while ($row = $statement->fetch(PDO::FETCH_ASSOC))
//{
//	echo '<strong>' . $row['firstname'] . " " . $row['lastname'];
//    echo ' ' . ' </strong> - ' . $row['description'];
//    echo ':' . $row['id'];
//    echo '<br/>';
//}
//
//$statement2->execute();
//// Go through each result
//while ($row = $statement2->fetch(PDO::FETCH_ASSOC))
//{
//	echo '<strong>' . "Username and Password: " . $row['username'] . " - " . $row['password'];
//    echo '</strong>';
//    echo ' ' . $row['id'];
//    echo '<br/>';
//}   

?>      

<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php 
                echo $row['firstname'] . " " . $row['lastname'];
            ?>
            </title>
    </head>
    <body>
       
        
        <div class="container">
            <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRLYse2XyJuK0MfQWeNpTkyliPUkcLOJMMon36q-zrtEAW4T2oq" width="100%">
        <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSM7ht8eWmGu6BSM6J43Kn4s2qGzezX40KNmhS60-CMXsUMZ0MzLw" width="30%"/>
            <h2><?php 
                    echo $row['firstname'] . " " . $row['lastname'];
                ?></h2>
        <div class="description">
            <h4>Description</h4>
            <p><?php 
                    echo $row['description'];
                ?></p>
            </div>
        </div>
    </body>
</html>

