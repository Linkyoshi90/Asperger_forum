<?php

	$database = new mysqli("localhost","root","Stinki15-","aspergerforum");
	
	if ($database->connect_errno > 0){
            die('Keine Verbindung zur Datenbank! [' . $database->connect_error . ']');
	}
	else {
            
	}

?>