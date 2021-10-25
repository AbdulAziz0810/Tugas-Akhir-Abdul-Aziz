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
                             <?php echo anchor('Services/detail_keranjang',$keranjang )  ?>
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
<div class="container-fluid">
 <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-8">
         <div class="btn btn-sm btn-success">
             <?php 
             $grand_total=0;
             if ($keranjang = $this->cart->contents())
             {
                 foreach ($keranjang as $item)
                 {
                     $grand_total = $grand_total + $item['subtotal'];
                 }
                 echo "<h4>Total Bayar: Rp. ".number_format($grand_total,0,',','.');
                 ?>
         </div><br>
         <h3>Lengkapi Pembayaran</h3>

        <form method="post" action="<?php echo base_url('Services/pesanan') ?>">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">No. Telepon</label>
                        <input name="nomor_hp" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Telepon Aktif">
                    </div>
                    <div class="form-group">
                        <label>Videographer</label><br>
                            <select class="form-control" name="videographer">
                            <?php foreach ($video_G as $key => $vig) : ?>
                            <?php 
                            
                                 $tanggal = date('Y-m-d');
                                // $tanggal = $vig->tanggal_pesanan;
                                //  22 agustus 2021
                                //  $tanggalCreate = date_create($tanggal);

                                // //  7 days
                                //  $prosesPengerjaan = $vig->batas_pengerjaan." days";
                                // //  var_dump($prosesPengerjaan); exit;

                                //  $tanggalBatas = date_add($tanggalCreate, date_interval_create_from_date_string($prosesPengerjaan));
                                // // 29 Agustus 

                                //  $formatTanggalBatas = date_format($tanggalBatas, 'Y-m-d');
                                // // Format 29 Agustus
                                // //  var_dump($formatTanggalBatas); exit;
                            ?>
                                <?php if($vig->batas_pengerjaan === null): ?>
                                    <!-- Orangnya ada -->
                                    <option value="<?php echo $vig->id ?>"><?php echo $vig->name?></option>
                                <?php elseif($tanggal > $vig->batas_pengerjaan): ?>
                                    <option value="<?php echo $vig->id ?>"><?php echo $vig->name?></option>
                                <?php else: ?>
                                    <!-- Tanggal pengerjaan sedang berlangsung tapi kita mau mesannya hari ini -->
                                    <option disabled value="<?php echo $vig->id ?>"><?php echo $vig->name?> (Sedang Dalam Pengerjaan)</option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jam</label>
                        <input type="time" name="jam" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat Lengkap</label>
                        <textarea type="text" name="alamat" class="form-control" id="exampleFormControlTextarea1" placeholder="Alamat Lenkap" rows="3"></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label>Pilih BANK</label><br>
                            <select class="form-control" name="bank">
                            <option>BRI - XXXX-XXXX-XXXX</option>
                            <option>BCA - XXXX-XXXX-XXXX</option>
                            <option>KALBAR - XXXX-XXXX-XXXX</option>  
                        </select>
                    </div>  -->

                    <button type="submit" class="btn btn-sm btn-primary mb-4">Pesan</button>
                </div>
            </form>

            <?php
             }else{
                 echo "<h4>Anda Belum Memilih Jasa";
             }
             ?>
     <div class="col-md-2"></div>
 </div>
</div>
         </div>
</div>