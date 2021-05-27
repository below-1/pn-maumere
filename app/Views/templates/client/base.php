<!DOCTYPE html>
<html>
  <head>
    <?= $this->include('inc/client/header') ?>
  </head>

  <body class="antialiased">
    <div class="page" id="main-app">
      <?= $this->include('inc/client/top-bar') ?>
      <?= $this->include('inc/client/nav-bar') ?>

      <?= $this->renderSection('precontent') ?>

      <div class="content">
        <div class="container-xl">
          <?= $this->renderSection('content') ?>
          <?= $this->include('inc/client/footer') ?>
        </div>
      </div>
    </div>

    <?= $this->include('inc/client/scripts') ?>
    <?= $this->renderSection('scripts') ?>
  </body>
</html>
