<?php 

require 'Item.php';

$myItem = new Item();
$myItem->name = "Nickless Dickerson";

echo $myItem->getName();

$myItem2 = new Item();

$myItem2->name = "PoopyPants";

echo $myItem2->getName();