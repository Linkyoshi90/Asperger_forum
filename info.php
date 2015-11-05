<!DOCTYPE html>
<html>
    <head>
        <title>Info</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/includeCustom.php");
        ?>
        <div id="subbody">
            <div id="bodyPic">
                <a href=newInfo.php>
                    <img src="images/newInfo.png" height="70px" width="120px" alt="alternative">
                </a>
            </div>
            <h1>Info-Ecke</h1>
            <br>
            <a href=allgemein.php>Asperger-Syndrom Allgemein</a>
            <br>
            <a href=entdeckung.php>Asperger-Syndrom Entdeckung</a>
            <br>
            <a href=Ursachen.php>Ursachen</a>
            <br>
            <?php

                $sql = <<<SQL
                SELECT *
                FROM infos 
SQL;

                if(!$result = $database->query($sql)){
                    die('Fehler [' . $database->error . ']');
                }

                else{
                    while($row = $result->fetch_assoc()){
                        echo "<a href=" . $row['Titel'] . ".php>" . $row['Titel'] . "</a>";
                        echo "<br>";
                    }
                }
            ?> 
            <br>
            <br>
            <br>
        </div>
    </body>
</html>