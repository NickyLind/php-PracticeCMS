<?php 
require 'classes/Url.php';
require 'classes/User.php';
require 'classes/Database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $db = new Database();
  $conn = $db->getConn();
  if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
    //! regenerates new session ID to help prevent CSS attacks/session fixation attacks
    session_regenerate_id(true);
    $_SESSION['is_logged_in'] = true;
    Url::redirect('/Demo/index.php');
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