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
        <h1 class="animate__animated animate__bounce">JASA</h1>
        
      </div>
    </section>
    
<section class="services">
  
  <div class="container animate__animated animate__fadeInUp">
    <div class="row justify-content-center">
    <?php foreach ($barang as $brg) : ?>

      <div class="col-md-4 mb-3 ">
        <!-- <?php 
        echo form_open('Services/add');
        echo form_open('id',$brg->id_brg);
        echo form_open('qty',1);
        echo form_open('price',$brg->harga);
        echo form_open('name',$brg->kategori_brg);
        echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
        ?> -->
          <div class="card border-dark" style="background-image: url(<?= base_url('aseets/img/testimonial-bg.jpg'); ?>); width: 286px; height: 350px;">
            <div class="card-body">
              <h5 class="card-title text-white text-center"><?php echo $brg->kategori_brg ?></h5>
              <p class="card-text text-center">Rp. <?php echo number_format($brg->harga)  ?></p>
          </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?php echo $brg->proses?> Hari (Pengerjaan)</li>
              <li class="list-group-item"><?php echo $brg->durasi?> menit</li>
              <li class="list-group-item"><?php echo $brg->bonus?></li>
            </ul>
            <div class="card-body">
                <!-- <a href="<?php echo base_url('Pesan/jasa'); ?>" class="btn btn-primary">Pesan</a> -->
             <?php echo anchor('Services/tambah_ke_keranjang/'.$brg->id_brg,
              '<div class="btn btn-outline-light">Pesan</div>')?>
              <!-- <a href="#" class="btn btn-primary">Galerry</a>
              <!-- <button class="btn btn-sm btn-primary">Pesan</button> -->
            </div>
          </div>
          <!-- <?php  echo form_close();?> -->
      </div>
      <?php endforeach ?>
    </div>
  </animate__animated>
</section>             
