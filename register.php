<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <?php
            include("include/include.php");
        ?>
        <div id="username">
            <?php
                @session_start();
                if (@$_SESSION['username'] != NULL) {
                    echo @$_SESSION['username'];
                }
            ?>
        </div>
        <div id="subbody">
            <h1>Register</h1>
            <br>
            <form action="register.php" method="POST">
                <br>
                Name:<br>
                <input type="text" name="name">
                <br>
                <br>
                Vorname:<br>
                <input type="text" name="vorname">
                <br>
                <br>
                Username:<br>
                <input type="text" name="username" required>
                <br>
                <br>
                Password:<br>
                <input type="password" name="password" required>
                <br>
                <br>
                <input type="submit" name="register" value="Register">
                <br>
            </form>
            <br>
            <?php
                include("database_connect.php");

                if(isset($_POST['register'])){
                    //echo "If Ausgef&uuml;hrt";
                    $name = mysqli_real_escape_string($database,$_POST['name']);
                    $vorname = mysqli_real_escape_string($database,$_POST['vorname']);
                    $username = mysqli_real_escape_string($database,$_POST['username']);
                    $password = mysqli_real_escape_string($database,$_POST['password']);
                    $sel_user = "insert into user (Name,Vorname,Username,Passwort, Administrator) Values('$name','$vorname','$username','$password',false);";
                    if (mysqli_query($database, $sel_user)) {
                        echo "SQL-INSERT erfolgreich";
                        echo "<audio autoplay>";
                            echo "<source src='sounds/secret.mp3' type='audio/mpeg'>";
                        echo "</audio>";
                        echo '<script type="text/javascript"> document.location = "index.php";</script>';
                    }
                    else {
                        echo "SQL-INSERT FEHLER";
                        echo mysqli_error($database);
                    }
                }
                //echo "<br>";
                //echo "Nochmals Erfolgreich!";
            ?>
        </div>
    </body>
</html>