<?php
require '../../BusinessLogic/Dabes.php';
require '../../BusinessLogic/Read.php';

$read = new Read();
$films = $read->showFilms();


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
            <td>Picture</td>
            <td>Title</td>
            <td>Genre</td>
            <td>Production</td>
            <td>Release Date</td>
            <td>Director</td>
            <td>Action</td>
        </tr>
        <?php $a = 1 ?>
        <?php foreach ($films as $film) : ?>
            <tr>
                <td><?php echo $a ?></td>
                <td><img src="../uploaded/<?php echo $film['picture'] ?>" alt="<?php echo $film['picture'] ?>" width="120" height="120"></td>
                <td><?php echo $film['title'] ?></td>
                <td><?php echo $film['genre_name'] ?></td>
                <td><?php echo $film['name_production'] ?></td>
                <td><?php echo $film['release_date'] ?></td>
                <td><?php echo $film['name'] ?></td>
                <td>
                    <a href="detail-film.php?id_film=<?php echo $film['id_film'] ?>">Detail</a>
                    <a href="update-film.php?id_film=<?php echo $film['id_film'] ?>">Edit</a>
                    <a href="delete-film.php?id_film=<?php echo $film['id_film'] ?>">Delete</a>
                </td>
            </tr>
            <?php $a++ ?>
        <?php endforeach ?>
    </table>
</body>

</html>