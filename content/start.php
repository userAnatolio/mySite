<?php

trait Helper
{
	private $name;
	private $age;
	
	public function getName()
	{
		return $this -> name;
	}
	
	public function getAge()
	{
		return $this -> age;
	}
}


class Country
{
	use Helper;
	
	private $population;
	function __construct($name, $age, $population)
	{
		$this -> name = $name;
		$this -> age = $age;
		$this -> population = $population;
	}
	
	public function getInfo()
	{
		echo 'Название страны: ' . $this -> getName() . '<br>';
		echo 'Возраст страны: ' . $this -> getAge() . '<br>';
		echo 'Население: ' . $this -> population . '<br>';
	}
}

$obj = new Country('Китай', 500, 1395380000);
$obj -> getInfo();
