<?php 

require 'classes/Database.php';
require 'includes/auth.php';

session_start();

// create a new instance of out Database class and call the getConn() method we created on it
$db = new Database();
$conn = $db->getConn();

$sql = "SELECT *
        FROM article
        ORDER BY published_at";

// we can use the query method on PDOs and pass in the sql
$results = $conn->query($sql);

if (!$results) {
  // we can display an array of error information by calling the errorInfo() method on the database connection
  $conn->errorInfo();
} else {
  // the PDO method that returns our result set is fetchAll(). We pass in the FETCH_ASSOC constant to get our data back in an associative array
  $articles = $results->fetchAll(PDO::FETCH_ASSOC);
}

?>
<?php require 'includes/header.php' ?>


<?php if (isLoggedIn()): ?>

  <p>You are logged in. <a href="logout.php">Log out</a></p>
  <p><a href="new-article.php">New article</a></p>

<?php else: ?>

  <p>You are not logged in. <a href="login.php">Log in?</a></p>

<?php endif; ?>

      <?php if (empty($articles)):  ?>
        <p>No articles found</p>
      <?php else: ?>
      <ul>
        <?php  foreach ($articles as $article): ?>
          <li>
            <article>
              <h2><a href="article.php?id=<?= $article['id'] ?>"><?=  htmlspecialchars($article['title']); ?></a></h2>
              <p><?= htmlspecialchars($article['content']); ?></p>
            </article>
          </li>
          <?php endforeach; ?>
      </ul>
      <?php endif ?>

<?php require 'includes/footer.php' ?>