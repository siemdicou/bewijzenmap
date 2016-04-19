<?php
	
/**
 * Deze klasse bevat helper-functies
 * 
 */
 
class Util {
	
	public static function getSafeGetVar ($paramName)
	{
		// voeg hier beveiliging toe! (escape quotes, stripslashes etc)
		
		$paramVal = isset($_GET[$paramName]) ? $_GET[$paramName] : '';
		
		return $paramVal;
	}
}