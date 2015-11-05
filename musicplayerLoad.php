<?php
    include("database_connect.php");

    $sql = <<<SQL
        SELECT *
        FROM musicplayer 
SQL;

    //SCM Music Player http://scmplayer.net
    echo <<<DIESE
        <script type="text/javascript" src="http://scmplayer.net/script.js" 
        data-config="{'skin':'skins/aquaBlue/skin.css',
        'volume':50,
        'autoplay':true,
        'shuffle':true,
        'repeat':1,
        'placement':'bottom',
        'showplaylist':false,
        'playlist':[
DIESE;

    if(!$result = $database->query($sql)){
        die('Fehler [' . $database->error . ']');
    }
    else{
        while($row = $result->fetch_assoc()){
            echo "{'title'" . ":" . "'" . $row['song'] . " - " . $row['album'] . " von " . $row['interpret'] . "'," . "'url':'" . $row['url'] . "'},";
        }
    }
    echo <<<END
    {'title':'Hello my Baby, Hello my Honey - WB Songs von Frog',
    'url':'https://raw.githubusercontent.com/Linkyoshi90/Asperger_forum/master/music/josha/Frog%20-%20Hello%2C%20My%20Baby%2C%20Hello%20my%20Honey..%205%20min.mp3'}
    ]}">
    </script>
END;

?>
