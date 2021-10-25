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
            <div class="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php $keranjang = 'PESANAN : ' . $this->cart->total_items() . '' ?>
                    <?php echo anchor('Services/detail_keranjang', $keranjang)  ?>
                </ul>
            </div>
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
        <section class="services">

            <div class="container">
                <div class="container-fluid">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Boking</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Transaksi</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <h4></h4>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>NO</th>
                                    <th>KATEGORI</th>
                                    <th>JUMLAH</th>
                                    <th>HARGA</th>
                                </tr>

                                <?php
                                $no = 1;
                                foreach ($this->cart->contents() as $items) : ?>

                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $items['name'] ?></td>
                                        <td><?php echo $items['qty'] ?></td>
                                        <td align="right"> Rp. <?php echo number_format($items['price'], 0, ',', '.')  ?></td>

                                    </tr>


                                <?php endforeach; ?>
                            </table>

                            <div align="right">

                                <a href="<?php echo base_url('Services/hapus_keranjang') ?>">
                                    <div class="btn btn-sm btn-danger">Batal</div>
                                </a>

                                <a href="<?php echo base_url('Services/pembayaran') ?>">
                                    <div class="btn btn-sm btn-success">Konfirmasi</div>
                                </a>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Id Invoice</th>
                                    <th>Nama Pemesan</th>
                                    <th>No Telepon</th>
                                    <th>Videographer</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Jam</th>
                                    <!-- <th>Batas Pembayaran</th> -->
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                    <th>Konfirmasi</th>
                                   
                                </tr>

                                <?php foreach ($invoice_bayar as $ivb) :  ?>

                                    <tr>
                                        <td><?php echo $ivb->id; ?></td>
                                        <td><?php echo $ivb->nama_pemesan ?></td>
                                        <td><?php echo $ivb->no_tlpn ?></td>
                                        <td><?php echo $ivb->name ?></td>
                                        <td><?php echo $ivb->tanggal_pesanan ?></td>
                                        <td><?php echo $ivb->jam_pemesanan ?></td>
                                        <!-- <td><?php echo $ivb->batas_pembayaran ?></td> -->
                                        <td><?php echo $ivb->alamat_pemesan ?></td>

                                        <td>


                                       
                                          <?php if ($ivb->tanggal_pesanan == "") { ?>
                                                <span class="badge badge-danger">Di Tolak</span>
                                            <?php } else  if($ivb->status == 'bayar'){?>

                                            <!-- ketika dah di bayar -->
                                          
                                                <?php echo anchor('Invoice/detail/' . $ivb->id, '<div class="badge badge-success">Detail</div>'); ?>
                                                <?php if ($ivb->image_bayar) { ?>
                                                   <div class="badge badge-primary">Sudah Bayar</div>
                                                    <a href="<?= base_url('Invoice/download_vidio/' .$ivb->id) ;?>" class="badge badge-danger">Download</a>
                                                    
                                                <?php } else { ?>
                                                    <?php echo anchor('Invoice/bayar/' . $ivb->id, '<div class="badge badge-primary">Pembayaran</div>') ?>
                                                <?php } ?>
                                                
                                            <?php } else if ($ivb->status != 'bayar') { ?>
                                                <?php echo anchor('Invoice/detail/' . $ivb->id, '<div class="badge badge-success">Detail</div>') ?>
                                                <span class="badge badge-primary">Menunggu Verifikasi</span>
                                          

                                            <?php } else if ($ivb->tanggal_pesanan == "0000-00-00") {?>
                                                <span class="badge badge-primary">Menunggu Verifikasi</span>
                                            <?php }  ?>
                                               
                                        </td>

                                        <td> <?php if($ivb->tanggal_pesanan == '0000-00-00') { ?> 
                                            <span class="badge badge-primary">Selesai</span>
                                          
                                        <?php } ?>
                                        </td>

                                       
                                    </tr>

                                <?php endforeach; ?>
                            </table>
               

                </div>
        </section>

    </div>
</div>