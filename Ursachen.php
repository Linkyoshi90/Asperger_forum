<!DOCTYPE html>
<html>
    <head>
        <title> Ursachen</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/IncludeCustom.php");
        ?>
        <div id="subbody">
            <h1>
               Ursachen
            </h1>
            Die Ursachen des Asperger-Syndroms und anderer Formen des autistischen Spektrums werde
            insbesondere bei der Ausbildung von Nervenverbindungen. Die m&ouml;glichen Ursachen der Abweichungen, die in erster Linie - aber nicht nur -
            die Embryonalentwicklung betreffen, sind Gegenstand der Forschung. In Frage kommen, neben besonderen genetisch vererbten Bedingungen, im Prinzip alle Faktoren,
            die die Arbeit der Gene in kritischen Zeitfenstern beeinflussen.
            <br>
            <br>
            <h3>Genetik</h3>
            <br>
            Die genetischen Ursachen des Gesamtbereichs des Autismusspektrums haben sich als &auml;usserst vielf&auml;ltig und hochkomplex erwiesen. In einer &Uuml;bersicht 
            von 2011 wurden bereits 103 Gene und 44 Genorte als Kandidaten f&uuml;r eine Beteiligung identifiziert, und es wurde vermutet, dass die Zahlen weiter stark steigen w&uuml;rden.
            Es wird allgemein davon ausgegangen, dass die immensen Kombinationsmöglichkeiten vieler genetischer Abweichungen die Ursache f&uuml;r die grosse Vielfalt und Breite des Autismusspektrums sind, 
            einschliesslich des Asperger-Syndroms.
            <br>
            <br>
            Durch bildgebende Verfahren konnten auf Gruppenebene, (noch) nicht im Einzelfall - immer wieder strukturelle und funktionelle Abweichungen im Gehirn festgestellt werden Bildliche Darstellungen
            einzelner Gehirne lassen bislang wegen der nat&uuml;rlichen Variationsbreite noch keine Aussagen zu, aber bei statistisch ermittelten Gruppendaten sind die Abweichungen bez&uuml;glich einer Vergleichsgruppe deutlich. 
            Sie betreffen weite Teile des Gehirns und stimmen &uuml;berein mit den typischen Abweichungen im Verhalten.
            <br>
            <br>
            <?php 
                include("database_connect.php");
                
                $file = basename(__FILE__, '.php');
                
                $sql = <<<SQL
                SELECT *
                FROM postKommentare WHERE KommentiertAuf = '$file'
SQL;

                if(!$result = $database->query($sql)){
                    die('Fehler [' . $database->error . ']');
                }

                else{
                    while($row = $result->fetch_assoc()){
                        echo '<div id="commentbody">';
                        echo '<div id="commentbodyUser">' . $row['Username'] . '<br> Datum: <br>' . $row['Datum'] . '</div>';
                        echo "<br>";
                        echo $row['PKommentar'] . '</div>';
                    }
                }
            ?>
            <form action="" method="POST">
                <br>
                Kommentar:<br>
                <input type="textarea" name="postKommentar" required="">
                <input type="submit" name="comment" value="Kommentieren">
                <br>
            </form>
            <br>
            <?php
                include("database_connect.php");
                if(isset($_POST['comment'])){
                    //echo "If Ausgef&uuml;hrt";
                    $file = basename(__FILE__, '.php');
                    $username = $_SESSION['username'];
                    $userID = $_SESSION['userid'];
                    $postKommentar = mysqli_real_escape_string($database,$_POST['postKommentar']);
                    $sel_user = "insert into postKommentare (PKommentar, KommentiertAuf, UserID, Username) Values('$postKommentar','$file','$userID','$username');";
                    if (mysqli_query($database, $sel_user)) {
                        echo "SQL-INSERT erfolgreich";
                        echo "<audio autoplay>";
                            echo "<source src='sounds/secret.mp3' type='audio/mpeg'>";
                        echo "</audio>";
                        echo '<script type="text/javascript"> document.location = "' . $file . '.php";</script>';
                    }
                    else {
                        echo "SQL-INSERT FEHLER";
                        echo mysqli_error($database);
                    }
                }
            ?>
          </div>
    </body>
</html>
