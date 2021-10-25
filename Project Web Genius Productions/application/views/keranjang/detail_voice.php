<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice: <?php
    echo $inc->id ?></div>
    </h4>
    

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
           
            <th>KATEGORI JASA</th>
           
            <th>VIDEOGRAPHER</th>

            <th>HARGA</th>
           
            
        </tr>
    <?php
    $total = 0;
    foreach ($pesanan as $psn) : 
    ?>
    <tr>
        <td><?php echo $psn->id_brg ?></td>
        <td><?php echo $psn->kategori_brg ?></td>
        <td><?php echo $psn->name ?></td>
        <td><?php echo number_format ($psn->harga) ?></td>
        
       
    </tr>
    <?php endforeach; ?> 
    
    </table>
</div>