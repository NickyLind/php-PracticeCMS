<?php 

class Item
{
  // public keyword is used to set the visibility of the property
  public $name;
  public $description = "This is the default";

  function __construct($name, $description)
  {
    $this->name = $name;
    $this->description = $description;
  }
  
  function sayHello() {
    echo "Hello";
  }

  function getName()
  {
    return $this->name;
  }
}

