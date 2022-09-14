<?php 

class Book extends Item
{
  public $author;
  
  // here we overwrite the getListingDescription from the parent's version to add 'by the $author' to it.
  public function getListingDescription()
  {
    // we can access the parent's version of the original method by using 'parent::METHODNAME'
    return parent::getListingDescription() . ' by ' . $this->author;
  }
}

// Using this method of overwriting the method, then calling the original parent method is useful because any changes we make to the original parent method will then be included into the child overwritted method (how we added 'Item: ' to the parent's method)


?>