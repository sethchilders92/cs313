<?php
/* Taken From Instructor Solution to Team Assignment Week 05*/
require "dbconnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>General Profile | Database Info</title>
</head>
<body>
<div>

<h1>General Profile | Database Info</h1>

<?php
$statement = $db->prepare("SELECT firstname, lastname, description, id FROM profile");
$statement2 = $db->prepare("SELECT firstname, lastname, description, id FROM profile");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo '<strong>' . $row['firstname'] . " " . $row['lastname'];
    echo ' ' . ' </strong> - ' . $row['description'];
    echo ':' . $row['id'];
    echo '<br/>';
}

$statement2->execute();
// Go through each result
while ($row = $statement2->fetch(PDO::FETCH_ASSOC))
{
	echo '<strong>' . "Username and Password: " . $row['username'] . " - " . $row['password'];
    echo '</strong>';
    echo ' ' . $row['id'];
    echo '<br/>';
}   

?>

</div>

</body>
</html>