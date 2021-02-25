<?php

class Pager{
	private $page = 0;
	private $size = 10;
	private $countPage = 10;

	public function __construct(int $page = 0, int $size = 10)
	{
		$this->start = $page;
		$this->size = $size;
	}

	private final function getLink(){
		$out = '<div>';
		if($this->page != 0)
		{
			$out .= '<a href="?' . ($this->page - 1) . '">лево<a>';
		}
		for ($i = 0; $i < $this->countPage; $i++)
		{
			if($i == 0)
			{
				;
			}
			else
			{
				$out .= '<a href="?' . ($this->page + $i) . '"> ' . ($this->page + $i) . ' <a>';
			}
		}
		if($this->page != $this->countPage)
		{
			$out .= '<a href="?' . ($this->page + 1) . '">право<a>';
		}
		$out .= '</div>';
		return $out;
	}

	public final function getPage(){
		$out = $this->getLink();
		$out .= $this->getLink();
		return $out;
	}
}

$pager = new Pager();
echo $pager->getPage();
