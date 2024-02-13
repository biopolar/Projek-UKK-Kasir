<?php 

include "../koneksi/connect.php";

error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    $NamaUser = $_POST['NamaUser'];
    $Password = md5($_POST['Password']);

    $sql = "SELECT * FROM user WHERE NamaUser='$NamaUser' AND Password='$Password' ";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        // Mengambil informasi level dari database
        $level = $row['Level'];
        $_SESSION['Level'] = $level;

        $_SESSION['NamaUser'] = $row['NamaUser'];

        header("Location: index.php");        
        echo "<script>alert('Berhasil Masuk!')</script>";
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <form action="" class="form-signin" method="post"> 
              <h3 class="">Login</h3>
                <div class="card-body">
                  <form action="" method="post">
                    <div class="mb-3 mt-3">
                      <table for="" class="form-label">Nama</table>
                      <input type="text" name="NamaUser" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="" class="form-label">Password</label>
                      <input type="password" name="Password" class="form-control" required autofocus>
                    </div>
                    <button name="submit" class="btn btn-primary">Login</button>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="../Bootstrap//bootstrap.min.js"></script>
    <script src="../Bootstrap/jquery.min.js "></script>
  </body>
</html>