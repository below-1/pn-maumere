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
          Tambah Sidang
        </h2>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="row row-deck row-cards">
    <div class="col-sm-12 col-lg-6">
      <form 
        id="carousel_form"
        class="card"
        method="post"
        action=""
        enctype="multipart/form-data"
      >
        <div class="card-header">Input Data Sidang</div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Nomor</label>
            <input
              name="nomor"
              class="form-control"
              required
              value="<?= $item->nomor ?>"
            />
          </div>
          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input
              name="waktu_date"
              type="date"
              class="form-control"
              required
              value="<?= $item->waktu->toLocalizedString('yyyy-MM-dd') ?>"
            />
          </div>
          <div class="mb-3">
            <label class="form-label">Jam</label>
            <input
              name="waktu_time"
              type="time"
              class="form-control"
              required
              value="<?= $item->waktu->toLocalizedString('HH:mm') ?>"
            />
          </div>
          <div class="mb-3">
            <label class="form-label">Ruangan</label>
            <input
              name="ruangan"
              class="form-control"
              value="<?= $item->ruangan ?>"
              required
            />
          </div>

          <textarea name="penggugat" hidden :value="penggugat_all"></textarea>
          <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
              <label class="form-label">Penggugat</label>
              <button @click="addPenggugat" type="button" class="btn btn-icon btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="9" y1="12" x2="15" y2="12" /><line x1="12" y1="9" x2="12" y2="15" /></svg>
              </button>
            </div>
            <div 
              v-for="(p, i) in penggugat" 
              :key="`penggugat-${i}`"
              class="input-group ps-4 pt-2">
              <div class="input-group">
                <span class="input-group-text">
                  {{ i + 1 }}
                </span>
                <input
                  v-model="penggugat[i]"
                  class="form-control"
                  required
                />
                <button @click="removePenggugat(i)" class="btn btn-icon" type="button">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                </button>
              </div>
            </div>
          </div>

          <textarea name="tergugat" hidden :value="tergugat_all"></textarea>
          <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
              <label class="form-label">Tergugat</label>
              <button @click="addTergugat" type="button" class="btn btn-icon btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="9" y1="12" x2="15" y2="12" /><line x1="12" y1="9" x2="12" y2="15" /></svg>
              </button>
            </div>
            <div 
              v-for="(p, i) in tergugat" 
              :key="`tergugat-${i}`"
              class="input-group ps-4 pt-2">
              <div class="input-group">
                <span class="input-group-text">
                  {{ i + 1 }}
                </span>
                <input
                  v-model="tergugat[i]"
                  class="form-control"
                  required
                />
                <button @click="removeTergugat(i)" class="btn btn-icon" type="button">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                </button>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Agenda</label>
            <textarea 
              class="form-control" 
              rows="5"
              name="agenda"><?= $item->agenda ?></textarea>
          </div>

          <button 
            type="submit" 
            class="btn btn-primary">Submit</button>
          </div>

        </div>
      </form>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
  <script src="/js/vue.js"></script>
  <script>
    var vue = new Vue({
      el: '#main-app',
      data: {
        penggugat: <?= json_encode($item->penggugat) ?>,
        tergugat: <?= json_encode($item->tergugat) ?>
      },
      computed: {
        penggugat_all () {
          return JSON.stringify(this.penggugat);
        },
        tergugat_all () {
          return JSON.stringify(this.tergugat);
        }
      },
      methods: {
        addPenggugat () {
          this.penggugat.push('');
        },
        addTergugat () {
          this.tergugat.push('');
        },
        removePenggugat (i) {
          const temp = [ ...this.penggugat ];
          temp.splice(i, 1);
          this.penggugat = temp;
        },
        removeTergugat (i) {
          const temp = [ ...this.tergugat ];
          temp.splice(i, 1);
          this.tergugat = temp;
        }
      }
    });
  </script>
<?= $this->endSection() ?>