<!DOCTYPE html>
<html>
  <head>
    <title>My Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <header>
        <h1>My Blog</h1>
      </header>
      <nav>
        <ul class="nav">
          <li class="nav-item"><a class="nav-link" href="/CMS/">Home</a></li>
          <?php if (Auth::isLoggedIn()): ?>

            <li class="nav-item"><a class="nav-link" href="/CMS/admin/">Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="/CMS/logout.php">Log out</a></li>

          <?php else: ?>

            <li class="nav-item"><a class="nav-link" href="/CMS/login.php">Log in</a></li>

          <?php endif; ?>
        </ul>
      </nav>


      <main>