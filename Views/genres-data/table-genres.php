<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();
$genres = $read->showListGenres();

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
            <td>Genre</td>
            <td>Action</td>
        </tr>
        <?php $a = 1 ?>
        <?php foreach ($genres as $genre) : ?>
            <tr>
                <td><?php echo $a ?></td>
                <td><?php echo $genre['genre_list'] ?></td>
                <td>
                    <a href="update-genre.php?id_list=<?php echo $genre['id_list'] ?>">Edit</a>
                    <a href="delete-genre.php?id_list=<?php echo $genre['id_list'] ?>">Delete</a>
                </td>
            </tr>
            <?php $a++ ?>
        <?php endforeach ?>
    </table>
</body>

</html>