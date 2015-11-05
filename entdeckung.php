                                <!DOCTYPE html>
<html>
    <head>
        <title>Entdeckung</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/includeCustom.php");
            $sql = <<<SQL
                SELECT *
                FROM infos WHERE Titel = "Entdeckung"
SQL;
        ?>
        <div id="subbody">
            <h1>
                Entdeckung
            </h1><?php
                if(!$result = $database->query($sql)){
                    die($database->error);
                }

                else{
                    while($row = $result->fetch_assoc()){
                        echo $row["Info"];
                        echo "<br>";
                    }
                }
                ?>        </div>
    </body>
</html>