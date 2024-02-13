<?php
include("../koneksi/connect.php");

    $ProdukID = $_GET['ProdukID'];
    
    // Retrieve user data based on ID
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE ProdukID='$ProdukID'");
    $row = mysqli_fetch_assoc($result);

    if(!$row) {
        die("Error: Data not found.");
    }

    // Update user data
    if(isset($_POST['update'])) {
        $NamaProduk = mysqli_real_escape_string($conn, $_POST['NamaProduk']);
        $Harga = mysqli_real_escape_string($conn, $_POST['Harga']);
        $Stok = mysqli_real_escape_string($conn, $_POST['Stok']);

        $updateQuery = mysqli_query($conn, "UPDATE produk SET NamaProduk='$NamaProduk', Harga='$Harga', Stok='$Stok' WHERE ProdukID='$ProdukID' ");

        if($updateQuery) {
            echo "User updated successfully. <a href='index.php?page=stok'>View Users</a>";
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }

?>

<center>
    <h2>Pesanan</h2>
    </center>
    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">Form Pesanan</div>
            <div class="panel-body">
                <form method="POST">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="NamaProduk" value="<?= $row['NamaProduk'] ?>" class="form-control"> 
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="Harga" value="<?= $row['Harga'];?>" class="form-control"> 
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Stok Barang</label>
                                <input type="number" name="Stok" value="<?= $row['Stok'];?>" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-md btn-primary" value="update">
                                <input type="submit" href="?page=stok" class="btn btn-md btn-danger" value="kembali">
                            </div>
                    </div>
                </div>
            </div>
        </div>
        