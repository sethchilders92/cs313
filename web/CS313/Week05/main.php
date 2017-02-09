<html>
    <head>
        <title>General Profile | Database Info</title>
    </head>
    <body>
       <?php
        try
        {
            $user = 'postgres'; 
            $password = 'put password here'; 
            $db = new PDO('pgsql:host=127.0.0.1; dbname=', $user, $password);
        }
        catch (PDOException $ex)
        {
            echo 'Error!: ' . $ex->getMessage();
            die();
        }
        foreach ($db->query('SELECT firstname, lastname, description, id FROM profile') as $row)
        {
            echo '<strong>' . $row['firstname'] . " " . $row['lastname'];
            echo ' ' . ' </strong> - ' . $row['description'];
            echo ':' . $row['id'];
            echo '<br/>';
        } 
        ?>
    </body>
</html>