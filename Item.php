<?php 

class Item
{
  // public keyword is used to set the visibility of the property
  public $name;
  public $description = "This is the default";
  
  function sayHello() {
    echo "Hello";
  }

  function getName()
  {
    return $this->name;
  }
}

