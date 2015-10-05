<?php
    //loome AB ühenduse
    require_once("../config_global.php");
    $database = "if15_raunkos";
	
	
		function getAllData() {
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
        $stmt->execute();
        
		$array = array();
        
        //$stmt->close();
        //$mysqli->close();
		
        //$row_nr = 0;
		
		/*echo "<table border=1>";
		echo "<tr><th>rea nr</th> <th>auto nr märk</th></tr>";*/
		
        // iga rea kohta mis on ab'is teeme midagi
        while($stmt->fetch()){
            //saime andmed kätte
            /*echo "<tr><td>".$row_nr."</td><td>";
			echo $number_plate_from_db."</td></tr>";
			
            $row_nr++;*/
			
			//suvaline muutuja, kus hoiame andmeid, kuniks lisame massiivi
			//StdClass on tühi objekt, kus hoiame väärtusi
			$car = new StdClass();
			$car->id = $id_from_db;
			$car->number_plate = $number_plate_from_db;
			//Lisan massiivi (auto lisan massiivi)
			array_push($array, $car);
			/*echo "<pre>";
			var_dump ($array);
			echo "</pre>";*/
        }
		
		//Saadan tagasi
        return $array;
		//echo "</table>";
		
        // iga rea kohta mis on ab'is teeme midagi
/*        while($stmt->fetch()){
            //saime andmed kätte
            echo($user_id_from_db);
            //? kuidas saada massiivi - SIIT JÄTKAME
        }*/
        
        $stmt->close();
        $mysqli->close();
	}



?>