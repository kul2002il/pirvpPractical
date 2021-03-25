<?php

namespace template;

class Page{
	public function show()
	{
		?>
<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="static/css/style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<td class="header" colspan="3">
					<h1>Главная</h1>
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
			<td class="left">Лево</td>
			<td class="center">Центр</td>
			<td class="right">Право</td>
		</tr>
	</table>
</body>
</html>
<?php
	}
}