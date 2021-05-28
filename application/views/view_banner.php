<?php
$flagCanEdit = isset($_SESSION["user"]);
?>
<h1>Баннеры</h1>
<?php if($flagCanEdit) { ?>
	<a href="/news/add/">Добавить</a>
<?php } ?>
<div class="line">
	<?php foreach($data as $row) { ?>
		<article>
			<img src="<?=$row["image"]?>" alt="картинка">
			<div>
				<?php if($flagCanEdit && $row["owner"] === $_SESSION["user"]["id"]) { ?>
					<a href="/news/edit/<?=$row["id"]?>">Изменить</a>
				<?php } ?>
			</div>
		</article>
	<?php } ?>
</div>
