<?php
session_start();
$passwordSalt = md5("соль");
$mysqli = null;
$messages = [];

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

require_once 'models/model_banner.php';
$banner = new Model_Banner();

Route::start(); // запускаем маршрутизатор
