<?php
require_once "connectDB.php";
require_once "pager.php";

final class PagerDB extends Pager
{
	private $mysqli;

	protected function getArticle($number)
	{
		return "<span>" . $this->getData($number)[1] . "</span></br>";
	}

	public function loadData($args = [])
	{
	    $res = $this->mysqli->query("SELECT * FROM Persons");
        /*
        CREATE TABLE Persons (
            Personid int NOT NULL AUTO_INCREMENT,
            userData varchar(255),
            PRIMARY KEY (Personid)
        );
        */
	    if(!$res) return[];
		return $res->fetch_all();
	}

	public function setConnect($mysqli)
	{
		$this->mysqli = $mysqli;
		$this->loadData();
	}
}

$page = 0;
if(isset($_GET["page"]))
{
	$page = $_GET["page"];
}
$size = 10;
if(isset($_GET["size"]))
{
	$page = $_GET["size"];
}

$pager = new PagerDB($page, $size);
$pager->setConnect($mysqli);
$pager->show();
