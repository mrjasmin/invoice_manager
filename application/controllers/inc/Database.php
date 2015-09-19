<?php

class Database {
	
	
	public function checkConnection($host, $username, $pw, $db){
	
		$link = mysqli_connect($host, $username, $pw, $db);

		if(mysqli_connect_errno())
			return false; 
	
		// Close the connection
		$link->close(); 
		
		return true; 		

	}
	
}

?>