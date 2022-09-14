<?php 

class Item
{
  // public keyword is used to set the visibility of the property
  private $name;
  private $description = "This is the default";

  function __construct($name, $description)
  {
    $this->name = $name;
    $this->description = $description;
  }
  
  public function sayHello() {
    echo "Hello";
  }

  private function getName()
  {
    return $this->name;
  }
}

