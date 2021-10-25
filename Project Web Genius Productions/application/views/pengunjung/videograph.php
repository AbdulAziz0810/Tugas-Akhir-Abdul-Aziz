<section class="job">
      <nav>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="<?php echo base_url('Home/index');?>">BERANDA</a></li>
            <li><a href="<?php echo base_url('Portfolio/galery'); ?>">GALERI</a></li>
            <li><a href=" <?php echo base_url('Upload/price'); ?> ">JASA</a></li>
            <li><a href="<?php echo base_url('Upload/video_graph'); ?>">VIDEOGRAPHER</a></li>
            <li><a href=" <?php echo base_url('user'); ?>">PROFIL</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"id="tombol"></i>
      </nav>
      <div class="text-header">
        <h1 class="animate__animated animate__bounce">VIDEOGRAPHER</h1>

      </div>
    </section>
    <section class="videograph">
      <div class="container container animate__animated animate__fadeInUp">
        <div class="row justify-content-center">
          <div class="row">
          <?php foreach ($video_graph as $vigg) : ?>
            <div class="col-md-4 col-6 mb-4">
              <div class="card text-white border-dark" style="background-image: url(<?= base_url('aseets/img/testimonial-bg.jpg'); ?>); width: 18rem;">
                <img src="<?= base_url('aseets/img/profile/'.$vigg->image); ?> "  style="width: 286px; height: 300px;" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $vigg->name?></h5>
                  <p class="card-text"><?php echo $vigg->email?></p>
                 
                </div>
              </div>
            </div>
            <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </section>