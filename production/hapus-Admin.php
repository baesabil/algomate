<?php
include "koneksi.php";
$id_admin = $_GET['id_admin'];
$query = "Delete from admin where id_admin='$id_admin'";

$data = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($data){
    header("location:materi.php");
}else{
    echo "data gagal dihapus";
    echo "<br><a href='admin.php'><< Kembali ke halaman admin</a>";
}
?>