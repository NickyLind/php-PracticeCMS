<?php

require 'classes/Database.php';
require 'classes/Article.php';
require 'includes/url.php';

$db = new Database();
$conn = $db->getConn();

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
    redirect('/Demo/index.php');
  }
}
?>

<?php require 'includes/header.php'; ?>

<h2>Delete Article</h2>


<form method="post">
  <p>Are you sure you want to delete this article?</p>
  <button>Delete</button>
  <a href="/Demo/article.php?id=<?= $article->id; ?>">Cancel</a>
</form>

<?php require 'includes/footer.php'; ?>