<?php 

require 'Item.php';

$myItem = new Item();

$myItem->name = "Example";
$myItem->description = "A new description";
$myItem->price = 2.99;

var_dump($myItem);

// $myItem2 = new Item();

// var_dump($myItem2);