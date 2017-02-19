<?php
/* Parts taken From Instructor Solution to "Team Assignment Week 05" */
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

if ($profilepic != '') {
    try {
        $profilepicSQL = 'UPDATE profile SET profilepic= :profilepic WHERE id= :id';

        $statement4 = $db->prepare($profilepicSQL);
        $statement4->bindValue(':id', $id);
        $statement4->bindValue(':profilepic', $profilepic);
        $statement4->execute();
        $row4 = $statement4->fetch(PDO::FETCH_ASSOC);
        $statement4->closeCursor();
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Database error: $error_message </p>";
        exit();
    }
}

if ($backgroundpic != '') {
    try {
        $backgroundpicSQL = 'UPDATE profile SET backgroundpic= :backgroundpic WHERE id= :id';

        $statement5 = $db->prepare($backgroundpicSQL);
        $statement5->bindValue(':id', $id);
        $statement5->bindValue(':backgroundpic', $backgroundpic);
        $statement5->execute();
        $row5 = $statement5->fetch(PDO::FETCH_ASSOC);
        $statement5->closeCursor();
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Database error: $error_message </p>";
        exit();
    }
}

if ($description != '') {
    try {
        $descriptionSQL = 'UPDATE profile SET description= :description WHERE id= :id';

        $statement6 = $db->prepare($descriptionSQL);
        $statement6->bindValue(':id', $id);
        $statement6->bindValue(':description', $description);
        $statement6->execute();
        $row6 = $statement6->fetch(PDO::FETCH_ASSOC);
        $statement6->closeCursor();
    
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

