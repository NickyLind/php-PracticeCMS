<?php 

require 'includes/database.php';

$errors = [];
$title = '';
$content = '';
$published_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $title = $_POST['title'];
  $content = $_POST['content'];
  $published_at = $_POST['published_at'];

  if($title == '') {
    $errors[] = 'Title is required';
  } 
  if ($content == '') {
    $errors[] = 'Content is required';
  }

  if ($published_at != '') {
    $date_time = date_create_from_format('Y-m-d H:i:s', $published_at);

    if ($date_time === false) {
      $errors[] ='Invalid date and time';
    } else {
      $date_errors = date_get_last_errors();

      if ($date_errors['warning_count'] > 0) {
        $errors[] = 'Invalid date and time';
      }
    }
  }

  if (empty($errors)) {
  
    $conn = getDB();
    
    $sql = "INSERT INTO article (title, content, published_at)
            VALUES (?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {

    echo mysqli_error($conn);

    } else {

      if ($published_at == '') {
        $published_at = null;
      }
      mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);

      if (mysqli_stmt_execute($stmt)) {

        $id = mysqli_insert_id($conn);
        // echo "Inserted record with ID: $id";
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
          $protocol = 'https';
        } else {
          $protocol = 'http';
        }

        header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/demo/article.php?id=$id");
        exit;

      } else {

        echo mysqli_stmt_error($stmt);

      }

      var_dump($sql);

    }
  }
}

?>

<?php require 'includes/header.php' ?>

<h2>New Article</h2>

<?php require 'includes/article-form.php' ?>

<?php require 'includes/footer.php' ?>
