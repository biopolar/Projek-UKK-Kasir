<h2>Daftar Barang</h2>
<br>

<a class="btn btn-primary btn-md" href="?page=tambah-barang"><span class="glyphicon glyphicon-plus" id=""></span></a>

</br>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Terjual</th>
            <th>Foto</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <?php

        require '../koneksi/connect.php';
        $no = 1;
        $sql = mysqli_query($conn, "SELECT * FROM produk ORDER BY ProdukID ASC");
        while ($data = mysqli_fetch_array($sql)) {
    ?>

    <tbody>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['NamaProduk']?></td>
        <td><?php echo $data['Harga']?></td>
        <td><?php echo $data['Stok']?></td>
        <td><?php echo $data['Terjual']?></td>
        <td><?php echo "<img src='../foto/".$data['Foto']."' width='70' height='70'>"; ?></td>
        <td align="center" width="12%"><a href="?page=edit-stok&ProdukID=<?= $data['ProdukID'] ?>" class="badge badge-primary p-2" title="Edit"><i class="">Edit</i></a>
        <a href="?page=hapus-produk&ProdukID=<?= $data['ProdukID']?>" onclick="return confirm('Yakin Mau Hapus?')" class="badge badge-danger p-2 delete-data" title='Delete'><i class="button">Hapus</i></a>
        </td>
        <?php } ?>
    </tr>
</tbody>

    
        