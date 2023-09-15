<?php
include "koneksi.php";
$id_materi = $_GET['id_materi'];
$query = "Delete from materi where id_materi='$id_materi'";

$data = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($data){
    header("location:materi.php");
}else{
    echo "data gagal dihapus";
    echo "<br><a href='materi.php'><< Kembali ke halaman event</a>";
}
?>