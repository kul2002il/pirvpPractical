<?php

namespace template;

require "logic\Banner.php";

class Page{

	private $content = "Контент";
	private $head = "Главная";

	protected function setHeader(string $head){
		$this->head = $head;
	}

	protected function setContext(string $content){
		$this->content = $content;
	}

	private function showContent()
	{
		if($this->renderContent($this->content) == -1){
			echo $this->content;
		}
	}

	protected function renderContent($content){
		return -1;
	}

	public function show()
	{
		?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$this->head?></title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="/static/css/style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<td class="header" colspan="3">
					<h1><?=$this->head?></h1>
					<a href="/">Главная</a>
					<a href="/login.php">Вход</a>
				</td>
			</tr>
		</thead>
		<tfoot>
		<tr>
			<td class="footer" colspan="3">
				Сделано с безразличием. Дно
			</td>
		</tr>
		</tfoot>
		<tr>
			<td class="left">
				<?= (new \logic\Banner())->getRandBanner() ?>
			</td>
			<td class="center">
				<?php $this->showContent() ?>
			</td>
			<td class="right">
				Право
			</td>
		</tr>
	</table>
</body>
</html>
<?php
	}
}