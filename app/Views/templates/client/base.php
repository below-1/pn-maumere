<!DOCTYPE html>
<html>
  <head>
    <?= $this->include('inc/client/header') ?>
  </head>
  <body>
    <div id="all">
      <?= $this->include('inc/client/top-bar') ?>
      <?= $this->include('inc/client/nav-bar') ?>
      <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('inc/client/scripts') ?>
  </body>
</html>
