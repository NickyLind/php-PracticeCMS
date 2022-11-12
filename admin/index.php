<?php 

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

$articles = Article::getAll($conn);

?>
<?php require '../includes/header.php' ?>


<h2>Admin</h2>

<p><a href="new-article.php">New article</a></p>

      <?php if (empty($articles)):  ?>
        <p>No articles found</p>
      <?php else: ?>
      <table>
        <thead>
          <th>Articles</th>
        </thead>
        <tbody>
          <?php  foreach ($articles as $article): ?>
            <tr>
              <td>
                <a href="/CMS/admin/article.php?id=<?= $article['id'] ?>"><?=  htmlspecialchars($article['title']); ?></a>
              </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif ?>

<?php require '../includes/footer.php' ?>