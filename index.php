<?php
session_start();
?>
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
							$otvet=@get_headers($filename);
							$code = substr($otvet[0], 9, 3);
							if ($code != '200')
							{
								throw new Exception($message = "Станица функции " . $func . " не найдена.");
							}
							$page = file_get_contents($filename);
							$info = '';
							if (!preg_match('#\\<div class="methodsynopsis dc-description"\\>.*?\\</div\\>#s', $page, $info))
							{
								throw new Exception($message = "Функция " . $func . " не найдена на станице.");
							}
							return $info[0];
						}
						catch (Exception $exc)
						{
							return $exc->getMessage();
						}
					}
				}

				echo "Описание функции sqrt: " . Finder::find('sqrt')
				?>
			</p>
		</article>

		<article>
			<h2>Задание 2</h2>
			<p>
				<?php
					class Session
					{
						public function set(string $key, $value)
						{
							$_SESSION[$key] = $value;
						}

						public function get(string $key)
						{
							return $_SESSION[$key];
						}

						public function existsKey(string $key)
						{
							return array_key_exists($key, $_SESSION);
						}

						public function listKeys()
						{
							return array_keys($_SESSION);
						}
					}

					$ses = new Session();
					$ses->set("key", "value");

				?>
				Значение key = <?= $ses->get('key') ?><br/>
				Существование key = <?= $ses->existsKey('key') ?><br/>
				Существование kei = <?= $ses->existsKey('kei') ?><br/>
				Список ключей: <?php print_r($ses->listKeys()) ?>
			</p>
		</article>
	</main>
</body>
</html>