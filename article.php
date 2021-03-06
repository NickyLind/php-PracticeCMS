<?php 

require 'includes/database.php';
require 'includes/article.php';

$conn = getDB();

if (isset($_GET['id'])) {

  $article = getArticle($conn, $_GET['id']);

} else {

  $article = null;

}

?>
<!-- Require all denied -->

<?php require 'includes/header.php' ?>
      <?php if ($article === null):  ?>
        <p>Article Not found.</p>
      <?php else: ?>
      <ul>
            <article>
              <h2><?= htmlspecialchars($article['title']); ?></h2>
              <p><?= htmlspecialchars($article['content']); ?></p>
            </article>
      </ul>
      <?php endif ?>

<?php require 'includes/footer.php' ?>