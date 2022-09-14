<?php 

/**
 * Article
 * 
 * A piece of writing for publication
 */
class Article
{
  /**
   * Unique Identifier
   * @var integer
   */
  public $id;

  /**
   * The article title
   * @var string
   */
  public $title;

  /**
   * The article content
   * @var string
   */
  public $content;

  /**
   * The publication date and time
   * @var string
   */
  public $published_at;
  /**
   * Get all the articles
   * 
   * @param object $conn Connection to the database
   * 
   * @return array An Associative array of all the article records
   */
  public static function getAll($conn)
  {
    $sql = "SELECT *
        FROM article
        ORDER BY published_at";

    $results = $conn->query($sql);

    return $results->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
 * Get the article record based on the ID
 * 
 * @param object $conn Connection to database
 * @param integer $id the article ID
 * @param array $columns Optional list of columns for the select, defaults to *
 * 
 * @return mixed An object of this class, or null if not found
 */
  public static function getByID($conn, $id, $columns = '*')
  {
    $sql = "SELECT $columns
            FROM article
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

    if ($stmt->execute()) {
      return $stmt->fetch();
    }
  }
}