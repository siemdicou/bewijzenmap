<?php

/**
 * Base model 
 * 
 */
 
class Model {

    protected $db;
    // protected $table;
   
	public function __construct()
	{
		$this->db = Database::getInstance();
	}
	
	
	// Deze functies moeten hier nog worden gedefinieerd
	// 
	// public function getOne($id) {
	//	
	// public function getAll () {
	
}