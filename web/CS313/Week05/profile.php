<?php
/* Taken From Instructor Solution to Team Assignment Week 05*/
require "dbconnect.php";
$db = get_db();
?>
 <?php
if($_POST['name'] == 'Seth') {
    $id = 1;
} else
    $id = 2;

$statement = $db->prepare("SELECT firstname, lastname, description, id FROM profile WHERE id=$id");
$statement2 = $db->prepare("SELECT username, password, id FROM person WHERE id=$id");
$statement->execute();
// Go through each result
$row = $statement->fetch(PDO::FETCH_ASSOC);
$row2 = $statement2->fetch(PDO::FETCH_ASSOC);  

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
            <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRLYse2XyJuK0MfQWeNpTkyliPUkcLOJMMon36q-zrtEAW4T2oq" width="100%">
        <img class="profilePic" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSM7ht8eWmGu6BSM6J43Kn4s2qGzezX40KNmhS60-CMXsUMZ0MzLw" width="30%"/>
            <h1 class="name"><?php 
                    echo $row['firstname'] . " " . $row['lastname'];
                ?></h1>
        <div class="description">
            <h4>Description</h4>
            <p><?php 
                    echo $row['description'];
                    echo $_POST['name'];
                ?></p>
            <form method="post" action="">
            <input name="name" value="Jon" type="radio"/>Jonathan's Profile
            <input name="name" value="Seth" type="radio"/>Seth's Profile
            </form>
            </div>
        </div>
    </body>
</html>

