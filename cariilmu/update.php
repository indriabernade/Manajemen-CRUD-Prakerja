<?php

include "koneksi.php";

if(isset($_POST['no_prakerja'])) {
    $no_prakerja = $_POST['no_prakerja'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    //proses input
    $q = mysqli_query($koneksi,"update prakerja set nama='$nama' , alamat='$alamat' 
    where no_prakerja='$no_prakerja'");
    if ($q){
        echo "<script>alert('Ubah Data berhasil!');window.location.href='tabel.php'</script>";
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
        .ubah-button {
            background-color: #4CAF50; 
            color: white;
        }
        .hapus-button {
            background-color: #f44336; 
            color: white;
        }
        .ubah-button:hover, .hapus-button:hover {
            opacity: 0.8;
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
        <?php
        $no_prakerja = $_GET['no_prakerja'];
        $data = mysqli_query($koneksi,"select * from prakerja where no_prakerja='$no_prakerja'");

        while($r = mysqli_fetch_array($data)) :
        
        ?>
        <form action="" method="POST">
        <table> 
            <tr>
        <th colspan="2" style="text-align: center;">Silahkan Mengubah Data User</th>
    </tr>
                <tr>
                    <th>No Kartu Prakerja</th>
                    <td><input type="text" name="no_prakerja" value="<?php echo $r['no_prakerja'];?>" required></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><input type="text" name="nama"  value="<?php echo $r['nama'];?>" required></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><input type="text" name="alamat"  value="<?php echo $r['alamat'];?>"required></td>
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
        </form>
        <?php endwhile; ?>
    </body>
</html>