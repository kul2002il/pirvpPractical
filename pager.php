<?php

class Pager{
	private $page = 0; // Номер открытой страницы.
	private $size = 10; // Элементов на страницу.
	private $countPage = 10; // Количество страниц.
	private $data = []; // Массив данных на вывод.

	public final function __construct(int $page = 0, int $size = 3)
	{
		$this->page = $page;
		$this->size = $size;
	}

	private final function update()
	{
		$this->data = $this->loadData();
		$this->countPage = ceil(count($this->data) / $this->size);
	}

	public final function show()
	{
		echo $this->getPage();
	}

	public final function getPage(){
		$this->update();
		$links = $this->getLink();
		$out = $links;
		for ($i = $this->page * $this->size; $i < ($this->page + 1) * $this->size && $i < count($this->data); $i++)
		{
			$out .= $this->getArticle($i);
		}
		$out .= $links;
		return $out;
	}

	private final function getLink(){
		$out = '<div>';
		if($this->page != 0)
		{
			$out .= '<a href="?page=' . ($this->page - 1) . '">лево</a>';
		}
		else
		{
			$out .= '<span">лево</span>';
		}
		$out .= '<span> ' . ($this->page + 1) . '/' . $this->countPage . ' </span>';
		for ($i = 0; $i < $this->countPage; $i++)
		{
			if($i == $this->page)
			{
				$out .= '<span> ' . ($i+1) . ' </span>';
			}
			else
			{
				$out .= '<a href="?page=' . ($i) . '"> ' . ($i+1) . ' </a>';
			}
		}
		if($this->page < $this->countPage - 1)
		{
			$out .= '<a href="?page=' . ($this->page + 1) . '">право</a>';
		}
		else
		{
			$out .= '<span">право</span>';
		}
		$out .= '</div>';
		return $out;
	}

	protected function getArticle($number)
	{
		$out = "<article>";
		$out .= $this->getData($number);
		$out .= "</article>";
		return $out;
	}

	public final function getData($index)
	{
		return $this->data[$index];
	}

	public function loadData($args = [])
	{
		return [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
	}
}

