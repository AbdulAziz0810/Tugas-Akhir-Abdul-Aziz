<div class="header">
<div class="animate__animated animate__bounce">
<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-2">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Handphone</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="0852*******">
                    </div>
                    <div class="form-group">
                        <label>Videographer</label><br>
                        <select class="form-control" name="videographer">
                        <?php foreach ($video_G as $vig) : ?>
                        <option><?php echo $vig->name?></option>
                        <?php endforeach; ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="card-body">
                    <?php echo anchor('Services/tambah_ke_keranjang/'.$brg->id_brg,
                        '<div class="btn btn-sm btn-primary">Pesan</div>')?>
                    <a href="<?php echo base_url('Services/price'); ?>" class="btn btn-danger">KEMBALI</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>