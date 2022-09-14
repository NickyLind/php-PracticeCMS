<?php 

require 'Item.php';

// to refer to a static property outside of an instantiation of the class we need to use the class name followed by 2 colons
Item::showCount();

$myItem = new Item("Fig ol Bitties", "Toight");

$myItem->name = "A new name";

Item::showCount();

echo $myItem->name;

$myItem2 = new Item("test", "testing");

Item::showCount();