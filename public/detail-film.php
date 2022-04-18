<?php require 'header.php' ?>
<?php


$read = new Read();

$id_film = $_GET['id_film'];
$poster = $read->showFilmsById($id_film);

$genre = explode(', ', $poster[0]['genre_name']);

$production = $read->searchProduction($poster[0]['name_production']);
$director = $read->searchDirector($poster[0]['name_director']);




?>

<section>
    <div class="container">
        <div class="row g-0">
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
            <div class="col-10">
                <div class="row g-0">
                    <div class="col col-sm-12">
                        <div class='embed-container'>
                            <div class="ratio ratio-21x9">
                                <iframe src='<?php echo $poster[0]['trailer'] ?>' class="rounded-3" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Detail</button>
                                <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">About</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="card border border-white ms-2 mb-3 mt-2">
                                        <div class="row g-0">
                                            <div class="col-md-3 m-2 p-2">
                                                <img src="../Views/uploaded/<?php echo $poster[0]['picture'] ?>" style="width: 248px; height: 371px" class="img-fluid rounded-3" alt="...">
                                            </div>
                                            <div class="col-md-8 m-2">
                                                <div class="card-body">
                                                    <div class="card-item">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?php
                                                                $date = $poster[0]['release_date'];
                                                                $release_date = date("d M Y", strtotime($date));
                                                                ?>
                                                                <h4 class="card-title"><?php echo $poster[0]['title'] ?></h4>
                                                                <hr>
                                                                <p class="mb-1"><span class="card-list">Release date : </span> <?php echo $release_date ?></p>
                                                                <p class="mb-1"><span class="card-list">Production : </span><?php echo $poster[0]['name_production'] ?></p>
                                                                <p class="mb-1"><span class="card-list">Directed by : </span><?php echo $poster[0]['name_director'] ?></p>
                                                                <p class="mb-1"><span class="card-list">Duration : </span> <?php echo $poster[0]['runtime'] ?> minute</p>
                                                            </div>
                                                            <div class="col">
                                                                <nav>
                                                                    <ul class="pagination pagination paginasi mt-1">
                                                                        <?php for ($a = 0; $a < count($genre); $a++) { ?>
                                                                            <div class="col-sm-3">
                                                                                <li class="page-item text-center item-paginasi me-2"><a class="page-link" href="film.php?page=<?php echo $genre[$a] ?>"><?php echo $genre[$a] ?></a></li>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                        </div>
                                                        <p class="mb-1"><span class="card-list">Synopsis : </span></p>
                                                        <p><?php echo $poster[0]['synopsis'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="card border border-white mt-2 ms-2 mb-3">
                                        <div class="card-body">
                                            <div class="card-item">
                                                <div class="row g-0">
                                                    <div class="col-md-10">
                                                        <?php
                                                        $date = $production[0]['founded_date'];
                                                        $founded_date = date("d M Y", strtotime($date));
                                                        ?>
                                                        <h4 class="card-about">Production Company : </h4>
                                                        <h5 class="text-primary"><?php echo $production[0]['name_production'] ?> | <?php echo $founded_date ?></h5>
                                                        <hr>
                                                        <h4 class="card-about">Director :</h4>
                                                        <h5 class="text-primary"><?php echo $director[0]['name_director'] ?></h5>
                                                        <p><?php echo $director[0]['about'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php require 'footer.php' ?>