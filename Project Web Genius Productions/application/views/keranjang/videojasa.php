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

            <?= form_open_multipart('Invoice/update_vidio/' . $inc->id, 'method="post"');
            // form_open_multipart('Invoice/update_vidio/'.$inc->id); 
            ?>

            <div class="form-group row-m">
                <label for="text" class="col-sm col-form-label">Id Pesanan</label>
                <div class="col-sm-6">
                    <input type="id_pembayaran" class="form-control" id="id_pembayaran" placeholder="col-form-label" name="id_pembayaran" value="<?php echo $inc->id ?>" readonly>
                    
                </div>
                <div class="form-group row-m">
                    <div class="col-sm-4">Upload Hasil Jasa</div>
                    <div class="col-sm-7">
                        <div class="row">

                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="video_jasa" name="video_jasa">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                

                </form>

                
                <div class="col-sm-6 ">

                <video width="500" height="300" autoplay controls>
                    <source src="<?= base_url('aseets/video_jasa/'. $inc->video_jasa ); ?>">
                </video>
                <br>
                <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>