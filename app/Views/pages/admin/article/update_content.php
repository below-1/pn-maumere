<?= $this->extend('templates/admin/base') ?>

<?= $this->section('custom-styles') ?>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('page-header') ?>
<div class="page-header d-print-none">
  <div class="row align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <div class="page-pretitle">
        Artikel
      </div>
      <h2 class="page-title">
        Tulis Artikel
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="d-flex">
        <button class="btn btn-primary" @click="save">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
          Simpan
        </button>
      </div>
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
        action="<?= current_url() ?>" class="card">
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input 
              name="title"
              class="form-control"
            />
          </div>
          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <?php foreach ($options_tags as $tag): ?>
              <div class="form-check">
                <input name="tags[]" class="form-check-input" type="checkbox" 
                  value="<?= $tag['name']?>"
                  <?php if ($tag['selected']): ?>
                    checked
                  <?php endif; ?>
                >
                <label class="form-check-label">
                  <?= $tag['label']?>
                </label>
              </div>
            <?php endforeach ?>
          </div>

          <input 
            id="article_content"
            name="content"
            hidden
          >
          <input 
            id="article_description"
            name="description"
            hidden
          >
        </div>
      </form>
    </div>
    <div class="col-12">
      <div class="card">
        <div id="editor">
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/quill-delta-to-html@0.12.0/dist/browser/QuillDeltaToHtmlConverter.bundle.js"></script>
  <script src="/js/vue.js"></script>
  <script>
    function getDescription (delta, maxLength) {
      let delta_obj = null;
      if (typeof delta === "string")
        delta_obj = JSON.parse(delta);
      else if (typeof delta === "object")
        delta_obj = delta;
      
      if (delta_obj === null || !"ops" in delta_obj) throw "Can't convert invalid Quill Delta to plaintext!";
      
      let plaintext = "";
      for (let i=0; i < delta_obj.ops.length; i++) {
        let op = delta_obj.ops[i];
        if (op.insert) {
          if (typeof op.insert === "string") {
            plaintext += op.insert.replace(/\s/g, ' ');;
            if (plaintext.length > 100) return plaintext;
          } else {
            plaintext += " ";
          }
        }
      }
      
      return plaintext;
    };

    var DATA_ops = <?= $item->content ?>;
    var ops = DATA_ops.ops;
    var quill = null;
    var vue = new Vue({
      el: '#main-app',
      data: {
        title: '<?= $item->title ?>'
      },
      mounted () {
        quill = new Quill('#editor', {
          theme: 'snow'
        });
        quill.setContents({ ops });
      },
      methods: {
        save () {
          const contents = quill.getContents();
          const plainText = getDescription(contents, 100);
          const content_field = document.getElementById('article_content');
          const description_field = document.getElementById('article_description');
          content_field.value = JSON.stringify(contents);
          description_field.value = plainText;
          const form = document.getElementById('article_form');
          form.submit();
        }
      }
    });
  </script>
<?= $this->endSection() ?>