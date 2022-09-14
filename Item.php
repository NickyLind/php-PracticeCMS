<?php 

class Item
{
  // we need to use the const keyword to define a constant in a class. Constants are typically defined in the type of the class
  public CONST MAX_LENGTH = 24;
  public $name;
  public $description;

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }
}

