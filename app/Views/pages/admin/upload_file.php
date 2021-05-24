<?= $this->extend('templates/admin/base') ?>

<?= $this->section('page-header') ?>
<div class="page-header d-print-none">
  <div class="row align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <div class="page-pretitle">
        File
      </div>
      <h2 class="page-title">
        <?= $title ?>
      </h2>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="row row-deck row-cards">
    <div class="col-md-9 col-12">
      <form 
        id="article_form"
        method="post" 
        enctype="multipart/form-data" 
        action="<?= $action ?>" class="card">
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Avatar</label>
            <input 
              name="avatar"
              type="file"
              accept=".gif,.jpg,.jpeg,.png"
              class="form-control"
            >
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
<?= $this->endSection() ?>