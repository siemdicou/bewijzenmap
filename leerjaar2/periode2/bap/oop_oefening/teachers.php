<?php 
	/**
	* 
	*/
	class teachter extends AnotherClass
	{
		protected $_name;
		protected $_type;
		protected $_email;

		function __construct($name, $type, $email)
		{
			$this->_name = $name;
			$this->_type = $type;
			$this->_email = $email;

		}
		public function getName()
		{
			return $this->_name;
		}

		public function getType()
		{
			return $this->_type;
		}

		public function getEmail()
		{
			return $this->_email;
		}


	}

 ?>