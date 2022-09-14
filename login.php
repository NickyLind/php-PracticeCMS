<?php 
require 'includes/url.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST['username'] == 'DicklessMotherBitch' && $_POST['password'] == 'secret') {
    $_SESSION['is_logged_in'] = true;
    redirect('/Demo/index.php');
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
  <div>
    <label for="username">Username</label>
    <input name="username" id="username">
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
  </div>
  <button>Login</button>
</form>

<?php require 'includes/footer.php' ?>