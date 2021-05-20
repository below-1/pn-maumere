<!DOCTYPE html>
<html>
  <head>
    <?= $this->include('inc/admin/header') ?>
  </head>

  <body class="antialiased">
    <div class="page">
      <?= $this->include('inc/admin/top-bar') ?>
      <?= $this->include('inc/admin/nav-bar') ?>

      <div class="content">
        <div class="container-xl">
          <?= $this->renderSection('content') ?>
          <?= $this->include('inc/admin/footer') ?>
        </div>
      </div>
    </div>

    <?= $this->include('inc/admin/scripts') ?>
  </body>
</html>
