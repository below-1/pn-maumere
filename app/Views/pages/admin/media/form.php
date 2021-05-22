<?= $this->extend('templates/admin/base') ?>

<?= $this->section('page-header') ?>
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          <?= $pageMeta->preTitle ?>
        </div>
        <h2 class="page-title">
          <?= $pageMeta->title ?>
        </h2>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row row-deck row-cards">
      <div class="col-sm-12 col-lg-6">
        <?= $this->include('inc/form/' . $pageMeta->name) ?>
      </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
  <!-- Form Validations -->
  <script src="/libs/pristine/pristine.js"></script>
  <script src="/js/form/<?= $pageMeta->name ?>.js"></script>
<?= $this->endSection() ?>