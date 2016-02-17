<?php 

	class product
	{
		protected $_title;
		protected $_type;

		public function __construct($title, $type)
		{
			$this->_title =$title;
			$this->_type =$type;
		}
		//method
		public function getTitle()
		{
			return $this->_title;
		}
		public function getType()
		{
			return $this->_type;
		}
	}

 ?>