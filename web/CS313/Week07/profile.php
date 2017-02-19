<?php
/* Parts taken From Instructor Solution to Team Assignment Week 05*/
require "dbconnect.php";
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $userInfo = 'SELECT id, username, password FROM person WHERE username= :username AND password= :password';

    $statement = $db->prepare($userInfo);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();

    //Go through each result
    $row = $statement->fetch(PDO::FETCH_ASSOC);  
    $statement->closeCursor();
    $id = $row['id'];
    
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>Database error: $error_message </p>";
    exit();
}
try {
    $sql = 'SELECT id, firstname, lastname, description, backgroundpic, profilepic FROM profile WHERE id= :id';
    $statement2 = $db->prepare($sql);
    $statement2->bindValue(':id', $id);
    $statement2->execute();
    $row2 = $statement2->fetch(PDO::FETCH_ASSOC);
    $statement2->closeCursor();
    
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>Database error: $error_message </p>";
    exit();
}

?>      

<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php 
                echo "General Profile | " . $row2['firstname'] . " " . $row2['lastname'];
            ?>
            </title>
        <link type="text/css" rel="stylesheet" href="profile.css"/>
    </head>
    <body> 
        <div class="container">
            <div class="contained">
            <?php 
            echo '<img class="background" src="' . $row2['backgroundpic'] . '" width="100%"/>'; 
            
            echo '<img class="profilePic" src="' . $row2['profilepic'] . '"/>'
            ?>

            <h1 class="name"><?php 
                    echo $row2['firstname'] . " " . $row2['lastname'];
                ?></h1>
            <div class="description">
            <h4>Description</h4>
            <p><?php  
                    echo $row2['description'];
                ?></p>
            </div>
            <form action="editProfile.html">
                <input type="submit"  value="Edit Profile"/>
            </form>
            </div>
        </div>
    </body>
</html>

