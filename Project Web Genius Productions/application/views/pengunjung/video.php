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
            <button class="btn btn-sm btn-primary" mb-3 data-toggle="modal" data-target="#tambah_video"><i class="fas fa-plus fa-sm"></i> Upload Video</button>

            <table class="table table-board">
                <br>
                <tr>
                    <th>NO</th>
                    
                    <th>JUDUL</th>
                    <th>KATEEGORI</th>
                    <th>DESKRIPSI</th>
                    <th>VIDEO</th>
                    <th colspan="3">AKSI</th>
                </tr>

                <?php
                $no = 1;
                foreach ($gallery as $vdo) : ?>

                    <tr>
                        <td><?php echo $no++ ?></td>
                        
                        <td><?php echo $vdo->judul_video ?></td>
                        <td><?php echo $vdo->kategori ?></td>
                        <td><?php echo $vdo->deskripsi ?></td>
                        <td><?php echo $vdo->video ?></td>

                       
                        <td> <?php echo anchor('Upload/hapus/'. $vdo->id_video, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>')
                            
                        ?> </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tambah_video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?= form_open_multipart('Upload/tambah_jalan'); ?>
                            <div class="form-group">
                                <label>Judul Video</label><br>
                                <input type="text" name="judul_video" class="form-controler">
                            </div>
                            <div class="form-group row-m">
                                <label for="email" class="col-sm-2 col-form-label">Nama Videographer</label>
                                <div class="col-sm-10">
                                    <input type="name" class="form-control" id="name" placeholder="col-form-label" name="name" value="<?= $user['name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label><br>
                                <select class="form-control" name="kategori">
                                <option>Videography</option>
                                <option>Wedding</option>
                                <option>Travel</option>  
                                <option>Event</option>
                                <option>Film</option>
                                <option>Iklan</option>  
                                </select>
                            </div> 
                            <div class="form-group">
                                <label>Deskripsi</label><br>
                                <input type="text" name="deskripsi" class="form-controler">
                            </div>
                            <div class="form-group">
                                <label>video</label><br>
                                <input type="text" name="video" class="form-controler">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="SUBMIT" class="btn btn-primary">Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>

        <!-- <?php foreach ($gallery as $vdo) : ?>

                <div class="card" style="width: 16rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $vdo->judul_video ?></h5>
                        <small><?php echo $vdo->deskripsi ?></small>
                        <small><?php echo $vdo->kategori ?></small>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Tambah Ke Keranjang</a>
                    </div>
                </div>

            <?php endforeach ?>-->
    </div>