<?php

namespace logic;

use function PHPSTORM_META\type;

require_once "connectDB.php";

class Banner
{
	private $mysqli;
	private $indexBanner = 0;
	public function __construct()
	{
		global $mysqli;
		$this->mysqli = $mysqli;
	}

	public function getRandBanner()
	{
		return $this->getBanner($this->randBanner());
	}

	private function getBanner($id)
	{
		$res = $this->mysqli->query("SELECT image FROM Banners WHERE id = $id;");
		$image = $res->fetch_assoc()["image"];
		return "<img src='img/banners/$image' alt='Banner' class='banner'>";
	}

	private function randBanner()
	{
		$res = $this->mysqli->query("SELECT id FROM Banners WHERE countShow < limitShow;");
		$randBanner = rand(0, $res->num_rows-1);
		$res->data_seek($randBanner);
		$this->indexBanner = $res->fetch_assoc()['id'];
		$this->incrementBaner($this->indexBanner);
		return $this->indexBanner;
	}

	private function incrementBaner()
	{
		if(!is_numeric($this->indexBanner))
		{
			$type = gettype($this->indexBanner);
			die("id банера должно быть числом, а не $this->indexBanner.");
		}
		$this->mysqli->query("UPDATE Banners SET countShow = countShow + 1 WHERE id = $this->indexBanner;");
	}
}
