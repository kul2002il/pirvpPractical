<?php

class  Model_Banner extends Model
{
	public function getData()
	{
		return $this->mysqli->query(
			"SELECT *
			FROM banners;
		");
	}

	public function getRandBannerImg($position)
	{
		if(!in_array($position, [
			"left",
			"right",
			"down"
		]))
		{
			return "Позиция не верна.";
		}
		$res = $this->mysqli->query("SELECT id FROM banners
			WHERE countShow < limitShow AND position = '$position';");
		if (!$res)
		{
			return "Ошибка БД " .
				$this->mysqli->errno . ": " . $this->mysqli->error;
		}
		if ($res->num_rows === 0)
		{
			return "";
		}
		$randBanner = rand(0, $res->num_rows-1);
		$res->data_seek($randBanner);
		$indexBanner = $res->fetch_assoc()['id'];
		$this->mysqli->query("UPDATE banners SET countShow = countShow + 1 WHERE id = $indexBanner;");
		$res = $this->mysqli->query("SELECT image FROM banners WHERE id = $indexBanner;");
		$image = $res->fetch_assoc()["image"];
		return "<img src='$image' alt='banner' class='banner'>";
	}

	public function getDataOne($index)
	{
		$index = (int)$index;
		$res = $this->mysqli->query(
			"SELECT *
			FROM banners
			WHERE id = $index;
			");
		if (!$res)
		{
			return "Ошибка БД " .
				$this->mysqli->errno . ": " . $this->mysqli->error;
		}
		$row = $res->fetch_assoc();
		return $row;
	}

	public function add($data)
	{
		$valid = $this->validate($data);
		if(is_string($valid))
		{
			return $valid;
		}
		extract($valid);

		if(!$image)
		{
			return "нет картинки";
		}

		$res = $this->mysqli->query(
			"INSERT INTO banners (image, owner, position) VALUES
			('$image', $owner, '$position');
		");

		if (!$res)
		{
			return "Добавление провалилось по причине БД " .
				$this->mysqli->errno . ": " . $this->mysqli->error;
		}

		return true;
	}

	public function addShow($index, $increment)
	{
		if (!in_array($_SESSION["user"]["role"], [
			"superuser",
			"admin",
		])){
			return "Отказано в доступе.";
		}

		$increment = (int)$increment;

		$res = $this->mysqli->query(
			"UPDATE banners SET
				limitShow = limitShow + $increment
			WHERE id = $index;
		");

		if (!$res)
		{
			return "Добавление провалилось по причине БД " .
				$this->mysqli->errno . ": " . $this->mysqli->error;
		}

		return true;
	}

	public function edit($data, $index)
	{
		$valid = $this->validate($data);
		if(is_string($valid))
		{
			return $valid;
		}

		$increment = 0;
		extract($valid);

		$index = (int)$index;

		$strChangeImade = "";
		if($image)
		{
			$strChangeImade = ",image = '$image'";
		}

		$res = $this->mysqli->query(
			"UPDATE banners SET
				position = '$position',
				limitShow = limitShow + $increment
				$strChangeImade
			WHERE id = $index;
		");

		if (!$res)
		{
			return "Обновление провалилось по причине БД " .
				$this->mysqli->errno . ": " . $this->mysqli->error;
		}

		return true;
	}

	public function delete($index)
	{
		$index = (int)$index;
		$res = $this->mysqli->query(
			"DELETE FROM banners
			WHERE id = $index;
			");
		if (!$res)
		{
			return "Ошибка БД " .
				$this->mysqli->errno . ": " . $this->mysqli->error;
		}
		return true;
	}

	private function validate($data)
	{
		if (!isset($_SESSION["user"]))
		{
			return "Баннер может добавлять только зарегистрированный пользователь.";
		}

		/*
		if (!in_array($_SESSION["user"]["role"], [
			"superuser",
			"admin",
		])){
			return "Отказано в доступе.";
		}
		*/

		if (!isset($data["image"]) ||
			!isset($data["position"]) )
		{
			return "Нет обязательных полей.";
		}

		return [
			"image" => $data["image"],
			"owner" => $_SESSION["user"]["id"],
			"position" => $data["position"],
			"increment" => (int)$data["increment"],
		];
	}
}
