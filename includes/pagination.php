<?php $base = strtok($_SERVER['REQUEST_URI'], '?'); ?>

<nav>
  <ul class="pagination">
    <?php if ($paginator->previous): ?>
      <li class="page-item"><a class="page-link" href="<?= $base; ?>?page=<?= $paginator->previous; ?>">Previous</a></li>
    <?php else: ?>
      Previous
    <?php endif; ?>
    <?php if ($paginator->next): ?>
      <li class="page-item"><a class="page-link" href="<?= $base; ?>?page=<?= $paginator->next; ?>">Next</a></li>
    <?php else: ?>
      Next
    <?php endif; ?>
  </ul>
</nav>