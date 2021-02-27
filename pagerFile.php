<?php
require_once "pager.php";

class PagerFile extends Pager
{
	public function getArticle($number)
	{
		return "<span>" . $this->getData($number) . "</span></br>";
	}

	public function loadData()
	{
		return file("pager.php");
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
$pager->show();
