<?php

include "koneksi.php";

if(isset($_POST['no_prakerja'])) {
    $no_prakerja = $_POST['no_prakerja'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    //proses input
    $q = mysqli_query($koneksi,"insert into prakerja (no_prakerja,nama,alamat) 
    values ('$no_prakerja','$nama','$alamat')");
    if ($q){
        echo "<script>alert('Input Data berhasil!');window.location.href='tabel.php'</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
    }


?>
<html>
    <head>
        <title>Tambah Data Prakerja</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: hsl(210, 50%, 20%);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
        }
        table {
            background-color: white;
            border-collapse: collapse;
            margin: auto;
            margin-top: 20px;
            padding: 10px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #4CAF50; ;
        }
        a:hover {
            color: darkblue;
        }
        input[type="text"] {
            padding: 5px;
            width: 200px;
        }
        button[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .inline-block {
        display: inline-block;
        
    }
    h1 {
            color: white;
        }
    </style>
    </head>
    <body>
        <br>
        <h1>Data Data Prakerja </h1>
        <br>
        <form action="" method="POST">
        <table>
    <tr>
        <th colspan="2" style="text-align: center;">Silahkan Mengisi Data User</th>
    </tr>
    <tr>
        <th>No Kartu Prakerja</th>
        <td><input type="text" name="no_prakerja" required></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><input type="text" name="nama" required></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><input type="text" name="alamat" required></td>
    </tr>
    <tr>
    <td colspan="2" style="text-align: center;">
        <div>
        <a href="tabel.php">
    <button type="button">Kembali</button>
</a>
            <button type="submit">Simpan</button>
        </div>
    </td>
</tr>
</table>
        </table>
        </form>
    </body>
</html>