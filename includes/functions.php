<?php

/*-----------------------------------------
    		ProjetFocus
    		creation date : 03 Fev 2017
    		includes/functions.php
-----------------------------------------*/


// fonctin de connection à la BDD avec l'objet mysqli


function sql($request){
 	$sql = new mysqli(sql_server,sql_user,sql_pass,sql_database);
 	$result = $sql->query($request);
 	// $result est un mysqli_result object
 	

 	if ($result === FALSE) {
 		return FALSE;
 	}
 	elseif (preg_match("/INSERT/", $request) && $result) {
 		return $sql->insert_id;
 	}
 else {
 	if($result === TRUE) {
 	return TRUE;
 	}
 	else {
 		$result_array = array();
 		while($i = $result->fetch_assoc()) {
 			array_push($result_array, $i);
 		}
 		return $result_array;
 	}
 }

}