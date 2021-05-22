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
          Tambah Carousel
        </h2>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div id="vue-app" class="row row-deck row-cards">
      <div class="col-sm-12 col-lg-6">
        <validation-observer v-slot="{ invalid }" slim>
          <form 
            id="carousel_form"
            class="card needs-validation"
            method="post"
            action="<?= $pageMeta->action ?>"
            enctype="multipart/form-data"
          >
            <?= csrf_field() ?>
            <div class="card-header">Input data Carousel</div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Pilih Foto</label>
                <validation-provider name="Foto" rules="required" v-slot="v">
                  <input 
                    name="file"
                    type="file"
                    accept=".gif,.jpg,.jpeg,.png"
                    class="form-control"
                    @change="setFile"
                    v-bind:class="[ (v.errors[0] || !item.file) ? 'is-invalid' : 'is-valid' ]"
                  >
                  <div v-if="!!v.errors[0]" class="invalid-feedback">{{ v.errors[0] }}</div>
                  <div v-if="!item.file" class="invalid-feedback">Foto Harus Diisi</div>
                </validation-provider>
              </div>

              <div class="mb-3">
                <label class="form-label">Target</label>
                <validation-provider name="Target URL" rules="required" v-slot="v">
                  <input 
                    name="target"
                    type="text"
                    class="form-control"
                    v-bind:class="[ v.errors[0] ? 'is-invalid' : 'is-valid' ]"
                    v-model="item.target"
                  >
                  <div v-if="!!v.errors[0]" class="invalid-feedback">{{ v.errors[0] }}</div>
                </validation-provider>
              </div>

              <div class="mb-3">
                <label class="form-label">Title</label>
                <validation-provider name="Title" rules="required|min:4" v-slot="v">
                  <input 
                    name="title"
                    type="text"
                    class="form-control"
                    v-bind:class="[ v.errors[0] ? 'is-invalid' : 'is-valid' ]"
                    v-model="item.title"
                  />
                  <div v-if="v.errors[0]" class="invalid-feedback">{{ v.errors[0] }}</div>
                </validation-provider>
              </div>

              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea v-model="item.description" class="form-control" name="description"></textarea>        
              </div>
            </div>
            <div class="card-footer">
              <button 
                :disabled="invalid"
                type="submit" 
                class="btn btn-primary">Submit</button>
            </div>
          </form>
        </validation-observer>
      </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
  <script src="/js/vue.js"></script>
  <script src="/js/vee-validate.js"></script>
  <script src="/js/rules.js"></script>  
  <script>
    // console.log(Rules);
    Object.keys(Rules).forEach(key => {
      VeeValidate.extend(key, Rules[key]);
    });
    Vue.component('ValidationProvider', VeeValidate.ValidationProvider);
    Vue.component('ValidationObserver', VeeValidate.ValidationObserver);
    var app = new Vue({
      el: '#vue-app',
      data: {
        item: {
          file: null,
          target: null,
          title: '',
          description: ''
        }
      },
      methods: {
        setFile (e) {
          this.item.file = e.target.files[0];
        }
      }
    });
  </script>
<?= $this->endSection() ?>