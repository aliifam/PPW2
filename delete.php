<?php

require_once "conn.php";

$delete = mysqli_query($conn, "DELETE FROM mahasiswa WHERE id='$_GET[id]'");

if ($delete) {
    header('location:index.php');
} else {
    echo "gagal menghapus !";
}