<?php 

require 'includes/init.php';

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn, true));
//? null coalescing operator

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);

?>
<?php require 'includes/header.php' ?>

      <?php if (empty($articles)):  ?>
        <p>No articles found</p>
      <?php else: ?>
      <ul id="index">
        <?php  foreach ($articles as $article): ?>
          <li>
            <article>
              <h2><a href="article.php?id=<?= $article['id'] ?>"><?=  htmlspecialchars($article['title']); ?></a></h2>

              <time datetime="<?= $article['published_at']; ?>">published: <?php
                $datetime = new DateTime($article['published_at']);
                echo $datetime->format("j F, Y");?>
              </time>

              <?php if ($article['category_names']): ?>
                <p>Categories:</p>
                <?php foreach ($article['category_names'] as $categoryName): ?>
                  <?= htmlspecialchars($categoryName); ?>
                <?php endforeach; ?>
              <?php endif; ?>

              <p><?= htmlspecialchars($article['content']); ?></p>
            </article>
          </li>
          <?php endforeach; ?>
      </ul>
      
      <?php require './includes/pagination.php' ?>

      <?php endif ?>

<?php require 'includes/footer.php' ?>