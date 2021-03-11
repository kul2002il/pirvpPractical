<?php

$numberLR = 14;

//Пути до файлов, не отображаемых в отчёте как исходный.
//(Относителько корневой директории.)
$listIgnoreFiles = array(
);

//Пути до исполняемых файлов скриптов.
$listResultsFiles = array(
    "index.php",
    "pagerFile.php",
    "pagerDB.php",
    "pagerDir.php"
);

$task =
"
<ol>
    <li>По документации с сайта http://pbp.net познакомьтесь с предопределенными классами Directory, DateTime,
    DateTimeZone, Datelnterval, DatePeriod. Допускается ли наследование от этих предопределенных классов?</li>
    <li>Реализуйте класс Pager и его классы наследники из раздела о полиморфизме (стр. 145 методического пособия).</li>
</ol>
";
