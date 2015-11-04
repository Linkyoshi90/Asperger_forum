<!DOCTYPE html>
<html>
    <head>
        <title>Entdeckung</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("include/includeInfo.php");
        ?>
        <div id="subbody">
            <h1>
                Asperger Syndrom Entdeckung
            </h1>
            Das Asperger-Syndrom ist in der Psychiatrie erst spät beschrieben 
            und diskutiert worden. Die älteste Darstellung stammt von der russischen 
            Kinderpsychiaterin Grunja Sucharewa, die dafür 1926 den Ausdruck 
            „schizoide Psychopathie“ verwendete. Der österreichische Kinderarzt 
            Hans Asperger bezeichnete es in seiner 1943 eingereichten 
            Habilitationsschrift als „autistische Psychopathie“.
            <br>
            <br>
            Aspergers Schrift erschien damals fast gleichzeitig mit Leo Kanners 
            grundlegendem Aufsatz über den frühkindlichen Autismus (1943). Man nimmt an, 
            dass beide Autoren zunächst nichts über die Arbeit des jeweils anderen 
            wussten. Kanners in den USA veröffentlichte Arbeit fand sofort 
            internationale Beachtung; der Aufsatz des Österreichers Asperger wurde 
            damals – mitten im Zweiten Weltkrieg – außerhalb der deutschsprachigen 
            wissenschaftlichen Gemeinschaft kaum bekannt. Auch ein 1962 von zwei 
            niederländischen Autoren veröffentlichter Aufsatz, in dem eine Unterscheidung 
            zwischen der „autistischen Psychopathie“ Aspergers und dem Kanner-Autismus 
            versucht wurde, fand zunächst wenig Resonanz.
            <br>
            <br>
            Von der internationalen Forschungsgemeinschaft wurde das Asperger-Syndrom 
            erst nach 1981 beachtet, als die britische Psychiaterin Lorna Wing 
            Aspergers Arbeit fortsetzte und die Abweichung, die bis dahin als 
            Psychopathie galt, als Teilbereich des Autismusspektrum nach Hans 
            Asperger benannte.
            <br>
            <br>
            In den späten 1980er Jahren wurden dann von verschiedenen Seiten 
            Diagnosekriterien formuliert, die sich zum Teil erheblich von einander 
            unterschieden. 1992 wurde das Asperger-Syndrom in das medizinische 
            Klassifikationssystem ICD der Weltgesundheitsorganisation aufgenommen. 
            Im Diagnostic and Statistical Manual of Mental Disorders (DSM), dem 
            Klassifikationssystem der American Psychiatric Association, erscheint 
            es seit 1994.
            <br>
            <br>
            Im DSM-5 von 2013 und im Entwurf (Stand: August 2015) für die Neufassung 
            der ICD (ICD-11) wurde das Asperger-Syndrom als getrennt definierbare 
            Abweichung entfernt. Es zählt hiernach zusammen mit anderen Erscheinungsformen 
            des Autismus zum Spektrum autistischer Erkrankungen (autism spectrum 
            disorders). Der Grund für die Änderung war, dass sich in der Wissenschaft 
            zunehmend die Erkenntnis durchgesetzt hatte, dass eine klare Abgrenzung 
            nicht möglich war, und man deshalb von einem stufenlosen Übergang 
            zwischen milden und bedeutenderen Formen ausgehen sollte.
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
<?php

?>