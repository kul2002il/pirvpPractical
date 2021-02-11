<?php
require_once "options.php";

function getBranch($dir)
{
	$tree = scandir($dir);
	unset($tree[0]);
	unset($tree[1]);
	$tree = array_filter($tree, function ($in)
	{
		return !($in == "print" || $in == ".git"|| $in == ".idea" || $in == ".gitignore" );
	});
	return $tree;
}

$files = getBranch("..")

?>
<!DOCTYPE html>
<html>
<head>
	<title>Практическая по ПиРВП</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<main>
		<div class="title_page">
			<p>
				ДЕПАРТАМЕНТ ПРОФЕССИОНАЛЬНОГО ОБРАЗОВАНИЯ<br/>
				ТОМСКОЙ ОБЛАСТИ<br/>
				ОБЛАСТНОЕ ГОСУДАРСТВЕННОЕ БЮДЖЕТНОЕ ПРОФЕССИОНАЛЬНОЕ ОБРАЗОВАТЕЛЬНОЕ
				УЧРЕЖДЕНИЕ<br/>
				«ТОМСКИЙ ТЕХНИКУМ ИНФОРМАЦИОННЫХ ТЕХНОЛОГИЙ»
			</p>

			<p class="discipline">Специальность 090207 «Информационные системы и программирование»</p>

			<p class="title_work">
				Практическая работа №<?=$numberLR?>
			</p>

			<div class="signature">
				<table>
					<tr>
						<td>Студент<br/>«__»________ 2021 г.</td>
						<td>_________________</td>
						<td>Кулманаков И.В.</td>
					</tr>
					<tr>
						<td>Руководитель<br/>«__»________ 2021 г.</td>
						<td>_________________</td>
						<td>Грушевский Ю.В.</td>
					</tr>
				</table>
			</div>

			<p>Томск 2021</p><div></div>
		</div>
		<div>
			<h1>Файлы</h1>
			<?php
			foreach ($files as $val)
			{
				$code = file_get_contents("../" . $val);
				$code = htmlspecialchars($code);
				?>
				<h2><?=$val?></h2>
				<pre><?=$code?></pre>
				<?php
			}
			?>
		</div>

		<div>
			<h1>Результат работы программы</h1>
			<?php
			foreach ($listResultsFiles as $val)
			{
				?>
				<h2><?="/" . $val?></h2>
				<div class="out_page">
					<?php
					include("../" . $val);
					?>
				</div>
				<?php
			}
			?>
		</div>

		<div>
			<h1>Вывод</h1>
			<p>
				Вывод: в ходе выполнения практической работы была выполнена практическая работа.
			</p>
		</div>
	</main>
</body>
</html>