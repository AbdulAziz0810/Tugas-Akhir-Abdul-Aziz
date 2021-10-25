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
            <img class="img-profile rounded-circle" src="<?= base_url('aseets/img/profile/'), $user['image'] ?>">
        </a>
    </li>

</ul>

</nav>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-grey-800">Menu Menajemen</h1>

    <div class="row">
        <div class="col-lg-6">
      
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id User</th>
            <th>Nama </th>
            <th>Email</th>
            <th>Role</th>
        
            <th>Aksi</th>
        </tr>
        
        <?php foreach ($menu as $m): ?>

        <tr>
            <td><?php echo $m->id ?></td>
            <td><?php echo $m->name ?></td>
            <td><?php echo $m->email ?></td>
            <td><?php echo $m->role_id ?></td>
          
            
            <td><?php echo anchor('Videographer/edit/'. $m->id, '<div class="badge badge-primary">Edit</div>')?>
            <?php echo anchor('Videographer/hapus/'. $m->id, '<div class="badge badge-danger">Delete</div>')?></td>
           
        </tr>
        <?php endforeach; ?>
      
   
   

     
    

        </div>
    </div>
</div>

<!-- modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
      <div class="modal-body">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>