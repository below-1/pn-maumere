<?= $this->extend('templates/client/base') ?>

<?= $this->section('content') ?>
    <section style="background: url('img/photogrid.jpg') center center repeat; background-size: cover;" class="bar background-white relative-positioned">
        <div class="container">
          <!-- Carousel Start-->
          <div class="home-carousel">
            <div class="dark-mask mask-primary"></div>
            <div class="container">
              <div class="homepage owl-carousel">
                <?php foreach ($carousels as $car): ?>
                  <div class="item">
                    <div class="row">
                      <div class="col-md-5 text-right">
                        <p><img src="/client/img/logo.png" alt="" class="ml-auto"></p>
                        <h1><?= $car->metadata->title ?></h1>
                        <p><?= $car->metadata->description ?></p>
                      </div>
                      <div class="col-md-7"><img src="<?= $car->url ?>" alt="" class="img-fluid" style="max-height: 300px;"></div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <!-- Carousel End-->
      </div>
    </section>

    <!-- External web -->
    <section class="bar bg-gray mb-0">
      <div class="container">
        <div class="heading">
          <h2>Pelayanan</h2>
        </div>
        <div class="row">

          <?php foreach ($externalWebs as $ew): ?>

            <div class="col-3 col-md my-2">
              <a href="/#"/ data-toggle="tooltip" data-placement="top" title="<?= $ew->metadata->title ?>">
                <img height="120" src="<?= $ew->url ?>" alt="" class="img-fluid">
              </a>
            </div>

          <?php endforeach; ?>

          <!-- <div class="col-md-12">
            <h1>Block with gray background</h1>
            <p class="lead mb-0">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
          </div> -->

        </div>
      </div>
    </section>

    <!-- Column Wrapper -->
    <div id="content">
      <div class="container">
        <div class="row bar">
          <div class="col-12 col-md-9">

            <div class="heading">
              <h4>Zona Integritas</h4>
            </div>            

            <ul id="pills-tab" role="tablist" class="nav nav-pills nav-justified">
              <?php foreach ($zis as $zi): ?>
                <li class="nav-item">
                  <a 
                    id="pills-zi-<?= $zi->id ?>-tab" 
                    data-toggle="pill" 
                    href="#pills-zi-<?= $zi->id ?>" 
                    role="tab" 
                    aria-controls="pills-home" 
                    aria-selected="true" 
                    class="nav-link">
                    <?= $zi->metadata->title ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
            <div id="pills-tabContent" class="tab-content">
              <?php foreach ($zis as $key => $zi): ?>
                <div 
                  id="pills-zi-<?= $zi->id ?>" 
                  role="tabpanel" 
                  aria-labelledby="pills-zi-<?= $zi->id ?>-tab" 
                  class="tab-pane fade show <?= $key == 0 ? 'active' : '' ?>">
                    <p><?= $zi->metadata->title ?> <?= $zi->metadata->description ?></p>
                    <p>Untuk Informasi Lebih Lanjut Silahkan Klik Laman dibawah ini :</p>
                    <a href="<?= $zi->url ?>"><?= $zi->url ?></a>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="row" style="margin-top: 24px;">
              <div class="col-12 col-md-6">
                <div class="heading mt-4">
                  <h4>Informasi Publik</h4>
                </div>
                <div class="row">
                  <?php foreach ($infoPubliks as $ip): ?>
                    <a href="#" class="col-6 text-white py-1">
                      <img src="<?= $ip->url ?>" alt="" class="img-fluid" style="max-height: 100px; width: 100%;">
                      <div class="bg-primary pa-2 d-flex flex-column justify-content-center align-items-center">
                        <div class="font-weight-bold"><?= $ip->metadata->title ?></div>
                        <div><?= $ip->metadata->description ?></div>
                      </div>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="col-6">
                <div class="heading mt-4">
                  <h4>Jadwal Sidang Hari Ini</h4>
                </div>

                <?php foreach ($sidangs as $sidang): ?>
                  <div class="d-flex pa-2 mb-4">
                    <div class="d-flex flex-column justify-content-center align-items-center bg-primary pa-4 text-white mr-2" style="flex-basis: 30%; flex-shrink: 0;">
                      <h3 class="font-weight-bold mb-0">18</h3>
                      <div>Mei 2021</div>
                    </div>
                    <div>
                      <h5 class="text-primary mb-2"><?= $sidang->nomor ?></h5>
                      <div class="text-muted font-weight-bold h6 mb-0">Agenda: <?= $sidang->agenda ?></div>
                      <div class="text-muted font-weight-bold h6 mb-0">Ruangan: <?= $sidang->ruangan ?></div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <section>
              <div class="heading mt-4" style="margin-top: 24px;">
                <h4>Berita PN Maumere</h4>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <div class="home-blog-post">
                    <div class="image"><img src="/client/img/portfolio-4.jpg" alt="..." class="img-fluid">
                      <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                    </div>
                    <div class="text">
                      <h4><a href="blog-post.html">Fashion Now </a></h4>
                      <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                      <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="blog-post.html" class="btn btn-template-outlined">Continue Reading</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="home-blog-post">
                    <div class="image"><img src="/client/img/portfolio-3.jpg" alt="..." class="img-fluid">
                      <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                    </div>
                    <div class="text">
                      <h4><a href="blog-post.html">What to do </a></h4>
                      <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                      <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="blog-post.html" class="btn btn-template-outlined">Continue Reading</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="home-blog-post">
                    <div class="image"><img src="/client/img/portfolio-5.jpg" alt="..." class="img-fluid">
                      <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                    </div>
                    <div class="text">
                      <h4><a href="blog-post.html">5 ways to look awesome </a></h4>
                      <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                      <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="blog-post.html" class="btn btn-template-outlined">Continue Reading</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="home-blog-post">
                    <div class="image"><img src="/client/img/portfolio-4.jpg" alt="..." class="img-fluid">
                      <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                    </div>
                    <div class="text">
                      <h4><a href="blog-post.html">Fashion Now </a></h4>
                      <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                      <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="blog-post.html" class="btn btn-template-outlined">Continue Reading</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="home-blog-post">
                    <div class="image"><img src="/client/img/portfolio-3.jpg" alt="..." class="img-fluid">
                      <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                    </div>
                    <div class="text">
                      <h4><a href="blog-post.html">What to do </a></h4>
                      <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                      <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="blog-post.html" class="btn btn-template-outlined">Continue Reading</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="home-blog-post">
                    <div class="image"><img src="/client/img/portfolio-5.jpg" alt="..." class="img-fluid">
                      <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                    </div>
                    <div class="text">
                      <h4><a href="blog-post.html">5 ways to look awesome </a></h4>
                      <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                      <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="blog-post.html" class="btn btn-template-outlined">Continue Reading</a>
                    </div>
                  </div>
                </div>
              </div>
            </section>

          </div>
          <div class="col-md-3">
            <!-- MENUS AND FILTERS-->
            <div class="panel panel-default sidebar-menu">

              <div class="panel-heading">
                <h3 class="h4 panel-title">Role Model</h3>
              </div>
              <div 
                class="p-3 bg-gray"
              >
                <div style="height: 100%; width: 100%; background: url(https://picsum.photos/id/237/200/300); background-size: cover; background-position: center; height: 260px;"></div>
              </div>

              <div class="panel-heading bar">
                <h3 class="h4 panel-title">Informasi Cepat</h3>
              </div>

              <div class="panel-body">
                <ul class="nav nav-pills flex-column text-sm category-menu">
                  <li class="nav-item"><a href="shop-category.html" class="nav-link d-flex align-items-center justify-content-between"><span>Men </span><span class="badge badge-secondary">42</span></a>
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">T-shirts</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Shirts</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Pants</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Accessories</a></li>
                    </ul>
                  </li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link active d-flex align-items-center justify-content-between"><span>Ladies  </span><span class="badge badge-light">123</span></a>
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">T-shirts</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Skirts</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Pants</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Accessories</a></li>
                    </ul>
                  </li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link d-flex align-items-center justify-content-between"><span>Kids  </span><span class="badge badge-secondary">11</span></a>
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">T-shirts</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Skirts</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Pants</a></li>
                      <li class="nav-item"><a href="shop-category.html" class="nav-link">Accessories</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <div class="panel panel-default sidebar-menu">
              <div class="panel-heading d-flex align-items-center justify-content-between">
                <h3 class="h4 panel-title">Brands</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
              </div>
              <div class="panel-body">
                <form>
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Armani  (10)
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Versace  (12)
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Carlo Bruni  (15)
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Jack Honey  (14)
                      </label>
                    </div>
                  </div>
                  <button class="btn btn-sm btn-template-outlined"><i class="fa fa-pencil"></i> Apply</button>
                </form>
              </div>
            </div>
            <div class="panel panel-default sidebar-menu">
              <div class="panel-heading d-flex align-items-center justify-content-between">
                <h3 class="h4 panel-titlen">Colours</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
              </div>
              <div class="panel-body">
                <form>
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"><span class="colour white"></span> White (14)
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"><span class="colour blue"></span> Blue (10)
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"><span class="colour green"></span>  Green (20)
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"><span class="colour yellow"></span>  Yellow (13)
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"><span class="colour red"></span>  Red (10)
                      </label>
                    </div>
                  </div>
                  <button class="btn btn-sm btn-template-outlined"><i class="fa fa-pencil"></i> Apply</button>
                </form>
              </div>
            </div>
            <div class="banner"><a href="shop-category.html"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
          </div>
        </div>
      </div>
    </div>

      <section class="bar background-white">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="box-simple">
                <div class="icon-outlined"><i class="fa fa-desktop"></i></div>
                <h3 class="h4">Webdesign</h3>
                <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="box-simple">
                <div class="icon-outlined"><i class="fa fa-print"></i></div>
                <h3 class="h4">Print</h3>
                <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="box-simple">
                <div class="icon-outlined"><i class="fa fa-globe"></i></div>
                <h3 class="h4">SEO and SEM</h3>
                <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="box-simple">
                <div class="icon-outlined"><i class="fa fa-lightbulb-o"></i></div>
                <h3 class="h4">Consulting</h3>
                <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="box-simple">
                <div class="icon-outlined"><i class="fa fa-envelope-o"></i></div>
                <h3 class="h4">Email Marketing</h3>
                <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="box-simple">
                <div class="icon-outlined"><i class="fa fa-user"></i></div>
                <h3 class="h4">UX</h3>
                <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="bar background-pentagon no-mb text-md-center">
        <div class="container">
          <div class="heading text-center">
            <h2>Testimonials</h2>
          </div>
          <p class="lead">We have worked with many clients and we always like to hear they come out from the cooperation happy and satisfied. Have a look what our clients said about us.</p>
          <!-- Carousel Start-->
          <ul class="owl-carousel testimonials list-unstyled equal-height">
            <li class="item">
              <div class="testimonial d-flex flex-wrap">
                <div class="text">
                  <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                </div>
                <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                  <div class="icon"><i class="fa fa-quote-left"></i></div>
                  <div class="testimonial-info d-flex">
                    <div class="title">
                      <h5>John McIntyre</h5>
                      <p>CEO, TransTech</p>
                    </div>
                    <div class="avatar"><img alt="" src="img/person-1.jpg" class="img-fluid"></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="item">
              <div class="testimonial d-flex flex-wrap">
                <div class="text">
                  <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.</p>
                </div>
                <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                  <div class="icon"><i class="fa fa-quote-left"></i></div>
                  <div class="testimonial-info d-flex">
                    <div class="title">
                      <h5>John McIntyre</h5>
                      <p>CEO, TransTech</p>
                    </div>
                    <div class="avatar"><img alt="" src="img/person-2.jpg" class="img-fluid"></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="item">
              <div class="testimonial d-flex flex-wrap">
                <div class="text">
                  <p>His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>
                  <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                </div>
                <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                  <div class="icon"><i class="fa fa-quote-left"></i></div>
                  <div class="testimonial-info d-flex">
                    <div class="title">
                      <h5>John McIntyre</h5>
                      <p>CEO, TransTech</p>
                    </div>
                    <div class="avatar"><img alt="" src="img/person-3.png" class="img-fluid"></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="item">
              <div class="testimonial d-flex flex-wrap">
                <div class="text">
                  <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad.</p>
                </div>
                <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                  <div class="icon"><i class="fa fa-quote-left"></i></div>
                  <div class="testimonial-info d-flex">
                    <div class="title">
                      <h5>John McIntyre</h5>
                      <p>CEO, TransTech</p>
                    </div>
                    <div class="avatar"><img alt="" src="img/person-4.jpg" class="img-fluid"></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="item">
              <div class="testimonial d-flex flex-wrap">
                <div class="text">
                  <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad.</p>
                </div>
                <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                  <div class="icon"><i class="fa fa-quote-left"></i></div>
                  <div class="testimonial-info d-flex">
                    <div class="title">
                      <h5>John McIntyre</h5>
                      <p>CEO, TransTech</p>
                    </div>
                    <div class="avatar"><img alt="" src="img/person-1.jpg" class="img-fluid"></div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <!-- Carousel End-->
        </div>
      </section>
<?= $this->endSection() ?>