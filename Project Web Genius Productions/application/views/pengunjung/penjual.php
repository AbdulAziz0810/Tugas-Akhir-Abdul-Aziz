     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             <nav class="navbar navbar-expand bg-white topbar mb-4 static-top shadow" >

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
             <!-- End of Topbar -->

             <!-- Begin Page Content -->
             <div class="container-fluid">
                 <!-- Begin Page Content -->
                 <div class="container-fluid">

                     <!-- Page Heading -->

                     <!-- Content Row -->
                     <div class="row">

                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card border-left-primary shadow h-100 py-2">
                                 <div class="card-body">
                                     <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                 Orderan</div>
                                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah; ?></div>
                                         </div>
                                         <div class="col-auto">
                                             <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card border-left-success shadow h-100 py-2">
                                 <div class="card-body">
                                     <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                 User</div>
                                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah1; ?></div>
                                         </div>
                                         <div class="col-auto">
                                             <i class="fa fa-user fa-2x text-gray-300"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card border-left-info shadow h-100 py-2">
                                 <div class="card-body">
                                     <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Video
                                             </div>
                                             <div class="row no-gutters align-items-center">
                                                 <div class="col-auto">
                                                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlah2; ?></div>
                                                 </div>
                                                 
                                             </div>
                                         </div>
                                         <div class="col-auto">
                                             <i class="fa fa-play fa-2x text-gray-300"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <!-- Pending Requests Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card border-left-warning shadow h-100 py-2">
                                 <div class="card-body">
                                     <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                             <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                 Jasa</div>
                                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah3; ?></div>
                                         </div>
                                         <div class="col-auto">
                                             <i class="fa fa-briefcase fa-2x text-gray-300"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-xl-3 col-md-6 mb-4">
                             <div class="card border-left-warning shadow h-100 py-2">
                                 <div class="card-body">
                                     <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                             <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                 Komentar</div>
                                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah4; ?></div>
                                         </div>
                                         <div class="col-auto">
                                             <i class="fa fa-comments fa-2x text-gray-300"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>



             </div>
             <!-- /.container-fluid -->

         </div>

     </div>
     <!-- End of Content Wrapper -->