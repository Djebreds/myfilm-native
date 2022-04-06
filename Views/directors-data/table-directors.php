<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();
$directors = $read->showDirector();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Dummy</title>
</head>

<body>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>About</td>
            <td>Action</td>
        </tr>
        <?php $a = 1 ?>
        <?php foreach ($directors as $director) : ?>
            <tr>
                <td><?php echo $a ?></td>
                <td><?php echo $director['name'] ?></td>
                <td><?php echo $director['about'] ?></td>
                <td>
                    <a href="update-director.php?id=<?php echo $director['id'] ?>">Edit</a>
                    <a href="delete-director.php?id=<?php echo $director['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php $a++ ?>
        <?php endforeach ?>
    </table>
</body>

</html>