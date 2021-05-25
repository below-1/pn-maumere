<?= $this->extend('templates/admin/media_form_base') ?>

<?= $this->section('form') ?>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input 
      name="nama"
      type="text"
      class="form-control"
      <?php if (isset($item)): ?>
        value="<?= $item->metadata->nama ?>"
      <?php endif; ?>
    >
  </div>

  <div class="mb-3">
    <label class="form-label">Tahun</label>
    <input 
      name="tahun"
      type="number"
      min="2010"
      class="form-control"
      <?php if (isset($item)): ?>
        value="<?= $item->metadata->tahun ?>"
      <?php endif; ?>
    />
  </div>
<?= $this->endSection() ?>