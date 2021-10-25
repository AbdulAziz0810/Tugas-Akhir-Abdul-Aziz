<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>Edit Data</h3>

    <?php foreach($menu as $m): ?>
        <form method="post" action="<?php echo base_url().'Videographer/update'?>">
            <div class="for-group">
                <label>Nama </label>
                <input type="text" name="name" class="form-control"
                value="<?php echo $m->name ?>">
            </div>
            <div class="for-group">
                <label>email</label>
                <input type="text" name="email" class="form-control"
                value="<?php echo $m->email ?>">
            </div>
            <div class="for-group">
                <label>Role Id</label>
                <input type="text" name="role_id" class="form-control"
                value="<?php echo $m->role_id ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>