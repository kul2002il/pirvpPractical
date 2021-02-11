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
				Курсовой проект<br/>
				КП.20.090207.472.01.ПЗ
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
			$code = file_get_contents("../index.php");
			$code = htmlspecialchars($code);
			echo "<pre>" . $code . "</pre>";
			?>
		</div>

		<div>
			<h1>Результат работы программы</h1>
			<div class="out_page">
				<?php
				include("../index.php")
				?>
			</div>
		</div>
	</main>
</body>
</html>