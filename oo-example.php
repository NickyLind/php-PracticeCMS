<?php 

require 'Item.php';
require 'Book.php';

$myItem = new Item();

echo $myItem->code;

$myBook = new Book();

echo $myBook->getCode();