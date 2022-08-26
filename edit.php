<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>

    <?php
        require_once "conn.php";

        if (isset($_GET['id'])) {
            // ambil nilai id dari url dan disimpan dalam variabel $id
            $id = ($_GET["id"]);

            $data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
            $dl = mysqli_fetch_assoc($data);
        } else {
            die("error");
        }

        function injectSelected($selected, $value):string
        {
            return $selected === $value ? 'selected="selected"' : '';
        }
    ?>

    <form method="POST">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo $dl['nama'] ?>" required>

        <br>
        <br>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $dl['email'] ?>" required>

        <br>
        <br>

        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="cowo" <?php echo injectSelected($dl['gender'], "cowo") ?> >cowo</option>
            <option value="cewe" <?php echo injectSelected($dl['gender'], "cewe") ?> >cewe</option>
        </select>

        <br>
        <br>

        <label for="semester">Semester</label>
        <select name="semester" required>
            <option value="1" <?php echo injectSelected($dl['semester'], "1") ?> >1</option>
            <option value="2" <?php echo injectSelected($dl['semester'], "2") ?> >2</option>
            <option value="3" <?php echo injectSelected($dl['semester'], "3") ?> >3</option>
            <option value="4" <?php echo injectSelected($dl['semester'], "4") ?> >4</option>
            <option value="5" <?php echo injectSelected($dl['semester'], "5") ?> >5</option>
            <option value="6" <?php echo injectSelected($dl['semester'], "6") ?> >6</option>
            <option value="7" <?php echo injectSelected($dl['semester'], "7") ?> >7</option>
            <option value="8" <?php echo injectSelected($dl['semester'], "8") ?> >8</option>
        </select>

        <br>
        <br>

        <input type="submit" value="Edit Data">
    </form>

    <br><br>

    <a href="/index.php">Cancel</a>


    <?php
        require_once "conn.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $keyid = $dl['id'];
            
            $update = mysqli_query($conn, "UPDATE mahasiswa SET nama='$_POST[nama]', 
            email='$_POST[email]', gender='$_POST[gender]', semester='$_POST[semester]'
            WHERE id='$keyid'");

            if ($update) {
                header('location:index.php');
            } else {
                die("Gagal mengedit Data");
            }
        }
    ?>
</body>
</html>