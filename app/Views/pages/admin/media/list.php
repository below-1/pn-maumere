<?= $this->extend('templates/admin/base') ?>

<?= $this->section('custom-styles') ?>
<style>
</style>
<?= $this->endSection('custom-styles') ?>

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
      <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
          <a href="<?= $pageMeta->new_form_url ?>" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Tambah <?= $pageMeta->name ?>
          </a>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="row row-deck row-cards">

    <?php foreach ($items as $item): ?>
      <div class="col-sm-6 col-lg-4">
        <div class="card card-sm">
          <div class="card-header">
            <h3 class="card-title text-center font-weight-bold"><?= $item->metadata->title ?></h3>
          </div>
          <img src="<?= $item->url ?>" class="card-img" style="max-height: 200px;"/>
          <div class="card-footer">
            <a class="btn btn-icon btn-info me-3 btn-sm" href="/admin/media/<?= $pageMeta->name ?>/<?= $item->id ?>/update_info">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
            </a>

            <a class="btn btn-icon btn-success me-3 btn-sm" href="/admin/media/<?= $item->id ?>/update_media">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="15" y1="8" x2="15.01" y2="8" /><rect x="4" y="4" width="16" height="16" rx="3" /><path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" /><path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" /></svg>
            </a>

            <a class="btn btn-icon btn-danger btn-sm me-3" href="/admin/media/<?= $item->id ?>/delete">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
            </a>

          </div>
        </div>
      </div>
    <?php endforeach ?>
    <?= $this->include('inc/pagination') ?>
  </div>
<?= $this->endSection() ?>