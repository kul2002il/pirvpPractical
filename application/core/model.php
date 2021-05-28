<?php

class Model
{
	protected $mysqli = null;
	public function __construct()
	{
		global $mysqli;
		if(!$mysqli)
		{
			$mysqli = new mysqli("localhost", "root", "", "PR4_banners");
			if ($mysqli->connect_errno) {
				die("Не удалось подключиться к MySQL: " . $mysqli->connect_error);
			}
		}
		$this->mysqli = $mysqli;
	}
}
