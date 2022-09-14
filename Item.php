<?php 

class Item
{
  public $name;
  public $description = "This is the default";

  // the static access modifier makes it so a property can be accessed without instantiating the class
  public static $count = 0;

  function __construct($name, $description)
  {
    $this->name = $name;
    $this->description = $description;

    // need to use 'static::' before the static property to access it
    static::$count++;
  }
  
  public function sayHello() {
    echo "Hello";
  }

  public function getName()
  {
    return $this->name;
  }

  public static function showCount()
  {
    echo static::$count;
  }
}

