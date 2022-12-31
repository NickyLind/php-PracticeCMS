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

echo '<pre>';
$category_ids = array_column($article->getCategories($conn), 'id');
echo '</pre>';
$categories = Category::getAll($conn);
echo '<pre>';
print_r($categories);
echo '</pre>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];


    if ($article->update($conn)) {
        Url::redirect("/CMS/admin/article.php?id={$article->id}");
    }
}

?>
<?php require '../includes/header.php'; ?>

<h2>Edit article</h2>

<?php require './includes/article-form.php'; ?>

<?php require '../includes/footer.php'; ?>
