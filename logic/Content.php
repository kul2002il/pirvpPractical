<?php

namespace logic;

use function PHPSTORM_META\type;

require_once "connectDB.php";

class Content
{
	private $mysqli;

	public function __construct()
	{
		global $mysqli;
		$this->mysqli = $mysqli;
	}

	public function getContent()
	{
		$res = $this->mysqli->query("SELECT * FROM Pages;");
		$out = "";
		foreach ($res as $row)
		{
			$out .= "<article><h3>" . $row["title"] . "</h3><p>" . $row["content"];
		}
		return $out;
	}
}
