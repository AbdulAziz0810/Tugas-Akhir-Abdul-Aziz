<!-- Content Wrapper -->
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
                   
                </ul>
            </div>
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('aseets/img/profile/') . $user['image'] ?>">
                    </a>
                </li>

            </ul>

        </nav>
        
        <div class="row">
            <div class="col-lg-8">
                <?= form_open_multipart('Invoice/bayar/'.$inc->id); ?>
                <div class="col-md-10">
                <h4>NO REKENING (Abdul Aziz)
                <h4>1170-0102-4592-504 (002)
                </div>
                <div class="form-group row-m">
                    <label for="text" class="col-sm col-form-label">Id Pembayaran</label>
                    <div class="col-sm-10">
                        <input type="id_pembayaran" class="form-control" id="id_pembayaran" placeholder="col-form-label" name="id_pembayaran" value="<?php
    echo $inc->id ?>" readonly>
                    </div>
                </div>
                <div class="form-group row-m">
                    <label for="email" class="col-sm col-form-label">Nominal</label>
                    <div class="col-sm-10">
                    <?php foreach ($pesanan as $psn) :?>
                        <input type="nominal" class="form-control" id="nominal" placeholder="col-form-label" name="nominal" value="<?php echo number_format ($psn->harga) ?>" readonly>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group row-m">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" placeholder="Nama Lengkap" name="name" value="<?= $user['name']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row-m">
                    <div class="col-sm-4">Upload Bukti Pembayaran</div>
                    <div class="col-sm-10">
                        <div class="row">
                            
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image_bayar" name="image_bayar">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>

                </form>
            </div>
        </div>