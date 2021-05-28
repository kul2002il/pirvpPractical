<?php

class Controller_Banner extends Controller
{
	private $modelComments;

	function __construct()
	{
		parent::__construct();
		$this->model = new Model_Banner();
	}

	function action_index()
	{
		$data = $this->model->getData();
		$this->view->generate('view_banner.php', $data);
	}

	public function action_add()
	{
		if (!isset($_SESSION["user"]))
		{
			header('Location: /user/login');
			return;
		}

		global $messages;
		if (isset($_POST["addBanner"]))
		{
			$data = $_POST;
			$data = array_merge($data, [
				"image" => $this->saveImage("image"),
			]);
			$res = $this->model->add($data);
			if($res === true)
			{
				header('Location: /banner');
				return;
			}
			array_push($messages, $res);
		}
		$this->view->generate('view_banner_add.php');
	}

	public function action_edit($index = null)
	{
		if (!$index)
		{
			header('Location: /news/add');
			return;
		}

		global $messages;
		if (isset($_POST["editBanner"]))
		{
			$data = $_POST;
			$data = array_merge($data, [
				"image" => $this->saveImage("image"),
			]);
			$res = $this->model->edit($data, $index);
			if($res === true)
			{
				header("Location: /banner");
				return;
			}
			else
			{
				array_push($messages, $res);
			}
		}

		if (isset($_POST["deleteBanner"]))
		{
			$res = $this->model->delete($index);
			if($res === true)
			{
				header('Location: /banner');
				return;
			}
			array_push($messages, $res);
		}

		$data = $this->model->getDataOne($index);
		if(is_string($data))
		{
			array_push($messages, $data);
			$data = [];
		}

		$this->view->generate('view_banner_edit.php', $data);
	}

	private function saveImage($name)
	{
		if(!isset($_FILES[$name]))
		{
			return false;
		}
		$img = $_FILES[$name];
		if(!$img["name"])
		{
			return false;
		}
		$dir = "files/image/banners";
		$newName = $dir . time() . $img["name"];
		move_uploaded_file($img["tmp_name"], $newName);
		return "/" . $newName;
	}
}
