<?php

class Database extends PDO {

	public function __construct()
	{

		/** Open a connection to the DB using the config.php file */
		parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

	}
}