<?php

$numberLR = 16;

//Пути до файлов, не отображаемых в отчёте как исходный.
//(Относителько корневой директории.)
$listIgnoreFiles = array(
    "exceptions.log",
);

//Пути до исполняемых файлов скриптов.
$listResultsFiles = array(
    "exceptions.log",
);

$task =
"
Модифицируйте обработчик исключений в данной главе (глава Исключения из методического пособия) таким образом,
чтобы информация об исключении, времени и месте его возникновения сохранялась в журнальный файл exceptions.log
";