<?php

/**
 * Category
 * 
 * Taxonomy for articles
 */
class Category
{
    /**
   * Get all the categories
   * 
   * @param object $conn Connection to the database
   * 
   * @return array An Associative array of all the category records
   */
  public static function getAll($conn)
  {
    $sql = "SELECT *
        FROM category
        ORDER BY id";

    $results = $conn->query($sql);

    return $results->fetchAll(PDO::FETCH_ASSOC);
  }
}