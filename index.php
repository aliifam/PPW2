<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD data Mahasiswa</title>
</head>
<body>
    <h1>CRUD Data Mahasiswa</h1>

    <a href="create.php">Tambah Data mahasiswa</a>

    <br/>
    <br/>

    <table border=1>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Semester</th>
            <th>Update/delete</th>
        </tr>
        <?php
            require_once "conn.php";

            $no = 1;

            $datamhs = mysqli_query($conn, "SELECT * FROM mahasiswa");
            while ($data = mysqli_fetch_array($datamhs)) {
                echo "<tr>
                    <td>$no</td>
                    <td>$data[nama]</td>
                    <td>$data[email]</td>
                    <td>$data[gender]</td>
                    <td>$data[semester]</td>
                    <td>
                        <a href='edit.php?id=$data[id]'>Edit</a>
                        <br>
                        <a href='delete.php?id=$data[id]'>Delete</a>
                    </td>
                </tr>
                ";
                $no++;
            }
        ?>
    </table>
</body>
</html>