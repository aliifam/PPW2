<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form method="POST">
        <label for="nama">Nama</label>
        <input type="text" name="nama" required>

        <br>
        <br>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <br>
        <br>

        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="cowo">cowo</option>
            <option value="cewe">cewe</option>
        </select>

        <br>
        <br>

        <label for="semester">Semester</label>
        <select name="semester" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>

        <br>
        <br>

        <input type="submit" value="Tambah Data">
        
    </form>

    <br><br>

    <a href="/index.php">Cancel</a>


    <?php
        require_once "conn.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $create = mysqli_query($conn, "INSERT INTO mahasiswa(nama, email, gender, semester)
            VALUES('$_POST[nama]', '$_POST[email]', '$_POST[gender]', '$_POST[semester]')");

            if ($create) {
                header('location:index.php');
            } else {
                echo "Gagal Menambahkan Data";
            }
        }
    ?>
</body>
</html>