<?= $this->extend('templates/admin/base') ?>

<?= $this->section('page-header') ?>
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Sidang
        </div>
        <h2 class="page-title">
          Daftar Sidang
        </h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="dropdown">
          <a href="/admin/sidang/new" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Tambah Sidang
          </a>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="table-responsive">
          <table class="table card-table datatable">
            <thead>
              <tr>
                <th></th>
                <th>Penggugat</th>
                <th>Tergugat</th>
                <th>Agenda</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($items as $item): ?>
                <tr>
                  <td>
                    <div class="font-weight-bold"><?= $item->nomor ?></div>
                    <div class="text-muted">ruangan: <?= $item->ruangan ?>,  <?= $item->waktu->toLocalizedString('HH:mm MMMM d, yyy') ?></div>
                  </td>

                  <td>
                    <?php foreach ($item->penggugat as $p): ?>
                      <div class="font-weight-bold"><?= $p ?></div>
                    <?php endforeach; ?>
                  </td>

                  <td>
                    <?php foreach ($item->tergugat as $t): ?>
                      <div class="font-weight-bold"><?= $t ?></div>
                    <?php endforeach; ?>
                  </td>
                  <td><?= $item->agenda ?></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-icon " data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="5" cy="12" r="1" /><circle cx="12" cy="12" r="1" /><circle cx="19" cy="12" r="1" /></svg>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow-show">
                        <a class="dropdown-item" href="/admin/sidang/<?= $item->id ?>/update">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg> edit
                        </a>
                        <a class="dropdown-item" href="/admin/sidang/<?= $item->id ?>/delete">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg> hapus
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center my-4">
    <?= $this->include('inc/pagination') ?>
  </div>
<?= $this->endSection() ?>