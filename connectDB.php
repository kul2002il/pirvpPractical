<?php

$mysqli = new mysqli("127.0.0.1:3306", "root", "", "test");
if ($mysqli->connect_errno) {
    die("Не удалось подключиться к MySQL: " . $mysqli->connect_error);
}
/*
$res = $mysqli->query("SELECT 'выбора, чтобы угодить всем.' AS _msg FROM DUAL");
$row = $res->fetch_assoc();
echo $row['_msg'];
*/