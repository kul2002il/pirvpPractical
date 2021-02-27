<?php
require_once "pager.php";

final class PagerFile extends Pager
{
	private $filename = "";

	protected function getArticle($number)
	{
		return "<span>" . $this->getData($number) . "</span></br>";
	}

	public function loadData($args = [])
	{
		if(!file_exists($this->filename)) return [];

		$file = file($this->filename);
		if(!$file) return [];

		return $file;
	}

	public function setFile(string $filename)
	{
		$this->filename = $filename;
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

$pager = new PagerFile($page, $size);
$pager->setFile("pager.php");
$pager->show();
