<?php
spl_autoload_register();

$content = new logic\Content();

$page = new template\Page();
$page->setContext($content->getContent());
$page->show();
