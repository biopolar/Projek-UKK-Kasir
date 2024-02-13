<div class="row">
    <center>
    <h2>Tambah Petugas</h2>
    </center>
    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">Form Tambah Petugas</div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Nama:</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="NamaUser" required> 
                        </div>

                        <div class="form-group">
                            <label class="form-label">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="Password" required> 
                        </div>

                        <div class="form-group">
                            <label class="form-label">Role:</label>
                            <select class="form-control" name="Level" required>
                                <option value="">Pilih Role</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                            <a href="?page=user" class="btn btn-md btn-danger">Kembali</a>
                        </div>
                        
                        <?php
                        
                        require '../koneksi/connect.php';
                        if(isset($_POST['tambah'])){
                            $nama_user = $_POST['NamaUser'];
                            $password = md5($_POST['Password']);
                            $level = $_POST['Level'];
                            
                            $query = mysqli_query($conn, "INSERT INTO user (NamaUser, Password, Level) VALUES ('$nama_user', '$password', '$level')");
                            if($query){
                                echo "<script>alert('Berhasil menambahkan user')</script>";
                                echo "<script>window.location='index.php?page=user';</script>";
                            } else {
                                echo "<script>alert('Gagal menambahkan user')</script>";
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
