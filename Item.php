<?php

class Item
{
  public $name;

  // private properties are only available inside the ITEM class, not in CHILD classes (Book)
  // private $code = 1234;
  
  // protected methods are accessable in current and subclasses (children e.g. Book)
  protected $code = 1234;

  public function getListingDescription()
  {
    return "Item: " .  $this->name;
  }

}