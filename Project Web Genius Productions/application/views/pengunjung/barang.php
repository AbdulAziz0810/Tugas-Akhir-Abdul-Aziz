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
            <button class="btn btn-sm btn-primary" mb-3 data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Jasa</button>

            <table class="table table-board">
                <br>
                <tr>
                    <th>NO</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>DURASI</th>
                    <th>PROSES</th>
                    <th>BONUS</th>
                    <th colspan="3">AKSI</th>
                </tr>

                <?php
                $no = 1;
                foreach ($barang as $brg) : ?>

                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $brg->kategori_brg ?></td>
                        <td><?php echo $brg->harga ?></td>
                        <td><?php echo $brg->durasi ?></td>
                        <td><?php echo $brg->proses ?></td>
                        <td><?php echo $brg->bonus ?></td>
                        
                        <td>
                            <div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jasa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() . 'Upload/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Kategori Jasa</label><br>
                                <select class="form-control" name="kategori_brg">
                                    <option>WEDDING</option>
                                    <option>VIDOEGRAPHY</option>
                                    <option>EVENT</option>
                                    <option>FILM</option>
                                    <option>IKLAN</option>
                                    <option>TRAVEL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label><br>
                                <input type="text" name="harga" class="form-controler">
                            </div>
                            <div class="form-group">
                                <label>Durasi (Menit)</label><br>
                                <input type="text" name="durasi" class="form-controler">
                            </div>
                            <div class="form-group">
                                <label>Revisi (kali) </label><br>
                                <input type="text" name="revisi" class="form-controler">
                            </div>
                            <div class="form-group">
                                <label>Proses (Hari)</label><br>
                                <input type="text" name="proses" class="form-controler">
                            </div>
                            <div class="form-group">
                                <label>Bonus/Keterangan</label><br>
                                <input type="text" name="bonus" class="form-controler">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="SUBMIT" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>