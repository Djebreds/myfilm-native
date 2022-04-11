<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();
$poster = $read->showFilms();
$genres = $read->showListGenres();

// $genre_name = $_GET['page'];
$genre_name = "Action";
$genre_name = $_GET['page'];
if ($genre_name == "All") {
    $posters = $read->showFilms();
} else {
    $posters = $read->showFilmByGenre($genre_name);
}


// $countPerPage = 10;
// $countData = count($read->showFilms());
// $countPage = ceil($countData / $countPerPage);
// $activePage = (isset($_GET['page']) ? $_GET['page'] : 1);
// // $firstData = ($countPerPage * $activePage) - $countPerPage;
// $gere = 'Action';

// $genre = $poster[0]['genre_name'];
// $get_genre = explode(', ', $genre);


// echo "<pre>";
// var_dump($posters);
// die;



?>

<?php require 'header.php' ?>
<section>
    <div class="container">
        <div class="row g-0 ">
            <div class="col-2">
                <nav class="nav flex-column side-nav">
                    <a class="nav-link" aria-current="page" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#0d6efd" class="bi bi-house-fill" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg> Home</a>
                    <a class="nav-link text-primary fw-bold" href="film.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#0d6efd" class="bi bi-camera-video-fill" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5z" />
                        </svg> Film</a>
                    <hr class="line">
                    <a class="nav-link mb-3" href="about.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#0d6efd" class="bi bi-info-circle-fill" viewBox="0 0 20 20">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </svg> About</a>
                </nav>
            </div>
            <div class="col-md-10">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Genre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trailer</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col">
                        <nav aria-label="...">
                            <ul class="pagination pagination-sm">
                                <div class="row g-2">
                                    <div class="col">
                                        <?php if ($genre_name == "All") { ?>
                                            <li class="page-item text-center active"><a class="page-link m-1" href="?page=All "><img src="../Views/assets/genre-pic/All.png" width="25px" class="m-1" alt=""> All</a></li>
                                        <?php } else { ?>
                                            <li class="page-item text-center"><a class="page-link m-1" href="?page=All "><img src="../Views/assets/genre-pic/All.png" width="25px" class="m-1" alt=""> All</a></li>
                                        <?php } ?>
                                    </div>
                                    <?php foreach ($genres as $genre) { ?>
                                        <div class="col">
                                            <?php if ($genre_name == $genre['genre_list']) { ?>
                                                <li class="page-item text-center <?php echo ($genre_name == $genre['genre_list']) ? 'active' : '' ?>"><a class="page-link m-1" href="?page=<?php echo $genre['genre_list'] ?>"><img class="sticky-top m-1" src="../Views/assets/genre-pic/genre-<?php echo $genre['id_list'] ?>.png" width="25px" alt=""><?php echo " " . $genre['genre_list'] ?></a></li>
                                            <?php } else { ?>
                                                <li class="page-item text-center"><a class="page-link m-1" href="?page=<?php echo $genre['genre_list'] ?>"><img class="sticky-top m-1" src="../Views/assets/genre-pic/genre-<?php echo $genre['id_list'] ?>.png" width="25px" alt=""><?php echo " " . $genre['genre_list'] ?></a></li>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>
                <hr>
                <!-- <div class="row g-0 justify-content-center">
                    
                        <div class="col-4 m-1" style="width: 16rem">
                            <div class="card mt-2 border border-white">
                                <img src=" ../Views/assets/big-hero-lg.png" class="rounded-3 card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="#" class="stretched-link"> Big Hero 6</a>
                                    </div>
                                    <p class="card-item">20-8-2016 • Action, Adventure, Sci-Fi</p>
                                </div>
                            </div>
                        </div>
                    
                    <hr>
                </div> -->
                <div class="row g-0">
                    <?php foreach ($posters as $poster) { ?>
                        <div class="col-2 m-1" style="width: 9.1rem">
                            <div class="card border border-white">
                                <img src=" ../Views/assets/naruto.png" class="rounded-3 card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="detail.php?id_film=<?php echo $poster['id_film'] ?>" class="stretched-link"> <?php echo $poster['title'] ?></a>
                                    </div>
                                    <p class="card-item"><?php echo $poster['release_date'] ?> • <?php echo $poster['genre_name'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'footer.php' ?>