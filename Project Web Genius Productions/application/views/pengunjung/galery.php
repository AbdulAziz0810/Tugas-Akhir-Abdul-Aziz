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
    <h1 class="animate__animated animate__bounce">GALERI</h1>
  </div>
</section>
<section class="galery">
  <div class="container">

    <div class="row">
      <div id="myBtnContainer">
        <button class="btn active" onclick="filterSelection('all')"> Semua</button>
        <button class="btn" onclick="filterSelection('Videography')"> Videography</button>
        <button class="btn" onclick="filterSelection('Event')"> Event</button>
        <button class="btn" onclick="filterSelection('Iklan')"> Iklan</button>
        <button class="btn" onclick="filterSelection('Film')"> Film</button>
        <button class="btn" onclick="filterSelection('Wedding')"> Wedding</button>
        <button class="btn" onclick="filterSelection('Travel')"> Travel</button>
        <hr>
      </div>

      <!-- Portfolio Gallery Grid -->
      <div class="row">
      <?php foreach ($gallery as $vdo) : ?>
        <div class="col-md-4">
          <div class="column <?php echo $vdo->kategori?>">
          
            <div class="content ontainer animate__animated animate__fadeInUp">
              <iframe width="320" height="200"
              class="embed-responsive-item"
            src="https://www.youtube.com/embed/<?php echo $vdo->video?>?controls=0">
            </iframe>
              <tr>
              <?php echo anchor('Portfolio/detail_video/'.$vdo->id_video,
              '<div class="btn btn-sm btn-danger">Detail</div>')?>
            
              </tr>

              <!--<h6><?php echo $vdo->judul_video?></h6>-->
              
            </div>
          </div>
          </div>
        <?php endforeach ?>
      
        <!-- END GRID -->
        <hr>
      </div>
    </div>
  </div>
</section>