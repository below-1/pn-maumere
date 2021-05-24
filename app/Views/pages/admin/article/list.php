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
          <a href="/admin/article/new?<?= $qsNewDefaultTags ?>" class="btn btn-primary">
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
        <div class="card-body">
          <template v-for="tag in tags">
            <div :key="`tag_${tag.name}`" class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" 
                :id="`tag_${tag.name}`"
                :value="tag.name"
                v-model="selected_tags">
              <label class="form-check-label" 
                :for="`tag_${tag.name}`">{{ tag.label }}</label>
            </div>
          </template>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="list-group card-list-group">
          <div 
            v-for="item in processed_items"
            :key="item.id"
            class="list-group-item">
            <div class="row g-2 align-items-center">
              <div class="col-auto text-center">
                <div class="d-none d-md-block">{{item.id}}</div>
                <div class="d-md-none">
                  <span v-if="item.published" class="badge bg-success me-1"></span>
                  <span v-else class="badge bg-warning me-1"></span>
                </div>      
              </div>
              <div class="col-auto">
                <img :src="item.avatar" class="rounded" alt="item.slug" width="40" height="40">
              </div>
              <div class="col">
                <span class="font-weight-bold">{{ item.title }}</span>
                <div class="d-none d-md-block">
                  <small>{{ item.humanized_created_at }}</small>
                  <em><small>, {{ item.formatted_created_at }}</small></em>
                </div>
              </div>
              <div class="col-auto d-none d-md-block">
                <span v-if="item.published" class="badge bg-success me-1"></span>
                <span v-else class="badge bg-warning me-1"></span>
              </div>
              <div class="col-auto lh-1">
                <div class="dropdown">
                  <a href="#" class="link-secondary" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="5" cy="12" r="1"></circle><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle></svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end" style="">
                    <a class="dropdown-item" 
                      href="/admin/upload_file?action=">
                      Edit Konten
                    </a>
                    <a class="dropdown-item" 
                      :href="item.upload_image_action_url">
                      Ganti Gambar
                    </a>
                    <a class="dropdown-item" 
                      :href="item.delete_url">
                      Hapus
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center my-4">
    <?= $this->include('inc/pagination') ?>
  </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
  <script src="/js/vue.js"></script>
  <script>
    // Construct upload_image action url
    function build_upload_image_action_url (item) {
      let DATA_id = item.id;
      let DATA_title = item.title;
      let ui_url = new URL('/admin/upload_file', window.location.origin);
      ui_url.searchParams.append('action', `/admin/article/${item.id}/upload_image`);
      ui_url.searchParams.append('title', `Ganti Gambar Artikel#${item.id} ${item.title}`);
      return ui_url.href;
    }

    var vue = new Vue({
      el: '#main-app',
      data: {
        items: <?= json_encode($items) ?>,
        tags: <?= json_encode($options_tags) ?>,
        selected_tags: <?= json_encode($tags) ?>
      },
      computed: {
        processed_items () {
          return this.items.map(item => {
            return {
              ...item,
              upload_image_action_url: build_upload_image_action_url(item),
              delete_url: `/admin/article/${item.id}/remove`
            }
          })
        }
      },
      watch: {
        selected_tags (newV, oldV) {
          const url = new URL(document.location);
          let current = url.searchParams;
          current.set('page', 1);
          current.delete('tags[]');
          newV.forEach(tag => {
            current.append('tags[]', tag);
          });
          window.location = url.pathname + '?' + current.toString();
        }
      }
    });
  </script>
<?= $this->endSection() ?>