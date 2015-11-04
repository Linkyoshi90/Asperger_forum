<!DOCTYPE html>
<html>
    <head>
        <title>Erfassen</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/includeCustom.php");
            
            if (@$_SESSION['username'] != NULL) {
                //echo "Angekommen";
                echo '<br>
                    <div id="subbody">
                    <h1>Eintrag Erfassen</h1>
                    <br>
                    <form action="verfassen.php" method="POST">
                        <input type="text" name="kommentar">
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
                    $insert = "insert into kommentar (Kommentar,UserID,Username) Values('$post','$userID','$username');";
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
            <!--
            <br>
            Bosses
            <br>
            <a href=bossErfassen.php>Post an Event</a>
            <br>
            <a href=bossEinsicht.php>Look at Events</a>
            <br>
            -->
        </div>
    </body>
</html>