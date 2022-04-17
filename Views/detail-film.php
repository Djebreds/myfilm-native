<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';
$read = new Read();

$id_film = $_GET['id_film'];
$shows = $read->showFilmsById($id_film);

$date = $shows[0]['release_date'];
$release = date("d F Y", strtotime($date));

// echo "<pre>";
// var_dump($shows);
// die;
?>
<?php require 'header.php' ?>
<div class="card mt-4 shadow  mb-2 bg-body rounded">
    <div class="card-header">
        <a href="#" class="title-card">Detail Film</a>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row m-3">
                <div class="hstack gap-3">
                    <div class="col-3">
                        <img src="uploaded/<?php echo $shows[0]['picture'] ?>" style="width: 250px; height: 375px" class="rounded image-detail" alt="">
                    </div>
                    <div class="vr "></div>
                    <div class="header-detail align-self-start">
                        <div class="col-12">
                            <p><span class="header-title"><?php echo $shows[0]['title'] ?></span></p>
                            <hr class="haer">
                            <p><span class="header-item">Genre:</span> <?php echo $shows[0]['genre_name'] ?></p>
                            <p><span class="header-item">Production:</span> <?php echo $shows[0]['name_production'] ?></p>
                            <p><span class="header-item">Director:</span> <?php echo $shows[0]['name_director'] ?></p>
                            <p><span class="header-item">Release:</span> <?php echo $release ?></p>
                            <p><span class="header-item">Trailer:</span> <?php echo $shows[0]['trailer'] ?></p>
                            <p><span class="header-item">Synopsis:</span></p>
                            <p><?php echo $shows[0]['synopsis'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="hstack ">
                    <button type="button" class="btn btn-primary ms-auto" onclick="history.back()">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>