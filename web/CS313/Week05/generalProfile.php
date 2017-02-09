<?php
require "dbconnect.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Scripture List</title>
</head>

<body>
<div>

<h1>Scripture Resources</h1>

<?php
$statement = $db->prepare("SELECT firstname, lastname, description, id FROM profile");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo '<strong>' . $row['firstname'] . " " . $row['lastname'];
    echo ' ' . ' </strong> - ' . $row['description'];
    echo ':' . $row['id'];
    echo '<br/>';
}
?>

</div>

</body>
</html>