<?php
require '../BusinessLogic/database.php';

$db = new Dabes();

$id_film = $_GET['id_film'];
if ($db->deleteFilm($id_film) > 0) {
    echo "DATA BERHASIL DIHAPUS";
} else {
    echo "GAGAL";
}
