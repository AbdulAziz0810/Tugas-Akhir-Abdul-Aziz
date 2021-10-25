<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('aseets/img/profile/'), $user['image'] ?>">
                    </a>
                </li>

            </ul>

        </nav>
        <div class="container-fluid">
        <div class="form-group row-m">
        <div class="col-sm-6">
                <h4><div class="btn btn-sm btn-danger ">No. Pemesanan: <?php
                    echo $inc->id ?></div> <a href="<?php echo base_url('Services/detail_keranjang'); ?>" class="btn btn-sm btn-danger">Kembali</a>
                    </h4>
                    
                </div>
                <br>

                <div class="col-sm-6 ">
                 <video width="500" height="300" autoplay controls>
                    <source src="<?= base_url('aseets/video_jasa/'. $inc->video_jasa ); ?>">
                </video>
                <br>


</br>
                <?php if ($inc->tanggal_pesanan == NULL && $inc->jam_pemesanan == NULL) { ?>
                 <span class="badge badge-danger">Pesanan Selesai</span>
                <?php } ?>
                </div>
                <br>
                  
                

               <!-- update pesanan -->

               <a href="<?= base_url('Invoice/selesai/' .$inc->id) ?>" class="btn btn-success"><i class="fas fa-check-circle"></i> Selesai</a>
            
        </div>