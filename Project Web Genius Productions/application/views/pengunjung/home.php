<!--header-->
<section class="header">
  <nav>
    <div class="nav-links" id="navLinks">
      <i class="fa fa-times" onclick="hideMenu()"></i>
      <ul>
        <li><a href="<?php echo base_url('Home/index');?>">BERANDA</a></li>
        <li><a href="<?php echo base_url('Portfolio/galery'); ?>" >GALERI</a></li>
        <li><a href=" <?php echo base_url('Upload/price'); ?> ">JASA</a></li>
        <li><a href="<?php echo base_url('Upload/video_graph'); ?>">VIDEOGRAPHER</a></li>
        <!-- nama controler/nama function -->
        <li><a href=" <?php echo base_url('user'); ?>">PROFIL</a>
        
        </li>
      </ul>
    </div>
    <i class="fa fa-bars" onclick="showMenu()" id="tombol"></i>
  </nav>
  <div class="text-box">
    <h1 class="animate__animated animate__bounceInLeft">Genius Productions</h1>
    <p class="animate__animated animate__bounceInRight" >"Ayo abadikan momen terbaik mu dengan jasa videographer profesional <br> dengan sistem penggunaan jasa yang aman dan terpercaya."</p>
    <div class="center">
      <button class="btnn" > <a href=" <?php echo base_url('Login/masuk'); ?>" style="text-decoration: none;">
        <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
        </svg>
        <span> MASUK</span>
        </a>  
      </button>
    </div>
  </div>
</section>