<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Luas Bangun Datar</title>
    <style>
        body {
            background-color: hsl(210, 50%, 20%);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        h2 {
            text-align: center;
            color: white;
        }
        form {
            background-color: white;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="back"] {
            color: black;
            border: none;
            cursor: pointer;
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
        #input_fields {
        margin-top: 10px; 
    }
    </style>
</head>
<body>
    <h2>Perhitungan Luas Bangun Datar</h2>
    <form method="post">
        <select name="pilih_bangun" id="pilih_bangun">
        <option value="pilih">Pilih Bangun Datar</option>
            <option value="persegi">Persegi</option>
            <option value="lingkaran">Lingkaran</option>
            <option value="segitiga">Segitiga</option>
            <option value="persegipanjang">Persegi Panjang</option>
        </select>
        <div id="input_fields"></div>
        <br>
        <input type="submit" name="hitung" value="Hitung">
        <br>
        <a href="tabel.php" style="display: flex; justify-content: center; align-items: center; text-decoration: none;">
    <button type="button" style="padding: 8px;">Kembali ke Halaman Utama</button>
</a>



    </form>

    <?php
    if(isset($_POST['hitung'])) {
        if(isset($_POST['pilih_bangun'])) {
            $selected_option = $_POST['pilih_bangun'];
            if($selected_option === 'persegi') {
                $sisi = $_POST['sisi'];
                $luas_persegi = $sisi * $sisi;
                echo "<div class='result'>Luas Persegi: $luas_persegi</div>";
            } elseif($selected_option === 'lingkaran') {
                $jari_jari = $_POST['jari_jari'];
                $luas_lingkaran = pi() * $jari_jari * $jari_jari;
                echo "<div class='result'>Luas Lingkaran: $luas_lingkaran</div>";
            } elseif($selected_option === 'segitiga') {
                $alas = $_POST['alas'];
                $tinggi = $_POST['tinggi'];
                $luas_segitiga = (0.5) * $alas * $tinggi;
                echo "<div class='result'>Luas Segitiga: $luas_segitiga</div>";
            } elseif($selected_option === 'persegipanjang') {
                $panjang = $_POST['panjang'];
                $lebar = $_POST['lebar'];
                $luas_persegipanjang = $panjang * $lebar;
                echo "<div class='result'>Luas Persegi Panjang: $luas_persegipanjang</div>";
            }
        }
    }
    ?>

    <script>
        document.getElementById('pilih_bangun').addEventListener('change', function() {
            var selectedOption = this.value;
            var inputFieldsDiv = document.getElementById('input_fields');
            inputFieldsDiv.innerHTML = '';

            if(selectedOption === 'persegi') {
                inputFieldsDiv.innerHTML += '<label for="sisi">Panjang Sisi:</label>';
                inputFieldsDiv.innerHTML += '<input type="text" name="sisi" id="sisi" required>';
            } else if(selectedOption === 'lingkaran') {
                inputFieldsDiv.innerHTML += '<label for="jari_jari">Jari-Jari:</label>';
                inputFieldsDiv.innerHTML += '<input type="text" name="jari_jari" id="jari_jari" required>';
            } else if(selectedOption === 'segitiga') {
                inputFieldsDiv.innerHTML += '<label for="alas">Alas:</label>';
                inputFieldsDiv.innerHTML += '<input type="text" name="alas" id="alas" required><br>';
                inputFieldsDiv.innerHTML += '<label for="tinggi">Tinggi:</label>';
                inputFieldsDiv.innerHTML += '<input type="text" name="tinggi" id="tinggi" required>';
            } else if(selectedOption === 'persegipanjang') {
                inputFieldsDiv.innerHTML += '<label for="panjang">Panjang:</label>';
                inputFieldsDiv.innerHTML += '<input type="text" name="panjang" id="panjang" required><br>';
                inputFieldsDiv.innerHTML += '<label for="lebar">Lebar:</label>';
                inputFieldsDiv.innerHTML += '<input type="text" name="lebar" id="lebar" required>';
            }
        });
    </script>
</body>
</html>
