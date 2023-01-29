<?php if (!empty($article->errors)): ?>
  <?php foreach($article->errors as $error): ?>
    <li><?= $error ?></li>
  <?php  endforeach;?>
<?php endif; ?>

<form action="" method="post" id="formArticle">

  <div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article title" value="<?= htmlspecialchars($article->title); ?>">
  </div>

  <div>
    <label for="content">Content</label>
    <textarea name="content" id="content" cols="40" rows="4" placeholder="Article content"><?= htmlspecialchars($article->content); ?></textarea>
  </div>

  <div>
    <label for="pbulished_at">Publication date and time</label>
    <input type="text" name="published_at" id="published_at" value="<?= htmlspecialchars($article->published_at); ?>">
  </div>

  <fieldset>
    <legend>Categories</legend>

    <?php foreach ($categories as $category): ?>
      <div class="category">
        <input 
          type="checkbox" 
          name="category[]" 
          id="<?= $category['id']; ?>" 
          value="<?= $category['id']; ?>"
          <?php if(in_array($category['id'], $category_ids)): ?>checked<?php endif; ?>
          >
        <label for="<?= $category['id']; ?>"> <?= htmlspecialchars($category['name']); ?></label>
      </div>
    <?php endforeach; ?>
  </fieldset>

  <button>Save Article</button>

</form>