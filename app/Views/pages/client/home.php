<?= $this->extend('templates/client/base') ?>

<?= $this->section('content') ?>
    <div class="row row-deck row-cards">

      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" style="height: 400px;">
        <div class="carousel-inner text-white">
          <?php foreach ($carousels as $index => $item): ?>
            <div 
              class="carousel-item <?php if ($index == 0): ?> active <?php endif; ?>" 
              style="height: 400px; background: url(/static/photos/bg2.jpg);">
              <div class="row h-100">
                <div  class="col d-flex flex-column align-items-start justify-content-center">
                  <h3><?= $item->metadata->title ?></h3>
                  <h5><?= $item->metadata->description ?></h5>
                </div>
                <div  class="col d-flex align-items-center justify-content-center">
                  <img src="<?= $item->url ?>" class="d-block" height="100" width="100" / >
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-header text-primary font-weight-bold text-h2">Pelayanan</div>
          <div class="card-body">
            <div class="row">
              <?php foreach ($externalWebs as $ew): ?>
                <div class="col-6 col-md">
                  <a href="<?= $ew->metadata->target ?>" class="card mt-3 mb-3">
                    <img class="card-img-top"  src="<?= $ew->url ?>" />
                  </a>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="card">
          <img src="/static/photos/zona-integritas.jpg" class="card-img-top" style="height: 250px;">
          <ul class="nav nav-tabs nav-fill" data-bs-toggle="tabs">
            <?php foreach ($zis as $key => $zi): ?>
              <li class="nav-item">
                <a too href="#zi-<?= $zi->id ?>" class="nav-link <?= $key == 0 ? 'active' : '' ?>" 
                  data-bs-toggle="tab"
                  data-bs-toggle="tooltip" 
                  data-bs-placement="top" 
                  title="<?= $zi->metadata->description ?>"
                >
                  <?= $zi->metadata->title ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
          <div class="card-body">
            <div class="tab-content">
              <?php foreach ($zis as $key => $zi): ?>
                <div class="tab-pane text-center <?= $key == 0 ? 'active show' : '' ?>" id="zi-<?= $zi->id ?>">
                  <div class="text-uppercase font-weight-bold"><?= $zi->metadata->title ?></div>
                  <div><?= $zi->metadata->description ?></div>
                  <a href="<?= $zi->url ?>" ><?= $zi->url ?></a>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-header text-primary font-weight-bold text-h2">Role Model</div>
          <div class="card-img-bottom">
            <div id="roleModelCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="height: 280px;">
              <div class="carousel-inner text-white">

                <?php foreach ($roleModels as $key => $rm): ?>
                  <img 
                    class="carousel-item <?= $key == 0 ? 'active' : '' ?>"
                    src="<?= $rm->url ?>"
                    style="height: 280px;" />
                <?php endforeach ?>

              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#roleModelCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#roleModelCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>
<?= $this->endSection() ?>