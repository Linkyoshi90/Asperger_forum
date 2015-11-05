<!DOCTYPE html>
<html>
    <head>
        <title>Entdeckung</title>
        <link href="css/forumLayout.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            //include("include/includeInfo.php");
        ?>
        <div id="subbody">
            <h1>
                Asperger Syndrom Entdeckung
            </h1>
            In der Psychiatrie kam es erst spät zu einer Beschreibung des Asperger-Syndroms. Als erstes wurde es von der russischen Kinderpsychiaterin Grunja
            Sucharewa beschrieben. Sie verwendete dafür den Ausdruck "schizoide Psychopathie". Später wurde es 1943 vom österrreichischen Kinderarzt Hans Asperger
            als "auttstische Psychopathie" bezeichnet. Fast gleichzeitig beschrieb der Amerikaner Leo Kanner eine andere Form von Autismus, den frühkindlichen Autismus.
           Wahrscheinlich wussten Kanner und Asperger nichts von der Arbeit des jeweils anderen. Kanners Arbeit fand sofort grosse Beachtung, Aspergers Arbeit wurde aber wegen dem Zweiten Weltkrieg
           international kaum beachtet.
           <br>
           <br>
           Die internationale Forschungsgemeinschaft wurde erst 1981 durch die Arbeit der britichen Psychiaterin Lorna Wing auf das Asperger-Syndrom aufmerksam. Sie verstand ihre Arbeit
           als Fortsetzung der Arbeit Aspergers und benannte es nach ihm und definierte es als Teil des autistischen Spektrums.
			<br>
			<br>
			Für das Asperger-Syndrom wurden Ende der 1980er-Jahre Diagnosekriterien formuliert, und 1992 erfolgte die Aufnahme in das medizinische Klassifikationssystem ICD der Weltgesundheitsorganisation.
            1994 wurde es in das Diagnostic and Statistical Manual of Mental Disorders (DSM), das Klassifikationssystem der American Psychiatric Association aufgenommen.
            Im DSM-5 und dem Entwurf des ICD-11 wurde es als eigenständige Störung entfernt. Seit dann gehört es zusammen mit anderen Formen zum autistischen Spektrum (autism spectrum disorders).
            Diese Änderung erfolgte, weil eine eindeutige Abgrenzung der verschiedenen Formen nicht mehr möglich war und ein stufenloser Übergang dazwischen angenommen werden sollte.
            <br>
            <br>
            <?php /* include("database_connect.php"); 

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
                }*/
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
                /*include("database_connect.php");
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
                }*/
            ?>
        </div>
    </body>
</html>
<?php

?>