<form 
  id="carousel_form"
  class="card needs-validation"
  method="post"
  action="<?= $metaMedia->action ?>"
  enctype="multipart/form-data"
>
  <?= csrf_field() ?>
  <div class="card-header">Input Data <?= $metaMedia->label ?></div>
  <div class="card-body">
    <div class="mb-3">
      <label class="form-label">Pilih Foto</label>
      <input 
        name="file"
        type="file"
        accept=".gif,.jpg,.jpeg,.png"
        class="form-control"
      >
    </div>

    <div class="mb-3">
      <label class="form-label">Target</label>
      <input 
        name="target"
        type="text"
        class="form-control"
      >
    </div>

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input 
        name="title"
        type="text"
        class="form-control"
      />
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" name="description"></textarea>        
    </div>
  </div>
  <div class="card-footer">
    <button 
      type="submit" 
      class="btn btn-primary">Submit</button>
  </div>
</form>