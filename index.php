<!DOCTYPE html>
<html>
<head>
	<title>Практическая работа</title>
</head>
<body>
	<header>
		<h2>Проверочная работа</h2>
		<p>Выполнил Кулманаков Илья, группа 482.</p>
	</header>
	<main>
		<article>
			<h2>Задание 1</h2>
			<p>
				<?php
				class Finder{
					static function find(string $func)
					{
						try{
							$filename = "https://www.php.net/manual/ru/function." . $func;
							if (!file_exists($filename))
							{
								throw new Exception();
							}
							$page = file_get_contents($filename);
							$info = '';
							if (!preg_match('#\\<div class="methodsynopsis dc-description"\\>.*?\\</div\\>#s', $page, $info))
							{
								throw new Exception();
							}
							return $info[0];
						}
						catch (Exception $exc)
						{
							return "Функция " . $func . " не найдена.";
						}
					}
				}

				echo "Описание функции sqrt: " . Finder::find('sqrtd')
				?>
			</p>
		</article>
	</main>
</body>
</html>