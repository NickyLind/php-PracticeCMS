<?php 

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {

  $article = Article::getWithCategories($conn, $_GET['id']);

} else {

  $article = null;

}

?>

<?php require '../includes/header.php' ?>
      <?php if ($article):  ?>
        <article>
          <h2><?= htmlspecialchars($article[0]['title']); ?></h2>

          <?php if ($article[0]['category_name']): ?>
            <h3 style="margin-bottom: 0px;">Categories:</h3>
            <div class="category-container" style="display: flex; column-gap: 15px;">
              <?php foreach ($article as $category): ?>
                <h4 style="border: 1px solid black; padding: 5px 10px; border-radius: 25px"><?= $category['category_name']; ?></h4>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <?php if ($article[0]['image_file']): ?>
            <img src="/CMS/uploads/<?= $article[0]['image_file']; ?>" alt="" style="max-width: 768px">
          <?php endif; ?>
          <p><?= htmlspecialchars($article[0]['content']); ?></p>
        </article>
        
        <a href="edit-article.php?id=<?= $article[0]['id']; ?>">Edit</a>
        <a class="delete-article" href="delete-article.php?id=<?= $article[0]['id']; ?>">Delete</a>
        <a href="edit-article-image.php?id=<?= $article[0]['id']; ?>">Edit Image</a>
        
        <?php else: ?>
          <p>Article Not found.</p>
        <?php endif ?>
            
<?php require '../includes/footer.php' ?>