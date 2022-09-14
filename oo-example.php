<?php 

require 'Item.php';

$myItem = new Item();

$count = 0;

$count++;

define('MAXIMUM', 100);

define("COLOUR", 'RED');

// we access class constants the same way we access static values
echo Item::MAX_LENGTH;