<?php
include "koneksi.php";
$id_soal = $_GET['id_soal'];
$query = "Delete from soal where id_soal='$id_soal'";

$data = mysqli_query($conn,$query) or die($conn);

if($data){
    header("location:soal.php");
}else{
    echo "data gagal dihapus";
    echo "<br><a href='soal.php'><< Kembali ke halaman soal</a>";
}
?>