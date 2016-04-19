<?php


class Model {

    protected $db;
    protected $table;
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];
   
	public function __construct()
	{
		$this->table =  strtolower(get_class($this)). 's';
		$this->db = Database::getInstance();
	}

	public function parseUrl()
	{
		if (isset($GET['url'])) {
			# code...
		}
	}
	
	public function getOne($id) {
				
		$result = $this->db->query('SELECT * FROM '.$this->table.' WHERE id = '.$id);
		$data = $result->fetch_assoc();
		return $data;
	}
	
	// Deze functies moeten hier nog worden gedefinieerd
	// 
	// public function getOne($id) {
	//	
	// public function getAll () {
	public function getAll () {
		
		// maak een lege list aan
		$songList = array();
		
		// maak deze regel af: voer een query uit
		$result = $this->db->query( "SELECT * FROM ".$this->table);


		// haal het resultaat op en plaats alle rijen in een array
		while ($song = $result->fetch_assoc())
		{
			$songList[] = $song; 
		}
		
		// maak af: geef alle rijen terug
		return $songList;
	}
}