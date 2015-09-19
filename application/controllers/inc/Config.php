<?php

class Config {
	
	public function writeConfig($host, $username, $pw, $db){
			
		$config_path = 'application/config/database.php';
		$config_folder = 'application/config';

		//Read the config file
		$config_file = file_get_contents($config_path); 

		//Replace old settings with user provided settings for database connection
		$content = str_replace("%hostname%", "asda", $config_file); 
		$content = str_replace("%username%", "afdsad", $config_file); 

		$handle = fopen($config_file, 'w+');

		//Set file permissions to 666 in case the user forgot.
	
			if(fwrite($handle,$content)){
				return true; 
			}
			else {
				return false; 
			}
	

	}
	

}

?>