<?php
	
/**
 * Deze klasse bevat helper-functies
 * 
 */
 
class Util {
	
	public static function getSafeGetVar($paramName)
	{
		// voeg hier beveiliging toe!
		// mysql_real_escape_string($_GET[$paramName]); etc
		
		$paramVal = isset($_GET[$paramName]) ? $_GET[$paramName] : '';
		
		return $paramVal;
	}
}