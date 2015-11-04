<!DOCTYPE html>
<html>
    <head>
        <title>Einsicht</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/includeCustom.php");
        ?>
        <div id="subbody">
            <h1>Kommentare</h1>
            <?php include("database_connect.php"); 

                $sql = <<<SQL
                SELECT *
                FROM kommentar 
SQL;

                if(!$result = $database->query($sql)){
                    die('Fehler [' . $database->error . ']');
                }

                else{
                    while($row = $result->fetch_assoc()){
                        echo "<div id='boldEinsicht'>";
                        echo "KommentarID: ";
                        echo $row['KommentarID'];
                        echo "<br>";
                        echo $row['Datum'] . ' ';
                        echo "<h6>" . '"' . $row['Kommentar'] . '"' . "</h6>";
                        $userID = $row['UserID'];

                        $sql1 = <<<SQL
                        SELECT Username
                        FROM user
                        where UserID = '$userID'
SQL;
                        echo 'Submitted by '; 
                        echo $row['Username'] . ' ';
                        echo '<br>' . '<br>';
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </body>
</html>