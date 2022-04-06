<?php
require '../../BusinessLogic/Dabes.php';
require '../../BusinessLogic/Read.php';
require '../../BusinessLogic/Update.php';

$read = new Read();
$update = new Update();

$id_film = $_GET['id_film'];
$films = $read->showFilmsById($id_film);
$genres = $read->showListGenres();
$directors = $read->showDirector();
$productions = $read->showProduction();

$checked = explode(', ', $films[0]['genre_name']);

if (isset($_POST['edit'])) {
    if ($update->updateFilm($_POST) > 0) {
        echo "DATA BERHASIL DITAMBAHKAN";
    } else {
        echo "FAILED";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <input type="hidden" name="id_film" value="<?php echo $films[0]['id_film'] ?>">
            <input type="hidden" name="oldPicture" value="<?php echo $films[0]['picture'] ?>">
            <tr>
                <td><label for="title">Title</label></td>
                <td><input type="text" name="title" id="title" value="<?php echo $films[0]['title'] ?>"></td>
            </tr>
            <tr>
                <td><label for="genres">Genre :</label></td>
                <td>
                    <?php foreach ($genres as $genre) : ?>
                        <input type="hidden" name="genre_id" value="<?php echo $genre['id_list'] ?>">
                        <input type="checkbox" name="genres[]" id="<?php echo $genre['genre_list'] ?>" value="<?php echo $genre['genre_list'] ?>" <?php in_array($genre['genre_list'], $checked) ? print "checked" : "" ?>>
                        <label for="<?php echo $genre['genre_list'] ?>"><?php echo $genre['genre_list'] ?></label>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td><label for="release_date">Release</label></td>
                <td><input type="date" name="release_date" id="release_date" value="<?php echo $films[0]['release_date'] ?>"></td>
            </tr>
            <tr>
                <!-- <img src="" alt=""> -->
                <td><label for="picture">Picture</label></td>
                <td><img src="uploaded/<?php echo $films[0]['picture'] ?>" alt="<?php echo $films[0]['picture'] ?>" width="120" height="120"></td>
                <td><input type="file" name="picture"></td>
            </tr>
            <tr>
                <td><label for="synopsis">Synopsis</label></td>
                <td><textarea name="synopsis" id="synopsis" cols="30" rows="10"><?php echo $films[0]['synopsis'] ?></textarea></td>
            </tr>
            <tr>
                <td><label for="runtime">Runtime</label></td>
                <td><input type="text" name="runtime" id="runtime" value="<?php echo $films[0]['runtime'] ?>"></td>
            </tr>
            <tr>
                <td><label for="director">Director</label></td>
                <td>
                    <select name="director" id="director">
                        <option value="">Select Genre</option>
                        <?php foreach ($directors as $director) : ?>
                            <option value="<?php echo $director['id'] ?>" <?= ($director['name'] == $films[0]['name']) ? 'selected' : '' ?>><?php echo $director['name'] ?></option>

                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="production">Production</label></td>
                <td>
                    <select name="production" id="production">
                        <option value="">Select Genre</option>
                        <?php foreach ($productions as $production) : ?>
                            <option value="<?php echo $production['id_production'] ?>" <?= ($production['name_production'] == $films[0]['name_production']) ? 'selected' : '' ?>><?php echo $production['name_production'] ?></option>

                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="edit">Edit</button></td>
            </tr>
        </table>
    </form>
</body>

</html>