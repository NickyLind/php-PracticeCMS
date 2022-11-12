<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id']);

    if (!$article) {
        die("article not found");
    }

} else {
    die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if($article->delete($conn)) {
    Url::redirect('/CMS/admin/index.php');
  }
}
?>

<?php require '../includes/header.php'; ?>

<h2>Delete Article</h2>


<form method="post">
  <p>Are you sure you want to delete this article?</p>
  <button>Delete</button>
  <a href="/CMS/admin/article.php?id=<?= $article->id; ?>">Cancel</a>
</form>

<?php require '../includes/footer.php'; ?>