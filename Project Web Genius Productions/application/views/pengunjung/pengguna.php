     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             <nav class="navbar navbar-expand  bg-white topbar mb-4 static-top shadow">

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
                             <img class="img-profile rounded-circle" src="<?= base_url('aseets/img/profile/'), $user['image'] ?>">
                         </a>
                     </li>

                 </ul>

             </nav>
             <!-- End of Topbar -->

             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800">Profile</h1>

                 <div class="row">
                     <div class="col-lg-6">
                         <?= $this->session->flashdata('message'); ?>
                     </div>
                 </div>

                 <div class="card mb-3" style="max-width: 540px;">

                     <div class="row no-gutters">
                         <div class="col-md-4">
                             <img src="<?= base_url('aseets/img/profile/'), $user['image'] ?>" style="width: 150px; height: 150px;">
                         </div>
                         <div class="col-md-8">
                             <div class="card-body">
                                 <h5 class="card-title"><?= $user['name']; ?></h5>
                                 <p class="card-text"><?= $user['email']; ?>.</p>
                                 <p class="card-text"><small class="text-muted"><?= date('d F Y', $user['date_daftar']); ?></small></p>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
             <!-- /.container-fluid -->

         </div>

     </div>
     <!-- End of Content Wrapper -->