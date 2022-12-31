<?php

// phpinfo();
//? shows alls erver data when this page is loaded

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {    
        if(empty($_FILES)) {
            throw new Exception('Invalid Upload');
        }

        switch ($_FILES['file']['error']) {
            case 0:
                break;
            case 1:
                throw new Exception('File upload size has been exceeded');
            case 4:
                throw new Exception('No file uploaded');
                break;
            default:
                throw new Exception('An error occured');
                break;
        }

        // restrict the file size
        if($_FILES['file']['size'] > 1000000000) {
            throw new Exception('File upload size has been exceeded');
        }
        
        
        // opens the file info, checks the MIME type based on the tmp_name, then checks it against our allowed MIME types
        $mime_types = ['image/gif', 'image/png', 'image/jpeg'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['file']['tmp_name']);

        if(!in_array($mime_type, $mime_types)) {
            throw new Exception('File type is not supported');
        }

        
        // sanitize name of file
        $pathinfo = pathinfo($_FILES["file"]["name"]);
        
        $base = $pathinfo['filename'];
        
        $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);

        $base = mb_substr($base, 0, 200);
        
        $filename = $base . "." . $pathinfo['extension'];

        // Move file into temp folder
        $destination = "../uploads/$filename";

        $i = 1;

        // check for same filename in uploads
        while (file_exists($destination)) {
            $filename = $base . "-$i" . "." . $pathinfo['extension'];
            $destination = "../uploads/$filename";
            $i++;
        }

        // send filename to DB and redirect back to article index
        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {

            $previous_image = $article->image_file;

            if ($article->setImageFile($conn, $filename)) {

                if ($previous_image) {
                    unlink("../uploads/$previous_image");
                }
                Url::redirect("/CMS/admin/edit-article-image.php?id={$article->id}");
            }


        } else {
            throw new Exception('File couldn\'t be moved into temp folder');
        }

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

?>
<?php require '../includes/header.php'; ?>

<h2>Edit article image</h2>

    <?php if ($article->image_file): ?>
        <img src="/CMS/uploads/<?= $article->image_file; ?>" alt="" style="max-width: 768px">
        <a href="delete-article-image.php?id=<?= $article->id; ?>">Delete Image</a>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <h2><?= $error; ?></h2>
    <?php endif; ?>

<form method="post" enctype="multipart/form-data">

    <div>
        <label for="file">Image file</label>
        <input type="file" name="file" id="file">
    </div>

    <button>Upload</button>

</form>

<?php require '../includes/footer.php'; ?>
