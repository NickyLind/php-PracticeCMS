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
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    var_dump($_FILES);

    
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

        // Move file into temp folder
        $destination = "../uploads/" . $_FILES['file']['name'];

        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
            echo '<pre>';
            print_r("FILE MOVED");
            echo '</pre>';
        } else {
            throw new Exception('File couldn\'t be moved into temp folder');
        }

    } catch (Exception $e) {
        echo '<pre>';
        print_r($e->getMessage());
        echo '</pre>';
    }
}

?>
<?php require '../includes/header.php'; ?>

<h2>Edit article image</h2>

<form method="post" enctype="multipart/form-data">

    <div>
        <label for="file">Image file</label>
        <input type="file" name="file" id="file">
    </div>

    <button>Upload</button>

</form>

<?php require '../includes/footer.php'; ?>