<?php
include("../koneksi/connect.php");

    $UserID = $_GET['UserID'];
    
    // Retrieve user data based on ID
    $result = mysqli_query($conn, "SELECT * FROM user WHERE UserID='$UserID'");
    $row = mysqli_fetch_assoc($result);

    if(!$row) {
        die("Error: Data not found.");
    }

    // Update user data
    if(isset($_POST['update'])) {
        $NamaUser = mysqli_real_escape_string($conn, $_POST['NamaUser']);
        $Password = md5(mysqli_real_escape_string($conn, $_POST['Password']));
        $Level = mysqli_real_escape_string($conn, $_POST['Level']);

        $updateQuery = mysqli_query($conn, "UPDATE user SET NamaUser='$NamaUser', Password='$Password', Level='$Level' WHERE UserID='$UserID'");

        if($updateQuery) {
            echo "User updated successfully. <a href='index.php?page=user'>View Users</a>";
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }

?>

<!-- Form HTML for Edit -->
<div class="row">
    <center>
        <h2>Edit Petugas</h2>
    </center>
    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">Form Edit Petugas</div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label class="form-label">Nama:</label>
                        <input type="text" class="form-control" value="<?php echo $row['NamaUser']; ?>" name="NamaUser" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" value="<?php echo $row['Password']; ?>" placeholder="Enter new password" name="Password" required>
                    </div>
                    
                    <div class="form-group">
                            <label class="form-label">Role:</label>
                            <select class="form-control" name="Level" required>
                                <option value="<?php echo $row['Level']; ?>"><?php echo $row['Level'] ?></option>
                                <option value="Administrator">Administrator</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>

                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="?page=user" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
