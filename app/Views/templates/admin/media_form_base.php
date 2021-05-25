<!DOCTYPE html>
<html>
  <head>
    <?= $this->include('inc/admin/header') ?>
    <?= $this->renderSection('custom-styles') ?>
  </head>

  <body class="antialiased">
    <div class="page" id="main-app">
      <?= $this->include('inc/admin/top-bar') ?>
      <?= $this->include('inc/admin/nav-bar') ?>

      <div class="content">
        <div class="container-xl">
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Media
                </div>
                <h2 class="page-title">
                  <?= $formType ?> <?= $metaMedia->label ?>
                </h2>
              </div>
            </div>
          </div>
          <div class="row row-deck row-cards">
            <div class="col-sm-12 col-lg-6">
              <form 
                id="carousel_form"
                class="card needs-validation"
                method="post"
                action="<?= $metaMedia->action ?>"
                enctype="multipart/form-data"
              >
                <?= csrf_field() ?>
                <div class="card-header">Input data <?= $metaMedia->label ?></div>
                <div class="card-body">
                  <?php if ($type == 'picture' && $formType == 'tambah'): ?>
                    <div class="mb-3">
                      <label class="form-label">Pilih Foto</label>
                      <input
                        name="file"
                        type="file"
                        accept=".gif,.jpg,.jpeg,.png"
                        class="form-control"
                      />
                    </div>
                  <?php endif; ?>
                  <?= $this->renderSection('form') ?>
                </div>
                <div class="card-footer">
                </div>
                <button 
                  type="submit" 
                  class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <?= $this->include('inc/admin/footer') ?>
        </div>
      </div>
    </div>

    <?= $this->include('inc/admin/scripts') ?>
    <?= $this->renderSection('scripts') ?>
  </body>
</html>
