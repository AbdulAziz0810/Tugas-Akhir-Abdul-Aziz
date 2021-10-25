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
    <div class="alert alert-success">
        <p class="text-center align-middle">Selamat, Pesanan Berhasil</p>
    </div>
</div>
         </div>
</div>