<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login-admin.php');
    exit();
}
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Delete.php';

$delete = new Delete();
$id_list = $_GET['id_list'];
if ($delete->deleteGenreList($id_list) > 0) {
    $error = false;
    $status = 'success';
    header('Location: genretable-panel.php?status=' . $status);
} else {
    $error = true;
    $status = 'failed';
    header('Location: genretable-panel.php?status=' . $status);
}
