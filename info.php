<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
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
            <form action="info.php" method="POST">
            <br>
            <?php

                $sql = <<<SQL
                SELECT *
                FROM Infos 
SQL;
                if(!$result = $database->query($sql)){
                    die('Fehler [' . $database->error . ']');
                }
                else{
                    while($row = $result->fetch_assoc()){
                        echo "<input type='submit' name='" . $row['Titel'] . "' value='" . $row['Titel'] . "'>";
                        echo "<br>";
                        
                        if(isset($_POST[$row['Titel']])){
                            $titel = $row['Titel'];
                            $sql1 = <<<SQL
                                SELECT Info FROM Infos Where Titel = '$titel';
SQL;
                            if(!$result = $database->query($sql1)){
                            die('Fehler [' . $database->error . ']');
                            }
                            else{
                                while($row = $result->fetch_assoc()){
                                    echo $row['Info'];
                                    echo "<br>";
                                }
                            }
                        }
                        else {

                        }
                    }
                }
                echo '</form>';
            ?>
            <br>
            <br>
            <br>
        </div>
    </body>
</html>