<?php
	global $banner;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<link rel="stylesheet" href="/static/css/style.css">
</head>
<body>
<table>
	<thead>
	<tr>
		<td class="header" colspan="3">
			<h1><?=$this->head?></h1>
			<?php
			$pages = scandir("application/controllers");
			unset($pages[0]);
			unset($pages[1]);
			foreach ($pages as $value)
			{
				$matches = [];
				preg_match("#controller_(.*).php#", $value, $matches);
				$page = $matches[1];
				?>
				<li>
					<a href="/<?= $page ?>">
						<?= $page ?>
					</a>
				</li>
				<?php
			}
			if (isset($_SESSION["user"]))
			{?>
				<a href='/user'>
					<?= $_SESSION["user"]["login"] ?>
				</a>
			<?php } ?>
		</td>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<td class="footer" colspan="3">
			<?= $banner->getRandBannerImg("down") ?>
			Сделано с безразличием. Дно
		</td>
	</tr>
	</tfoot>
	<tr>
		<td class="left">
			<?php
			global $messages;
			if ($messages)
			{
				echo "<h2>Сообщения системы</h2><ul>";
				foreach ($messages as $value) {
					?>
					<li>
						<?= $value ?>
					</li>
					<?php
				}
				echo "</ul>";
			}
			?>
			<?= $banner->getRandBannerImg("left") ?>
		</td>
		<td class="center">
			<?php include 'application/views/'.$content_view; ?>
		</td>
		<td class="right">
			<?= $banner->getRandBannerImg("right") ?>
		</td>
	</tr>
</table>
</body>
</html>
