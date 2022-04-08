<?php
require '../../BusinessLogic/Dabes.php';
require '../../BusinessLogic/Delete.php';

$delete = new Delete();
$id_film = $_GET['id_film'];
if ($delete->deleteFilm($id_film) > 0) {
    echo "DATA BERHASIL DIHAPUS";
} else {
    echo "GAGAL";
}
