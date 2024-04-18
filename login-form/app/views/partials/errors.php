<?php if (isset($errors)) : ?>
  <?php foreach ($errors as $error) : ?>
    <div class="text-bg-danger  my-3"><?= $error ?> </div>
  <?php endforeach; ?>
<?php endif; ?>