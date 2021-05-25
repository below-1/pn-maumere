<?= $this->extend('templates/admin/base') ?>

<?= $this->section('page-header') ?>
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Media
        </div>
        <h2 class="page-title">
          List Media
        </h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="dropdown">
          <button class="btn btn-primary" data-bs-toggle="dropdown" aria-label="buka menu tambah media">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Tambah Media
          </button>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow-show">
            <?php foreach ($metaPairs as $key => $value): ?>
              <a class="dropdown-item" href="/admin/media/<?= $value['tipe'] ?>/<?= $value['name'] ?>/new">
                <span class="text-capitalize text-muted badge me-2"><?= $value['tipe'] ?> </span> <?= $value['label'] ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="row">
    <div class="col-3">
      <form action="" method="get">
        <div class="subheader mb-2">Tipe</div>
        <div class="mb-3">
          <label class="form-check mb-2">
            <input type="radio" class="form-check-input" name="tipe" value="all" checked>
            <span class="form-check-label">Semua</span>
          </label>
          <?php foreach ($options_tipes as $_tipe): ?>
            <label class="form-check mb-2">
              <input type="radio" class="form-check-input" name="tipe" 
                value="<?= $_tipe['name'] ?>" 
                <?php if ($tipe == $_tipe['name']): ?>
                  checked
                <?php endif; ?>
              >
              <span class="form-check-label text-capitalize">
                <?= $_tipe['icon'] ?>
                <?= $_tipe['label'] ?>
              </span>
            </label>
          <?php endforeach; ?>
        </div>
        <div class="subheader mb-2">Tag</div>
        <div class="mb-3">
          <label class="form-check mb-2">
            <input type="radio" class="form-check-input" name="tag" value="all" checked>
            <span class="form-check-label text-capitalize">semua</span>
          </label>
          <?php foreach ($options_tags as $_tag): ?>
            <label class="form-check mb-2">
              <input type="radio" class="form-check-input" name="tag" 
                value="<?= $_tag['name'] ?>" 
                <?php if ($tag == $_tag['name']): ?>
                  checked
                <?php endif; ?>
              >
              <span class="form-check-label text-capitalize"><?= $_tag['label'] ?></span>
            </label>
          <?php endforeach; ?>
        </div>
        <div class="mt-5">
          <button class="btn btn-primary w-100">
            Confirm changes
          </button>
          <button type="reset" class="btn btn-link w-100">
            Reset to defaults
          </button>
        </div>
      </form>
    </div>
    <div class="col-9">
      <div class="row row-cards">

        <?php foreach ($items as $item): ?>
          <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
              <div class="card-header">
                <div>
                  <span class="font-weight-bold"><?= $item->tipe ?></span>
                  <span><?= implode(' , ', $item->tags) ?></span>
                </div>
              </div>
              <div>
                <img src="<?= $item->url ?>" class="card-img">
              </div>
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="ms-auto">
                    <a href="<?= $item->ui_href ?>" class="text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="3" y1="3" x2="21" y2="21" /><line x1="15" y1="8" x2="15.01" y2="8" /><path d="M19.121 19.122a3 3 0 0 1 -2.121 .878h-10a3 3 0 0 1 -3 -3v-10c0 -.833 .34 -1.587 .888 -2.131m3.112 -.869h9a3 3 0 0 1 3 3v9" /><path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M16.32 12.34c.577 -.059 1.162 .162 1.68 .66l2 2" /></svg>
                    </a>
                    <a href="<?= $item->uc_href ?>" class="text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><rect x="9" y="3" width="6" height="4" rx="2" /></svg>
                    </a>
                    <a href="<?= $item->del_href ?>" class="text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
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
<?= $this->endSection() ?>