<?php
    //loome AB ühenduse
    require_once("../config_global.php");
    $database = "if15_raunkos";
	
	
		function getAllData() {
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
		$stmt->bind_result($id_from_db, $user_from_db, $number_plate_from_db, $color_from_db);
		//Iga rea kohta teeme midagi
		while($stmt->fetch()) {
			//Saime andmed katte
			echo($user_id_from_db);
			
		}
		
		
	$stmt->close();
	$mysqli->close();
	}



?>