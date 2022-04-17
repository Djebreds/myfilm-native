<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login-admin.php');
    exit();
}
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Delete.php';

$delete = new Delete();
$id_film = $_GET['id_film'];
if ($delete->deleteFilm($id_film) > 0) {
    $error = false;
    $status = 'success';
    header('Location: maintable-panel.php?status=' . $status);
} else {
    $error = false;
    $status = 'failed';
    header('Location: maintable-panel.php?status=' . $status);
}
