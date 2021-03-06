<?php if (!empty($errors)): ?>
  <?php foreach($errors as $error): ?>
    <li><?= $error ?></li>
  <?php  endforeach;?>
<?php endif; ?>

<form action="" method="post">

  <div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article title" value="<?= htmlspecialchars($title); ?>">
  </div>

  <div>
    <label for="content">Content</label>
    <textarea name="content" id="content" cols="40" rows="4" placeholder="Article content"><?= htmlspecialchars($content); ?></textarea>
  </div>

  <div>
    <label for="pbulished_at">Publication date and time</label>
    <input type="text" name="published_at" id="published_at" value="<?= htmlspecialchars($published_at); ?>">
  </div>

  <button>Save Article</button>

</form>