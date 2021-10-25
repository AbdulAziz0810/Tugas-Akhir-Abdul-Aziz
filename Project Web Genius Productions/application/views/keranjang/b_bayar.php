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
        <?= $this->session->flashdata('message');?>
        <div class="container-fluid">
        <div class="col-sm-6">
                <h4><div class="btn btn-sm btn-danger ">No. Pemesanan: <?php
                    echo $inc->id ?></div>  <a href="<?php echo base_url('Invoice'); ?>" class="btn btn-sm btn-danger">Kembali</a>
                    </h4>
                   
                
                    
                </div>
                <div class="form-group row-m">
                    <label for="name" class="col-sm-2 col-form-label">Atas Nama</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" placeholder="Nama Lengkap" name="name" value="<?= $inc->nama_pemesan; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 ">
<img src="<?= base_url('aseets/img/bayar/' .$inc->image_bayar)  ?>" alt="" style="width: 460px; height: 460px;">
                </div>
        </div>