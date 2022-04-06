<?php
require '../../BusinessLogic/Dabes.php';
require '../../BusinessLogic/Create.php';
require '../../BusinessLogic/Read.php';
// $db = new Dabes();
$create = new CreateFilm();
$read = new Read();

$genres = $read->showListGenres();
$directors = $read->showDirector();
$productions = $read->showProduction();



if (isset($_POST['add'])) {
    if ($create->addFilm($_POST) > 0) {
        // $upload = $db->uploadFilm($_FILES);
        // $status = $db->addFilm($_POST);
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
            <tr>
                <td><label for="title">Title</label></td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td><label for="genres">Genre :</label></td>
                <?php foreach ($genres as $genre) : ?>
                    <td>
                        <input type="hidden" name="genre_id" value="<?php echo $genre['id_list'] ?>">
                        <input type="checkbox" name="genres[]" id="<?php echo $genre['genre_list'] ?>" value="<?php echo $genre['genre_list'] ?>">
                        <label for="<?php echo $genre['genre_list'] ?>"><?php echo $genre['genre_list'] ?></label>
                    </td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td><label for="release_date">Release</label></td>
                <td><input type="date" name="release_date"></td>
            </tr>
            <tr>
                <td><label for="picture">Picture</label></td>
                <td><input type="file" name="picture"></td>
            </tr>
            <tr>
                <td><label for="synopsis">Synopsis</label></td>
                <td><textarea name="synopsis" id="synopsis" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><label for="runtime">Runtime</label></td>
                <td><input type="text" name="runtime"></td>
            </tr>
            <tr>
                <td><label for="director">Director</label></td>
                <td>
                    <select name="director" id="director">
                        <option value="">Select Genre</option>
                        <?php foreach ($directors as $director) : ?>
                            <option value="<?php echo $director['id'] ?>"><?php echo $director['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="production">Production</label></td>
                <td>
                    <select name="production" id="production">
                        <option value="">Select Production</option>
                        <?php foreach ($productions as $production) : ?>
                            <option value="<?php echo $production['id_production'] ?>"><?php echo $production['name_production'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="add">Add</button></td>
            </tr>
        </table>
    </form>
</body>

</html>