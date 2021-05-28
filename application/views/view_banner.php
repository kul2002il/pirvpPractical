<?php
$flagCanEdit = isset($_SESSION["user"]);
if($flagCanEdit)
{
	$flagAdmin = in_array($_SESSION["user"]["role"], [
		"superuser",
		"admin",
	]);
}
?>
<h1>Баннеры</h1>
<?php if($flagCanEdit) { ?>
	<a href="/banner/add/">Добавить</a>
<?php } ?>
<div class="line">
	<?php foreach($data as $row) { ?>
		<article>
			<img src="<?=$row["image"]?>" alt="картинка">
			<div>
				<?php if($flagCanEdit && ($row["owner"] === $_SESSION["user"]["id"] || $flagAdmin)) { ?>
					<a href="/banner/edit/<?=$row["id"]?>">Изменить</a>
				<?php } ?>
			</div>
		</article>
	<?php } ?>
</div>
