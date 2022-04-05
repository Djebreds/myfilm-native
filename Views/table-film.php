<?php
require '../BusinessLogic/database.php';

$db = new Dabes();
$films = $db->showFilms();

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
        </tr>
        <?php foreach ($films as $film) : ?>
            <tr>
                <td><?php echo $film['id_film'] ?></td>
                <td><?php echo $film['picture'] ?></td>
                <td><?php echo $film['title'] ?></td>
                <td><?php echo $film['genre_name'] ?></td>
                <td><?php echo $film['name_production'] ?></td>
                <td><?php echo $film['release_date'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>