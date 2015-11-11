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
                        <textarea name="kommentar" rows="25" cols="100">Hier kommt die Info rein!!!</textarea> 
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
                    $insert = "insert into Infos (Titel,Info,UserID,Username) Values('$titel','$post','$userID','$username');";
                    if (mysqli_query($database, $insert)) {
                        echo "SQL-INSERT erfolgreich";
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