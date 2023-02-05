<?php 
require 'includes/init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $conn = require 'includes/db.php';
  if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {

    Auth::login();

    Url::redirect('/CMS/index.php');
    
  } else {
    $error = "login incorrect";
  }
}

// $_SESSION['is_logged_in'] = true;


?>

<?php require 'includes/header.php' ?>

<h2>Login</h2>
<?php if(!empty($error)): ?>
  <p><?= $error; ?></p>
<?php endif; ?>

<form method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input name="username" id="username" class="form-control">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control">
  </div>
  <button class="btn btn-primary">Login</button>
</form>

<?php require 'includes/footer.php' ?>