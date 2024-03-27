<?php

include "koneksi.php";

if (isset($_GET['no_prakerja'])) {
    $no_prakerja = $_GET['no_prakerja'];
    //proses delete
    $q = mysqli_query($koneksi,"delete from prakerja where no_prakerja='$no_prakerja'");

    if($q) {
        echo "<script>alert('Hapus data berhasil!');window.location.href='tabel.php'</script>";
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Data Prakerja</title>
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
            color: white; 
        }
        .container {
            text-align: center;
        }
        .button img {
            width: auto;
            height: 180px;
        }
        table {
            background-color: white;
            width: 70%;
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
            width: 80px;
        }
        .hapus-button {
            background-color: #f44336; 
            color: white;
            width: 80px;
        }
        .ubah-button:hover, .hapus-button:hover {
            opacity: 0.8;
        }
        .inline-block {
        display: inline-block;
        
    }
    h2 {
        color: white;
        text-align: center;
    }
    </style>
</head>
<body>
<h1>Manajemen CRUD Data Prakerja </h1>
        <br>
        <form action="" method="POST">
        <table style="border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border: none;">
                <input type="text" name="cari" placeholder="Cari Data User">
                <button type="submit">Cari</button>
            </th>
            <th style="text-align: center; border: none;">
            <a href="create.php">+ Tambah Data</a>
</th>
        </tr>
    </thead>
</table>
        </form>
        <table border="1"> 
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Kartu Prakerja</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_POST['cari'])) {
                    $cari = $_POST['cari'];
                    $data = mysqli_query($koneksi,"select * from prakerja 
                    where no_prakerja like '%".$cari."%' or
                    nama like '%".$cari."%' or
                    alamat like '%".$cari."%'
                    ");
                } else {
                    $data = mysqli_query($koneksi,"select * from prakerja");
                }
                    $no = 1;
                    while($r = mysqli_fetch_array($data)) :
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $r['no_prakerja']; ?></td>
                    <td><?php echo $r['nama']; ?></td>
                    <td><?php echo $r['alamat']; ?></td>
                    <td style="text-align: center;">
    <a href="update.php?no_prakerja=<?php echo $r['no_prakerja']; ?>">
        <button class="ubah-button">Ubah</button>
    </a>
    | 
    <button class="hapus-button" onclick="hapusData('tabel.php?no_prakerja=<?php echo $r['no_prakerja']; ?>','<?php echo $r['nama']; ?>')">Hapus</button>
</td>
                </tr>
        <?php
        $no++;
        endwhile;
        ?>
        </tbody>
        </table>
        <br>
        <h2>Program Aplikasi Pelatihan</h2>
        <br>
        <div class="container">
    <a href="perhitungan.php" class="button">
        <img src="https://lh3.googleusercontent.com/W3_cw8aLWoKze27lNqjGnUWksYH2j8ywjHR3iJn4Oc107FbWmEMf52HAFvmHJR7CPg" alt="Ubah">
    </a>
    <a href="todo.php" class="button">
        <img src="https://cdn.icon-icons.com/icons2/2890/PNG/512/apps_tools_logo_apple_reminders_notebook_notes_note_checklist_list_to_do_list_icon_182747.png" alt="Ubah">
    </a>
</div>

</body>
</html>
<script>
    function hapusData(urlHapus,data){
        if(confirm("Apakah anda yakin menghapus atas nama "+data+"?")){
            window.location.href=urlHapus;
        }
    }
</script>

