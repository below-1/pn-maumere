<?= $this->extend('templates/client/base') ?>

<?= $this->section('content') ?>
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Artikel
        </div>
        <h2 class="page-title">
          <?= $item->title ?>
        </h2>
      </div>
    </div>
  </div>
  <div class="row row-deck row-cards">
    <div class="col-md-9 col-12">
      <div class="card">
        <img class="card-img-top" src="<?= $item->avatar ?>" />
        <div class="card-header">
          <div class="card-title"><?= $item->title ?></div>
        </div>
        <div class="card-body" id="article-content" v-html="contents">
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
  <script src="https://cdn.jsdelivr.net/npm/quill-delta-to-html@0.12.0/dist/browser/QuillDeltaToHtmlConverter.bundle.js"></script>
  <script src="/js/vue.js"></script>
  <script>
    var vue = new Vue({
      el: '#main-app',
      data: {
        contents: ''
      },
      mounted () {
        const deltas = <?= $item->content->value ?>;
        const converter = new QuillDeltaToHtmlConverter(deltas.ops, {});
        this.contents = converter.convert();
      }
    });
  </script>
<?= $this->endSection() ?>