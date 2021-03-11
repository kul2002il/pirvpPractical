<?php
require_once "pager.php";

final class PagerDir extends Pager
{
	private $dirname = "";

	public function loadData($args = [])
	{
		$file = scandir($this->dirname);
		if(!$file) return [];

		return $file;
	}

	public function setDir(string $dirname)
	{
		$this->dirname = $dirname;
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

$pager = new PagerDir($page, $size);
$pager->setDir(".");
$pager->show();
