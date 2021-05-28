<?php

$mysqli = new mysqli(
	"127.0.0.1",
	"root",
	"",
	"PR4_banners",
	3333
);
if ($mysqli->connect_errno) {
	die("Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}
