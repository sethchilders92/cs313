<?php
/* Taken From Instructor Solution to Team Assignment Week 05*/
require "dbconnect.php";
$db = get_db();

if($_POST['name'] == 'Seth') {
    $id1 = 1;
} else
    $id1 = 2;

$username = $_POST['username'];
$password = $_POST['password'];

$statement = $db->prepare("SELECT firstname, lastname, description, id FROM profile WHERE id=$id1");
$statement2 = $db->prepare("if exists(SELECT username, password, id FROM person WHERE username=$username, password=$password");

username=$username");
$statement->execute();
$statement2->execute();
// Go through each result
$row = $statement->fetch(PDO::FETCH_ASSOC);
$row2 = $statement2->fetch(PDO::FETCH_ASSOC);  

?>      
<html>
    <head></head>
    <body>
        <form method="post" action="profile.php">
            <input name="name" value="Jon" type="radio"/>Jonathan's Profile
            <input name="name" value="Seth" type="radio"/>Seth's Profile
            <input type="submit"/>
        </form>
        <form method="post" action="profile.php">
            <input name="username" type="text"/>Username: 
            <input name="password" type="text"/>Password:
            <input type="submit"/>
        </form>
    </body>
</html>