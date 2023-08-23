<?php

    $servername = "localhost"; //Nama server
    $username = "root"; //Username Xampp
    $password = ""; //Password Xampp
    $db = "algomate"; //Nama DB

    //Membuat Koneksi
    $conn = new mysqli($servername, $username, $password, $db);

//Cek Koneksi
if($conn->connect_error){
    die("Connection Failed".$conn->connect_error);
}else{
     //echo "Connection Success";
}
?>