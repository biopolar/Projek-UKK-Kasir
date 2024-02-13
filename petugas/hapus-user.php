<?php
// include database connection file
include_once("../koneksi/connect.php");
 
// Get id from URL to delete that user
$id = $_GET['UserID'];
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM user WHERE UserID=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php?page=user");
?>