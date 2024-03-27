<?php
$todos = [];

if(file_exists("todo.txt")) {
    $file = file_get_contents("todo.txt");
    $todos = unserialize($file);
}

if(isset($_POST['todo'])) {
    $data = $_POST['todo'];
    $todos[] = [
        'todo' => $data,
        'status' => 0
    ];
    $daftar_belanja = serialize($todos);
    file_put_contents("todo.txt", $daftar_belanja);
    header("location:todo.php");
}

if(isset($_GET['status']) && isset($_GET['key'])) {
    $key = $_GET['key'];
    $status = $_GET['status'];
    
    if(isset($todos[$key])) {
        $todos[$key]['status'] = $status;
        $daftar_belanja = serialize($todos);
        file_put_contents("todo.txt", $daftar_belanja);
        header("location:todo.php");
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if(isset($todos[$id])) {
        unset($todos[$id]);
        $daftar_belanja = serialize($todos);
        file_put_contents("todo.txt", $daftar_belanja);
        header("location:todo.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Apps</title>
    <style>
        body {
            background-color: hsl(210, 50%, 20%);
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: white;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="text"] {
            margin-bottom: 10px;
            padding: 5px;
            width: 200px;
        }
        button[type="submit"] {
            padding: 8px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button[type="button"] {
            padding: 8px;
            margin-top: 10px;
            border: none;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            display: flex;
            align-items: center;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        a {
            color: white;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h2>Todo Apps</h2>
    <form method="POST" action="">
        <label for="todo">Daftar Belanja hari ini</label><br>
        <input type="text" name="todo" id="todo" required>
        <button type="submit">Simpan</button>
    </form>
    <ul>
        <?php foreach($todos as $key => $value): ?>
            <li>
                <input type="checkbox" name="todo" onclick="window.location.href='todo.php?status=<?php echo ($value['status'] == '1') ? '0' : '1'; ?>&key=<?php echo $key; ?>'" <?php if($value['status'] == 1) echo 'checked'; ?>>
                <label><?php echo ($value['status'] == '1') ? "<del>".$value['todo']."</del>" : $value['todo']; ?></label>
                <a href="javascript:hapusData('todo.php?id=<?php echo $key; ?>','<?php echo $value['todo']; ?>')">Hapus</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="tabel.php">
    <button type="button">Kembali ke Halaman Utama</button>
</a>

    <script>
        function hapusData(urlHapus, data) {
            if(confirm("Apakah anda yakin menghapus daftar belanja " + data + "?")) {
                window.location.href = urlHapus;
            }
        }
    </script>
</body>
</html>
