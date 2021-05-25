<?= $this->extend('templates/admin/media_form_base') ?>

<?= $this->section('form') ?>
  <div class="mb-3">
    <label class="form-label">Target</label>
    <input 
      name="target"
      type="text"
      class="form-control"
      <?php if (isset($item)): ?>
        value="<?= $item->metadata->target ?>"
      <?php endif; ?>
    >
  </div>

  <div class="mb-3">
    <label class="form-label">Title</label>
    <input 
      name="title"
      type="text"
      class="form-control"
      <?php if (isset($item)): ?>
        value="<?= $item->metadata->title ?>"
      <?php endif; ?>
    />
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" 
      name="description"><?php if (isset($item)): ?><?= $item->metadata->description ?><?php endif; ?></textarea>
  </div>
<?= $this->endSection() ?>