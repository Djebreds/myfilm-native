<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Delete.php';

$delete = new Delete();
$id_film = $_GET['id_film'];
if ($delete->deleteFilm($id_film) > 0) {
    $error = false;
    $status = 'success';
    header('Location: filmtable-panel.php?status=' . $status);
} else {
    $error = false;
    $status = 'failed';
    header('Location: filmtable-panel.php?status=' . $status);
}
