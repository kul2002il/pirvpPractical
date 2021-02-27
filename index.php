<?php

require_once "pager.php";

$page = 0;
if(isset($_GET["page"]))
{
	$page = $_GET["page"];
}
$size = 3;
if(isset($_GET["size"]))
{
	$page = $_GET["size"];
}

$pager = new Pager($page, $size);
$pager->show();
