<?php 

require 'Item.php';
require 'Book.php';

$myItem = new Item();
$myItem->name = "TV";

echo $myItem->getListingDescription();

echo "</br>";

$myBook = new Book();

$myBook->name = "Interview with a Vampire";

echo $myBook->getListingDescription();