<?php
include "koneksi.php";
$id_kategori_materi = $_GET['id_kategori_materi'];
$query = "DELETE FROM kategori_materi WHERE id_kategori_materi='$id_kategori_materi'";

$data = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($data){
    header("location:kategori-materi.php");
}else{
    echo "data gagal dihapus";
    echo "<br><a href='kategori-materi.php'><< Kembali ke halaman Materi</a>";
}
?>