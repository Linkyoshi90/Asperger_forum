<!DOCTYPE html>
<html>
    <head>
        <title>Neue Info</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/includeCustom.php");
            
            if (@$_SESSION['username'] != NULL) {
                //echo "Angekommen";
                echo '<br>
                    <div id="subbody">
                    <h1>Neue Info</h1>
                    <br>
                    <form action="newInfo.php" method="POST">
                        Titel
                        <br>
                        <input type="text" name="titel">
                        <br>
                        <br>
                        Info
                        <br>
                        <textarea name="kommentar" rows="4" cols="50">Hier kommt die Info rein!!!</textarea> 
                        <br>
                        <br>
                        <input type="submit" name="submit" value="Post">
                    </form>
                    <br>';
                if(isset($_POST['submit'])){
                    //echo "Schon hier";
                    //echo "<br>";
                    $userID = $_SESSION['userid'];
                    $username = $_SESSION['username'];
                    $post = mysqli_real_escape_string($database,$_POST['kommentar']);
                    $titel = mysqli_real_escape_string($database,$_POST['titel']);
                    $trimmed = trim($titel, " ");
                    $insert = "insert into infos (Titel,Info,UserID,Username) Values('$trimmed','$post','$userID','$username');";
                    if (mysqli_query($database, $insert)) {
                        echo "SQL-INSERT erfolgreich";
                        echo "<br>";
                        $sql = '$sql';
                        $myfile = fopen("$trimmed.php", "w") or die("Unable to open file!");
                        $txt = <<<This
                                <!DOCTYPE html>
<html>
    <head>
        <title>$trimmed</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/includeCustom.php");
            $sql = <<<SQL
                SELECT *
                FROM infos WHERE Titel = "$trimmed"
SQL;
        ?>
        <div id="subbody">
            <h1>
                $trimmed
            </h1>
This;
            $command = '<?php'
                    . '
                if(!$result = $database->query($sql)){
                    die($database->error);
                }

                else{
                    while($row = $result->fetch_assoc()){
                        echo $row["Info"];
                        echo "<br>";
                    }
                }
                ?>';
        $txt2 = <<<HELLO
        </div>
    </body>
</html>
HELLO;
                        $inhalt = $txt . $command . $txt2;
                        fwrite($myfile, $inhalt);
                        fclose($myfile);
                        echo "Datei erfolgreich erstellt!";
                        echo "<br>";
                        echo "<audio autoplay>";
                                echo "<source src='sounds/getCake5.ogg' type='audio/ogg'>";
                        echo "</audio>";
                    }
                    else {
                        echo "SQL-INSERT FEHLER ";
                        echo mysqli_error($database);
                    }
                }
            }
            else {
                echo '<br>
                    <div id="subbody">
                    <h1>Eintrag Erfassen</h1>
                    <br>
                    <br>';
                echo 'Login first, will you?';
            }
            ?>
        </div>
    </body>
</html>