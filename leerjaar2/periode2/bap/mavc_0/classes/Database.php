<?php
	
/**
 * Deze database klasse maakt de database-verbinding
 * De klasse in gemaakt als singleton. Hierdoor wordt er steeds maar 1 databaseverbinding gemaakt
 *
 */

class Database extends mysqli {

	private static $instance;

	public static function getInstance (){
		
		if (!self::$instance){ 
			
			self::$instance = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
		} 
	
		return self::$instance; 
	}
}