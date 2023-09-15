<?php 
include "koneksi.php";
$id_admin = $_GET['id_admin'];
$query = "DELETE FROM admin WHERE id_admin='$id_admin'";

$data = mysqli_query($conn, $query) or die ($conn);

if($data){
    header("location:admin.php");
}else{
    echo "data gagal dihapus";
}
?>