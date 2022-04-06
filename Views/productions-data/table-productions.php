<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';
$read = new Read();
$productions = $read->showProduction();

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
            <td>Company Production</td>
            <td>Founded Date</td>
            <td>Action</td>
        </tr>
        <?php $a = 1 ?>
        <?php foreach ($productions as $production) : ?>
            <tr>
                <td><?php echo $a ?></td>
                <td><?php echo $production['name_production'] ?></td>
                <td><?php echo $production['founded_date'] ?></td>
                <td>
                    <a href="update-film.php?id_production=<?php echo $production['id_production'] ?>">Edit</a>
                    <a href="delete-film.php?id_production=<?php echo $production['id_production'] ?>">Delete</a>
                </td>
            </tr>
            <?php $a++ ?>
        <?php endforeach ?>
    </table>
</body>

</html>