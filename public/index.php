<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Author: Refi Ahmad Fauzan , This page for landing page">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Views/css/style-public-user.css">
    <title>List Film | Home</title>
</head>

<?php require 'header.php' ?>
<?php

$posters = $read->showFilms();

$countPerPage = 14;
$countData = count($read->showTableFilm());
$countPage = ceil($countData / $countPerPage);
$activePage = (isset($_GET['page']) ? $_GET['page'] : 1);
$firstData = ($countPerPage * $activePage) - $countPerPage;

$posters = $read->showLimitMain($firstData, $countPerPage);

$countPerPage = 7;
$countData = count($read->showTableFilm());
$countPage = ceil($countData / $countPerPage);
$activePage = (isset($_GET['page']) ? $_GET['page'] : 1);
$firstData = ($countPerPage * $activePage) - $countPerPage;

$upcomings = $read->showLimitMain(4, $countPerPage);
$upcomings2 = $read->showLimitMain(11, $countPerPage);
$populars = $read->showLimitMain(26, 4);





?>
<section>
    <div class="container">
        <div class="row g-0 ">
            <div class="col-2">
                <nav class="nav flex-column side-nav">
                    <a class="nav-link text-primary fw-bold" aria-current="page" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#0d6efd" class="bi bi-house-fill" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg> Home</a>
                    <a class="nav-link" href="film.php?page=All"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#0d6efd" class="bi bi-camera-video-fill" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z" />
                        </svg> Film</a>
                    <hr class="line">
                    <a class="nav-link" href="about.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#0d6efd" class="bi bi-info-circle-fill" viewBox="0 0 20 20">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </svg> About</a>

                </nav>
            </div>


            <!-- <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card with stretched link</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                    </div>
                </div>
            </div> -->
            <div class="col-md-10">
                <h5 class="top-film">Popular</h5>
                <hr class="line">
                <div class="row g-0 justify-content-center">
                    <?php $a = 1; ?>
                    <?php foreach ($populars as $popular) { ?>
                        <?php
                        $date = $popular['release_date'];
                        $release_date = date("d M Y", strtotime($date));
                        ?>
                        <div class="col-4 m-1" style="width: 16rem">
                            <div class="card mt-2 border border-0">
                                <img src=" ../Views/assets/populer-<?php echo $a ?>.png" style="max-width: 256px; max-height: 128px" class="rounded-3 card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="detail-film.php?id_film=<?php echo $popular['id_film'] ?>" class="stretched-link"> <?php echo $popular['title'] ?> </a>
                                    </div>
                                    <p class="card-item"><?php echo $release_date ?> • <?php echo $popular['genre_name'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php $a++ ?>
                    <?php } ?>
                </div>
                <h5 class="top-film">Upcoming Film</h5>
                <hr class="line">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row g-0 justify-content-center">
                                    <?php foreach ($upcomings as $upcoming) { ?>
                                        <?php
                                        $date = $upcoming['release_date'];
                                        $release_date = date("d M Y", strtotime($date));
                                        ?>
                                        <div class="col-2 m-1 m-1" style="width: 9.1rem">
                                            <div class="card border border-0">
                                                <img src=" ../Views/uploaded/<?php echo $upcoming['picture'] ?>" style="width: 146px; height: 218px" class="rounded-3 card-img-top" alt="...">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <a href="detail-film.php?id_film=<?php echo $upcoming['id_film'] ?>" class="stretched-link"><?php echo $upcoming['title'] ?></a>
                                                    </div>
                                                    <p class="card-item"><?php echo $release_date ?> • <?php echo $upcoming['genre_name'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row g-0 justify-content-center">
                                    <?php foreach ($upcomings2 as $upcoming) { ?>
                                        <?php
                                        $date = $upcoming['release_date'];
                                        $release_date = date("d M Y", strtotime($date));
                                        ?>
                                        <div class="col-2 m-1 m-1" style="width: 9.1rem">
                                            <div class="card border border-0">
                                                <img src=" ../Views/uploaded/<?php echo $upcoming['picture'] ?>" style="width: 146px; height: 218px" class="rounded-3 card-img-top" alt="...">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <a href="detail-film.php?id_film=<?php echo $upcoming['id_film'] ?>" class="stretched-link"><?php echo $upcoming['title'] ?></a>
                                                    </div>
                                                    <p class="card-item"><?php echo $release_date ?> • <?php echo $upcoming['genre_name'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-50 start-0 translate-middle next-1">
                        <button class="carousel-control-prev next-1" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg>
                        </button>
                    </div>
                    <div class="position-absolute top-50 start-100 translate-middle next-2">
                        <button class="carousel-control-next next-2" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <h5 class="top-film">Recomended Film</h5>
                <hr class="line">
                <div class="row g-0">
                    <?php foreach ($posters as $poster) { ?>
                        <?php
                        $date = $poster['release_date'];
                        $release_date = date("d M Y", strtotime($date));
                        ?>
                        <div class="col-2 m-1 m-1" style="width: 9.1rem">
                            <div class="card border border-0">
                                <img src=" ../Views/uploaded/<?php echo $poster['picture'] ?>" style="width: 146px; height: 218px" class="rounded-3 card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="detail-film.php?id_film=<?php echo $poster['id_film'] ?>" class="stretched-link"> <?php echo $poster['title'] ?></a>
                                    </div>
                                    <p class="card-item"><span class="date"><?php echo $release_date ?></span><?php echo " • " ?> <?php echo $poster['genre_name'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
</section>

<?php require 'footer.php' ?>