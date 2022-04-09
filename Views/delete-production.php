<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Delete.php';

$delete = new Delete();
$id_production = $_GET['id_production'];
if ($delete->deleteProduction($id_production) > 0) {
    $error = false;
    $status = 'success';
    header('Location: productiontable-panel.php?status=' . $status);
} else {
    $error = true;
    $status = 'failed';
    header('Location: productiontable-panel.php?status=' . $status);
}
