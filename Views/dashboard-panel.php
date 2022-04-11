<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';
require '../BusinessLogic/Create.php';
$create = new CreateFilm();
$read = new Read();

$genres = $read->showListGenres();
$directors = $read->showDirector();
$productions = $read->showProduction();
$films = $read->showFilms();

$tableMain = $read->showLimitMain(0, 10);
$tableFilms = $read->showLimitFilm(0, 10);
$tableGenres = $read->showLimitGenre(0, 10);
$tableProductons = $read->showLimitProduction(0, 10);
$tableDirectors = $read->showLimitDirector(0, 10);


?>
<?php require 'header.php' ?>
<h2>Dashboard</h2>
<div class="dahsboard">
    <div class="row">
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-0 border-bottom-0 border-primary shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="status-film">
                                <h6 class="card-title count">COUNT DATA FILMS</h6>
                                <p class="status"><?php echo count($films) ?> Films</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-film icon-film" viewBox="0 0 20 20">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-0 border-bottom-0 border-success shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body text-success">
                    <div class="row">
                        <div class="col-9">
                            <div class="status-film">
                                <h6 class="card-title count">COUNT DATA GENRES</h6>
                                <p class="status"><?php echo count($genres) ?> Genres</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-film icon-film" viewBox="0 0 20 20">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-0 border-bottom-0 border-warning shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="status-film">
                                <h6 class="card-title count">COUNT DATA PRODUCTIONS</h6>
                                <p class="status"><?php echo count($productions) ?> Productions</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-film icon-film" viewBox="0 0 20 20">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-0 border-bottom-0 border-info shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="status-film">
                                <h6 class="card-title count">COUNT DATA DIRECTORS</h6>
                                <p class="status"><?php echo count($directors) ?> Directors</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-film icon-film" viewBox="0 0 20 20">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                <div class="card-header">
                    <a href="maintable-panel.php" class="title-card">Table Main</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm tabel   ">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Production</th>
                            <th scope="col">Release Date</th>
                            <th scope="col">Director</th>
                        </tr>
                        <?php $a = 1 ?>
                        <?php foreach ($tableMain as $film) : ?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $film['title'] ?></td>
                                <td><?php echo $film['genre_name'] ?></td>
                                <td><?php echo $film['name_production'] ?></td>
                                <td><?php echo $film['release_date'] ?></td>
                                <td><?php echo $film['name_director'] ?></td>
                            </tr>
                            <?php $a++ ?>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                        <div class="card-header">
                            <a href="productiontable-panel.php" class="title-card">Table Productions</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm tabel   ">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name Company</th>
                                    <th scope="col">Founded Date</th>
                                </tr>
                                <?php $a = 1 ?>
                                <?php foreach ($tableProductons as $production) : ?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><?php echo $production['name_production'] ?></td>
                                        <td><?php echo $production['founded_date'] ?></td>
                                    </tr>
                                    <?php $a++ ?>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                        <div class="card-header">
                            <a href="filmtable-panel.php" class="title-card">Table Film</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm tabel   ">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Release Date</th>
                                </tr>
                                <?php $a = 1 ?>
                                <?php foreach ($tableFilms as $tableFilm) : ?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><?php echo $tableFilm['picture'] ?></td>
                                        <td><?php echo $tableFilm['title'] ?></td>
                                        <td><?php echo $tableFilm['runtime'] ?></td>
                                        <td><?php echo $tableFilm['release_date'] ?></td>
                                    </tr>
                                    <?php $a++ ?>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                <div class="card-header">
                    <a href="directortable-panel.php" class="title-card">Table Directors</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm tabel">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name </th>
                            <th scope="col">About</th>
                        </tr>
                        <?php $a = 1 ?>
                        <?php foreach ($tableDirectors as $director) : ?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $director['name_director'] ?></td>
                                <td><a href="director-detail.php?id=<?php echo $director['id'] ?>">Detail</a></td>
                            </tr>
                            <?php $a++ ?>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
            <div class="col-auto">
                <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                    <div class="card-header">
                        <a href="genretable-panel.php" class="title-card">Table Genres</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm tabel   ">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Genre List</th>
                            </tr>
                            <?php $a = 1 ?>
                            <?php foreach ($tableGenres as $genre) : ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?php echo $genre['genre_list'] ?></td>
                                </tr>
                                <?php $a++ ?>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</table>

<?php require 'footer.php' ?>