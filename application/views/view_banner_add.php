<?php
function selectHTML($role)
{
	$list = [
		"left",
		"right",
		"down",
	];
	$out = "<select name='position'>";
		foreach ($list as $pin)
		{
		$select = "";
		if ($role === $pin)
		{
		$select = "selected";
		}
		$nameRole = $pin ? $pin : "user";
		$out .= "<option value='$pin' $select >$nameRole</option>";
		}
		$out .= "</select>";
	return $out;
}
?>
<h1>Добавнелие нового баннера</h1>
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
				<input type="file" name="image" id="image" required accept="image/*">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="addBanner" value="Добавить">
			</td>
		</tr>
	</table>
</form>
