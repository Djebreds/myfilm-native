<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login-admin.php');
    exit();
}

require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Delete.php';

$delete = new Delete();
$id = $_GET['id'];
if ($delete->deleteDirector($id) > 0) {
    $status = 'success';
    header('Location: directortable-panel.php?status=' . $status);
} else {
    $status = 'failed';
    header('Location: directortable-panel.php?status=' . $status);
}
