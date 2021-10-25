<section class="job">
  <nav>
    <div class="nav-links" id="navLinks">
      <i class="fa fa-times" onclick="hideMenu()"></i>
      <ul>
        <li><a href="<?php echo base_url('Home/index'); ?>">BERANDA</a></li>
        <li><a href="<?php echo base_url('Portfolio/galery'); ?>">GALERI</a></li>
        <li><a href="<?php echo base_url('Upload/price'); ?>">JASA</a></li>
        <li><a href="<?php echo base_url('Upload/video_graph'); ?>">VIDEOGRAPHER</a></li>
        <li><a href=" <?php echo base_url('user'); ?>">PROFIL</a></li>
      </ul>
    </div>
    <i class="fa fa-bars" onclick="showMenu()" id="tombol"></i>
  </nav>
  <div class="text-header">
    <h1 class="animate__animated animate__bounce">DETAIL VIDEO</h1>
  </div>
</section>
<section class="galery">
  <div class="container">

    <div class="row justify-content-center">
      <?php foreach ($gallery as $vdo) : ?>
        <div class="col-md-9">
          <div class="card text-center bg-dark border-dark">
            <div class="card-header" style="background-image: url(<?= base_url('aseets/img/calltos-bg.jpg'); ?>);">
              <h2><?php echo $vdo->name ?></h2>
            </div>
            <div class="card-body" style="background-image: url(<?= base_url('aseets/img/testimonial-bg.jpg'); ?>);">
              
              <iframe width="500" height="340"
              class="embed-responsive-item"
            src="https://www.youtube.com/embed/<?php echo $vdo->video?>?autoplay=1&mute=1">
            </iframe>
              <h5 class="card-title"><?php echo $vdo->judul_video ?></h5>
              <p class="card-text"><?php echo $vdo->deskripsi ?></p>
              <a href="<?php echo base_url('Portfolio/galery'); ?>" class="btn btn-outline-light">Kembali</a>
              <a href="<?php echo base_url('Upload/price'); ?>" class="btn btn-outline-light">Pesan</a>
            </div>


          </div>


          <div class="komentar" style=" height: 200px; overflow-y: scroll; margin-top: 20px;">

            <?php foreach ($Komentar as $key => $value) { ?>

              <h5 class="pl-2"><?= $value->nama; ?></h5>
              <p class="pl-2" style="font-size: 10px; margin-top: -4px;"><?= $value->tgl_komentar ?></p>
              <p class="pl-2" style="color: white"><?= $value->komentar; ?></p>

              <hr>
            <?php } ?>



          </div>
          <div class="row">
            <form action=" <?= base_url('Portfolio/komentar'); ?>" method="post">


              <div class="form-group">
                <label for="exampleFormControlTextarea1">Komentar</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="background: transparent;" name="komentar"></textarea>
              </div>


              <input type="text" value="<?= $vdo->id_video ?>" name="id_video" hidden>
              <input type="text" value="<?= $user['name'] ?>" name="nama" hidden>



              <div class="form-group">
                <button class="btn btn-outline-light">Kirim</button>
              </div>


            </form>
          </div>

        <?php endforeach ?>
        </div>




    </div>
</section>