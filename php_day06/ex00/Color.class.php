<?php
 class color{
	static $verbose;

	public $red;
 	public $green;
	public $blue;
	
	public function __construct($rgb)
	{
		if(isset($rgb['rgb']))
		{
			$tmp = intval($rgb['rgb']);
			$this->red = ($tmp >> (8*0)) & 255;
			$this->green = ($tmp <<(8*1)) & 255;
			$this->blue = ($tmp <<(8*2)) & 255;
		}
		else
		{
			$this->red = int($rgb['red']);
			$this->green = int($rgb['green']);
			$this->blue = int($rgb['blue']);
		}
	}
	public function __destruct($rgb)
	{
		echo "destroying".$rgb."\n";
	}

	public function __toString($rgb)
	{
	}
?>