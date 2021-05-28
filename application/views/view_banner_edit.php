<?php
$flagAdmin = false;
if(isset($_SESSION["user"]) && in_array($_SESSION["user"]["role"], [
		"superuser",
		"admin",
])){
	$flagAdmin = true;
}
?>
<h1>Изменение баннера</h1>
<form enctype="multipart/form-data" method="post">
	<table>
		<tr>
			<td>
				<label for="position">Положение</label>
			</td>
			<td>
				<select name="position" id="position">
					<option value='left'>Лево</option>
					<option value='right'>Право</option>
					<option value='down'>Дно</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label for="image">Картинка</label>
			</td>
			<td>
				<input type="file" name="image" id="image" accept="image/*">
			</td>
		</tr>
		<? if($flagAdmin) { ?>
		<tr>
			<td>
				<label for="increment">Добавить просмотров</label>
			</td>
			<td>
				<input type="number" name="increment" id="increment" value="0">
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="editBanner" value="Отправить">
			</td>
		</tr>
	</table>
</form>
