<?= $this->extend('templates/admin/base') ?>

<?= $this->section('page-header') ?>
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Artikel
        </div>
        <h2 class="page-title">
          Listing Artikel
        </h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
          <a href="/admin/article/new?tag=<?= $tag ?>" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Tambah Artikel
          </a>
        </div>
      </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="row row-deck row-cards">
    <div class="col-12">
      <div class="card">
        <div class="list-group card-list-group">
          <?php foreach ($items as $item): ?>
            <div class="list-group-item">
              <div class="row g-2 align-items-center">
                <div class="col-auto text-center">
                  <div class="d-none d-md-block"><?= $item->id ?></div>
                  <div class="d-md-none">
                    <?php if ($item->published): ?>
                      <span class="badge bg-success me-1"></span>
                    <?php else: ?>
                      <span class="badge bg-warning me-1"></span>
                    <?php endif; ?>
                  </div>      
                </div>
                <div class="col-auto">
                  <img src="<?= $item->avatar ?>" class="rounded" alt="Górą ty" width="40" height="40">
                </div>
                <div class="col">
                  <span class="font-weight-bold"><?= $item->title ?></span>
                  <div class="d-none d-md-block">
                    <span class="text-muted font-weight-bold">[<?= $item->created_at->toLocalizedString('HH:mm MMM d, yyyy') ?>]</span>
                    <span class="text-muted"><?= $item->created_at->humanize() ?></span>
                  </div>
                </div>
                <div class="col-auto d-none d-md-block">
                  <?php if ($item->published): ?>
                    <span class="badge bg-success me-1"></span>
                  <?php else: ?>
                    <span class="badge bg-warning me-1"></span>
                  <?php endif; ?>
                </div>
                <div class="col-auto lh-1">
                  <div class="dropdown">
                    <a href="#" class="link-secondary" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="5" cy="12" r="1"></circle><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" style="">
                      <a class="dropdown-item" href="/admin/article/<?= $item->id ?>/update/content">
                        Edit Konten
                      </a>
                      <a class="dropdown-item" href="/admin/article/<?= $item->id ?>/update/media">
                        Edit Media
                      </a>
                      <a class="dropdown-item" href="/admin/article/<?= $item->id ?>/remove">
                        Hapus
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center my-4">
    <?= $this->include('inc/pagination') ?>
  </div>
<?= $this->endSection() ?>