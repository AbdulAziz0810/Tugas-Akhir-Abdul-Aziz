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
    <h4>Invoice Pemesanan</h4>
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
            <th>status</th>
            <th>Aksi</th>
            <th>Konfirmasi</th>

        </tr>
        <?php if ($invoice) : ?>
            <?php foreach ($invoice as $inv) : ?>

                <tr>
                    <td><?php echo $inv->id; ?></td>
                    <td><?php echo $inv->nama_pemesan ?></td>
                    <td><?php echo $inv->no_tlpn ?></td>
                    <td><?php echo $inv->name ?></td>
                    <td><?php echo $inv->tanggal_pesanan ?></td>
                    <td><?php echo $inv->jam_pemesanan ?></td>
                    <!-- <td><?php echo $inv->batas_pembayaran ?></td> -->
                    <td><?php echo $inv->alamat_pemesan ?></td>
                    <td><?php echo $inv->status ?></td>
                    
                    <td>

                        <?php if ($inv->status == 'bayar') { ?>
                            <?php echo anchor('Invoice/detail/' . $inv->id, '<div class="badge badge-warning">Detail</div>' ) ?>
                            <a href="<?= base_url('Invoice/upload_vidio/' .$inv->id) ;?>" class="badge badge-primary">Upload Video</a>
                            <a href="<?= base_url('Invoice/bukti_bayar/' .$inv->id) ;?>" class="badge badge-primary">Cek Pembayaran</a>

                            <!-- bukti bayar -->
                            <!-- Button trigger modal -->
                        

                            
                            
                         <?php }else if($inv->tanggal_pesanan == NULL)  { ?>
                         
                            <span class="badge badge-danger">Ditolak</span>
                            
                        
                        <?php } else { ?>
                            <?php echo anchor('Pesan/terimaPesanan/' . $inv->id . '/1', '<div class="badge badge-primary">Terima</div>') ?>
                            <?php echo anchor('Pesan/tolakPesanan/' . $inv->id, '<div class="badge badge-danger">Tolak</div>') ?>
                        <?php } ?>
                        
                        
                        

                       
                     <!-- modal gan -->
                 

                    </td>
                    <td> <?php if($inv->tanggal_pesanan == '0000-00-00') {  ?>
                            <span class="badge badge-success">Selesai</span>
                        <?php }  ?></td>

                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>



 <!-- Modal -->
                    <!-- <?php foreach ($bayar as $key => $value) { ?>
                        <div class="modal fade" id="cek<?= $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <img src="<?= base_url('aseets/img/bayar/' .$value->image_bayar)  ?>" alt="" style="width: 460px; height: 460px;">
                            </div>
                            
                            </div>
                        </div>
                        </div>
                    <?php } ?> -->
                        