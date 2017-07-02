<?php

//Only one connetion is allowed

class connection{
	private $_connection;

	private static $_instance;
        
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			!self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct()
	{
                //$host = "HOST";
                //$db = 'database';//"admito_test";
                //$user = "database-user";
                //$pass = "password";

		$this->_connection = new mysqli($host,$user,$pass,$db);
                mysqli_set_charset($this->_connection, 'utf8');
		if(mysqli_connect_error())
		{
			trigger_error("Failed to connect to the Database " . mysqli_connect_error());
		}
	}

	public function __clone()
	{

	}

	public function getConnection()
	{
		return $this->_connection;
	}
}

?>
