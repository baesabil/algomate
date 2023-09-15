<?php 
include "koneksi.php";
$id_pengunjung = $_GET['id_pengunjung'];
$query = "DELETE FROM pengunjung WHERE id_pengunjung='$id_pengunjung'";

$data = mysqli_query($conn, $query) or die ($conn);

if($data){
    header("location:pengunjung.php");
}else{
    echo "data gagal dihapus";
}
?>