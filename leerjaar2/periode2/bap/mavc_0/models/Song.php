<?php
	
class Song extends Model {
	
	public function __construct()
	{
		$this->table = 'songs';
		parent::__construct();
	}

	// Haal een enkel nummer op 
	public function getOne($id) {
				
		$result = $this->db->query('SELECT * FROM songs WHERE id = '.$id);
		
		$songInfo = $result->fetch_assoc();

		return $songInfo;
	}
	
	// Haal alle nummers uit de tabel op
	public function getAll () {
		
		// maak een lege list aan
		$songList = array();
		
		// maak deze regel af: voer een query uit
		$result = $this->db->query('SELECT * FROM songs');
		
		// haal het resultaat op en plaats alle rijen in een array
		while ($song = $result->fetch_assoc())
		{	
			$songList[] = $song;
			// $songList[] = $song_artist;
			// $songList[] = $song_length; 
		}
		
		// maak af: geef alle rijen terug
		return  $songList;
	}
}

?>