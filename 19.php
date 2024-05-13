<?php

class Person
{
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;

  function __construct($name, $lastname, $age, $mother = null, $father = null)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->hp = 100;
  }

  function sayHi($name)
  {
    return "Hi, $name, I`m " . $this->name;
  }

  function setHp($hp)
  {
    if ($this->hp + $hp > 100) $this->hp = 100;
    else $this->hp = $this->hp + $hp;
  }

  function getHp()
  {
    return $this->hp;
  }
  function getName()
  {
    return $this->name;
  }
  function getMother()
  {
    return $this->mother;
  }
  function getFather()
  {
    return $this->father;
  }
  function getInfo() {
    return "Меня зовут - " . $this->getName()
               . "<br>Мой папа - " . $this->getFather()->getName()
               . "<br>Моя мама - " . $this->getMother()->getName()
            . "<br>Мои дедушки - " . $this->getFather()->getFather()->getName() . " (по папе)" 
                           . " и " . $this->getMother()->getFather()->getName() . " (по маме)"
            . "<br>Мои бабушки - " . $this->getFather()->getMother()->getName() . " (по папе)" 
                           . " и " . $this->getMother()->getMother()->getName() . " (по маме)";             
  }
}

$igor = new Person("Igor", "Petrov", 78);
$zina = new Person("Zina", "Veter", 63);

$dima = new Person("Dima", "Lovkach", 67);
$elena = new Person("Lena", "Krasnaia", 66); 

$alex = new Person("Alex", "Ivanov", 42, $elena, $dima);
$olga = new Person("Olga", "Ivanova", 41, $zina, $igor);
$valera = new Person("Valera", "Ivanov", 12, $olga, $alex);

echo $valera->getInfo();
