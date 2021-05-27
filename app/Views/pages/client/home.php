<?= $this->extend('templates/client/base') ?>

<?= $this->section('precontent') ?>
  <div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-inner text-white">
      <?php foreach ($carousels as $index => $item): ?>
        <div 
          class="carousel-item <?php if ($index == 0): ?> active <?php endif; ?>" 
          style="background: url(/static/photos/bg2.jpg);">
          <div class="container-xl" style="height: 500px;">
            <div class="row h-100 ps-4 pe-4">
              <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                <h1 class="display-6 font-weight-bold"><?= $item->metadata->title ?></h1>
                <p class="d-none d-md-block"><?= $item->metadata->description ?></p>
              </div>
              <div class="col-12 col-md-6 d-flex justify-content-center align-items-center p-4">
                <div class="h-100 w-100" style="background: url(<?= $item->url ?>); background-size: contain; background-position: center; background-repeat: no-repeat;">
                </div>
              </div>
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
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row row-deck row-cards">
      <div class="col-12">
        <div class="card">
          <div class="card-header text-white bg-primary font-weight-bold text-h2">Pelayanan</div>
          <div class="card-body">
            <div class="row">
              <?php foreach ($commons->externalWebs as $ew): ?>
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

    </div>

    <div class="row mt-3">
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

        <div class="row mt-3">
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header text-white bg-primary d-flex align-items-center">
                <div class="card-title me-3">Informasi Publik</div>
                <div class="flex-grow-1 p-2"></div>
              </div>
              <div class="card-body">
                <div class="row row-cards row-deck">
                  <?php foreach ($infoPubliks as $ip): ?>
                    <div class="col-12 col-md-6">
                      <div class="card">
                        <a href="<?= $ip->metadata->target ?>">
                          <img class="card-img-top" src="<?= $ip->url ?>" />
                        </a>
                        <div class="card-footer text-white bg-indigo">
                          <?= $ip->metadata->title ?>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header text-white bg-primary">
                Jadwal Sidang Hari Ini
              </div>
              <div class="list-group card-list-group">
                <?php foreach ($sidangs as $sidang): ?>
                  <div class="list-group-item">
                    <div class="row">
                      <div class="col-auto">
                        <div class="bg-purple p-2 ps-3 pe-3 text-white font-weight-bold text-center">
                          <h2 class="mb-0"><?= $sidang->waktu->toLocalizedString('dd') ?></h2>
                          <div class="text-h6"><?= $sidang->waktu->toLocalizedString('MMMM') ?></div>
                          <div class="text-h6"><?= $sidang->waktu->toLocalizedString('YYYY') ?></div>
                        </div>
                      </div>
                      <div class="col d-flex flex-column">
                        <h4 class="text-purple mb-0"><?= $sidang->nomor ?></h4>
                        <small>Ruangan: <?= $sidang->ruangan ?></small>
                        <small class="text-muted">Agenda: <?= $sidang->agenda ?></small>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col">
            <div class="card">
              <div class="card-header text-white bg-primary">
                Berita
              </div>
              <div class="card-body">
                <div class="row">
                  <?php if (count($news) >= 1): ?>
                  <div class="col">
                    <img src="<?= $news[0]->avatar ?>" height="250" style="width: 100%;" />
                    <h2 class="font-weight-bold text-primary mb-0"><?= $news[0]->title ?></h2>
                    <small class="text-muted"><?= $news[0]->created_at->humanize() ?></small>
                  </div>
                  <?php endif; ?>
                  <div class="col">
                    <?php if (count($news) >= 2): ?>
                      <?php foreach (array_slice($news, 1) as $_news): ?>
                      <a href="/article/<?= $_news->id ?>" class="row mb-3">
                        <div class="col-2">
                          <img class="img-fluid" src="<?= $_news->avatar ?>" />
                        </div>
                        <div class="col">
                          <h4 class="mb-0"><?= $_news->title ?></h4>
                          <small class="text-muted"><?= $_news->created_at->humanize() ?></small>
                        </div>
                      </a>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col">
            <div class="card">
              <div class="card-header text-white bg-primary">
                Video Pelayanan
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col">
            <div class="card">
              <div class="card-header text-white bg-primary">
                Pengumuman PN Maumere
              </div>
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

                <?php foreach ($commons->roleModels as $key => $rm): ?>
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

        <div class="card mt-3">
          <div class="card-header">
            <div class="card-title">Pintasan</div>
          </div>
          <div class="list-group card-list-group">
            <?php foreach ($commons->externalWebs as $ew): ?>
              <a href="<?= $ew->metadata->target ?>" class="list-group-item">
                <div class="row">
                  <div class="col-3">
                    <img class="img-fluid" src="<?= $ew->url ?>" />
                  </div>
                  <div class="col d-flex flex-column">
                    <h4 class="text-purple mb-0"><?= $ew->metadata->title ?></h4>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-header">
            <div class="card-title">Link Terkait</div>
          </div>
          <div class="list-group card-list-group">
            <?php foreach ($commons->relatedLinks as $link): ?>
              <a href="<?= $link->metadata->target ?>" class="list-group-item">
                <div class="row">
                  <div class="col-4">
                    <img class="img-fluid" src="<?= $link->url ?>" />
                  </div>
                  <div class="col d-flex flex-column">
                    <h5 class="text-purple mb-0"><?= $link->metadata->title ?></h5>
                    <small><?= $link->metadata->description ?></small>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-header">
            <div class="card-title">Brosur</div>
          </div>
          <div class="card-img-bottom">
            <div id="brochureCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="height: 280px;">
              <div class="carousel-inner text-white">

                <?php foreach ($commons->brochures as $key => $brochure): ?>
                  <img 
                    class="carousel-item <?= $key == 0 ? 'active' : '' ?>"
                    src="<?= $brochure->url ?>"
                    style="height: 280px;" />
                <?php endforeach ?>

              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#brochureCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#brochureCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>
<?= $this->endSection() ?>