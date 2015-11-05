<!DOCTYPE html>
<html>
    <head>
        <title>Allgemein</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/IncludeCustom.php");
        ?>
        <div id="subbody">
            <h1>
                Asperger Syndrom Allgemein
            </h1>
            Bei autistischen St&ouml;rungen handelt es sich um sogenannte tiefgreifende Entwicklungsst&ouml;rungen( im Gegensatz zu den spezifischen Entwicklungsst&ouml;rungen), welche angeboren, chronisch und unheilbar sind. Oft nehmen die spezifisch autistischen Erscheinungen im Laufe des Erwachsenenalters ab, es kommt aber selten zu einer vollst&auml;ndigen Normalisierung. 
            Teilweise k&ouml;nnen Autisten ein relativ normales und selbstst&auml;ndiges leben f&uuml;hren, andere sind dagegen lebenslang auf spezielle Unterst&uuml;tzung angewiesen. Meist leben sie aber in Isolierung und ben&ouml;tigen viel Verst&auml;ndnis von ihren Mitmenschen.
            Das Asperger-Syndrom ist eine Form des autistischen Spektrums, welche meist f&uuml;r Aussenstehende nicht erkennbar ist, da Asperger-Autisten eine normale, oft sogar &uuml;berdurchschnittliche Intelligenz aufweisen. Deshalb erscheinen sie auf den ersten Blick als "normale" Menschen.
            Asperger-Autisten mit einer hohen Intelligenz haben oft auch gelernt, ihre Schwierigkeiten gut zu kompensieren oder zu verstecken.<br>
            Zu den typischen Erscheinungen von Asperger-Autisten geh&ouml;rt eine Einschr&auml;nkung der F&auml;higkeit, nonverbale Kommunikation wie Mimik, Gestik oder Blickkontakt bei anderen Personen zu erkennen und richtig einzusch&auml;tzen, sowie Besonderheiten
            bei der Wahrnehmung und Verarbeitung von Sinnesreizen. Weitere Merkmale sind h&auml;ufig eingeschr&auml;nkte und stereotype Aktivit&auml;ten und Interessen sowie Schw&auml;chen in der sozialen Interaktion.
            Da Asperger-Autisten &uuml;ber eine normale Intelligenz verf&uuml;gen, werden sie von ihrer Umwelt oft als seltsame Personen wahrgenommen.
            <br>
            <br>
            Teilweise tritt das Asperger-Syndrom gemeinam mit einer Hoch- oder Inselbegabung auf, dies ist aber meist nicht der Fall.
            Neben den verschiedenen Beeintr&auml;chtigungen weisen Asperger-Autsiten aber oft auch St&auml;rken auf, beispielsweise eine detaillierte Wahrnehmung, gute Selbstbeobachtung,
            hohe Aufmerksamkeits- und Konzentrationsf&auml;higkeit oder ein gutes Ged&auml;chtnis.
            <br>
            <br>
            In der Wissenschaft ist es umstritten, ob das Asperger-Syndrom und andere Formen des autistischen Spektrums als St&ouml;rung oder nur als eine Variante der menschlichen Informationsverarbeitung betrachtet werden sollte.  
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