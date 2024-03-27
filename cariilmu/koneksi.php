<?php
$koneksi = mysqli_connect("localhost","root","123456","prakerjadb");

if(mysqli_connect_errno()){
    die("Koneksi database gagal ".mysqli_connect_error());
}

?>
