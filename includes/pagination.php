<?php $base = strtok($_SERVER['REQUEST_URI'], '?'); ?>

<nav>
  <ul>
    <?php if ($paginator->previous): ?>
      <li><a href="<?= $base; ?>?page=<?= $paginator->previous; ?>">Previous</a></li>
    <?php else: ?>
      Previous
    <?php endif; ?>
    <?php if ($paginator->next): ?>
      <li><a href="<?= $base; ?>?page=<?= $paginator->next; ?>">Next</a></li>
    <?php else: ?>
      Next
    <?php endif; ?>
  </ul>
</nav>