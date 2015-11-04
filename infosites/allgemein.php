<!DOCTYPE html>
<html>
    <head>
        <title>Allgemein</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/includeInfo.php");
        ?>
        <div id="subbody">
            <h1>
                Asperger Syndrom Allgemein
            </h1>
            Als Asperger-Syndrom wird eine eher milde Variante innerhalb des 
            Autismusspektrums bezeichnet, das seinerseits zum Katalog der 
            sogenannten tiefgreifenden Entwicklungsstörungen (im Gegensatz zu 
            spezifischen Entwicklungsstörungen) gehört. Die Variante ist vor 
            allem durch Schwächen in den Bereichen der sozialen Interaktion und 
            Kommunikation gekennzeichnet, sowie durch eingeschränkte und stereotype 
            Aktivitäten und Interessen.
            <br>
            <br>
            Beeinträchtigt ist vor allem die Fähigkeit, nichtsprachliche Signale 
            (Gestik, Mimik, Blickkontakt) bei anderen Personen zu erkennen und 
            selbst auszusenden. Das Kontakt- und Kommunikationsverhalten von 
            Asperger-Autisten kann dadurch merkwürdig und ungeschickt erscheinen. 
            Da ihre Intelligenz in den meisten Fällen normal ausgeprägt ist, 
            werden sie von ihrer Umwelt leicht als wunderlich wahrgenommen. 
            Gelegentlich fällt das Asperger-Syndrom mit einer Hoch- oder 
            Inselbegabung zusammen. Es gilt als angeboren, nicht heilbar und es 
            macht sich etwa vom vierten Lebensjahr an bemerkbar.
            <br>
            <br>
            Das Asperger-Syndrom ist nicht nur mit Beeinträchtigungen, sondern 
            oft auch mit Stärken verbunden, etwa in den Bereichen der Wahrnehmung, 
            der Selbstbeobachtung, der Aufmerksamkeit oder der Gedächtnisleistung. 
            Ob es als Krankheit oder als eine Normvariante der menschlichen 
            Informationsverarbeitung eingestuft werden sollte, wird von Wissenschaftlern 
            und Ärzten sowie von Asperger-Autisten und deren Angehörigen uneinheitlich 
            beantwortet. Uneinig ist sich die Forschergemeinschaft auch hinsichtlich 
            der Frage, ob man im Asperger-Syndrom ein selbstständiges Störungsbild 
            oder eine graduelle Variante des frühkindlichen Autismus sehen sollte.
            <br>
            <br>
            <br>
            <?php include("database_connect.php"); 

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