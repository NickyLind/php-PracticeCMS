<!DOCTYPE html>
<html>
  <head>
    <title>My Blog</title>
    <meta charset="utf-8">
  </head>
  <body>
    <header>
      <h1>My Blog</h1>
    </header>
    <nav>
      <ul>
        <li><a href="/CMS/">Home</a></li>
        <?php if (Auth::isLoggedIn()): ?>

          <li><a href="/CMS/admin/">Admin</a></li>
          <li><a href="/CMS/logout.php">Log out</a></li>

        <?php else: ?>

          <li><a href="/CMS/login.php">Log in</a></li>

        <?php endif; ?>
      </ul>
    </nav>


    <main>