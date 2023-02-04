<?php 

require '../includes/init.php';
// require realpath(dirname(__FILE__) . '../includes/init.php');

Auth::requireLogin();

$conn = require '../includes/db.php';

$article = Article::getByID($conn, $_POST['id']);

$published_at = $article->publish($conn);

?>

<time><?= $published_at; ?></time>