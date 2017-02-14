<?php
/* Parts taken From Instructor Solution to Team Assignment Week 05*/
require "dbconnect.php";
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$profilepic = $_POST['profilepic'];
$backgroundpic = $_POST['backgroundpic'];
$description = $_POST['description'];

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

if ($firstname != '') {
    echo "Firstname should be updated to $firstname";
    try {
        $firstnameSQL = 'UPDATE profile SET firstname= :firstname WHERE id= :id';

        $statement2 = $db->prepare($firstnameSQL);
        $statement2->bindValue(':id', $id);
        $statement2->bindValue(':firstname', $firstname);
        $statement2->execute();
        $row2 = $statement2->fetch(PDO::FETCH_ASSOC);
        $statement2->closeCursor();
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Database error: $error_message </p>";
        exit();
    }
}

if ($lastname != '') {
    echo "Lastname should be updated";
    try {
        $lastnameSQL = 'UPDATE profile SET lastname= :lastname WHERE id= :id';

        $statement3 = $db->prepare($lastnameSQL);
        $statement3->bindValue(':id', $id);
        $statement3->bindValue(':lastname', $lastname);
        $statement3->execute();
        $row3 = $statement3->fetch(PDO::FETCH_ASSOC);
        $statement3->closeCursor();
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Database error: $error_message </p>";
        exit();
    }
}

if ($description != '') {
    echo "Description should be updated";
    try {
        $descriptionSQL = 'UPDATE profile SET lastname= :lastname WHERE id= :id';

        $statement4 = $db->prepare($descriptionSQL);
        $statement4->bindValue(':id', $id);
        $statement4->bindValue(':description', $description);
        $statement4->execute();
        $row4 = $statement4->fetch(PDO::FETCH_ASSOC);
        $statement4->closeCursor();
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Database error: $error_message </p>";
        exit();
    }
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
        <link type="text/css" rel="stylesheet" href="main.css"/>
    </head>
    <body> 
        <h1>Profile Updated Successfully</h1>
        <form action="form.html">
            Click here to go to login page <input type="submit"/>
        </form>
    </body>
</html>

