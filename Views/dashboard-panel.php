<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

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


$act_name = $genres[0]['genre_list'];
$adv_name = $genres[1]['genre_list'];
$fnt_name = $genres[2]['genre_list'];
$crm_name = $genres[3]['genre_list'];
$hrr_name = $genres[4]['genre_list'];
$thr_name = $genres[5]['genre_list'];
$ani_name = $genres[6]['genre_list'];
$drm_name = $genres[7]['genre_list'];
$cmd_name = $genres[8]['genre_list'];
$mys_name = $genres[9]['genre_list'];
$scf_name = $genres[10]['genre_list'];
$rmc_name = $genres[11]['genre_list'];
$dcm_name = $genres[12]['genre_list'];
$msc_name = $genres[13]['genre_list'];
$spt_name = $genres[14]['genre_list'];



$action = $read->showFilmByGenre('Action');
$adventure = $read->showFilmByGenre('Adventure');
$crime = $read->showFilmByGenre('Crime');
$fantasy = $read->showFilmByGenre('Fantasy');
$horror = $read->showFilmByGenre('Horror');
$thriller = $read->showFilmByGenre('Thriller');
$animations = $read->showFilmByGenre('Animations');
$drama = $read->showFilmByGenre('Drama');
$comedy = $read->showFilmByGenre('Comedy');
$mystery = $read->showFilmByGenre('Mystery');
$scifi = $read->showFilmByGenre('Sci-Fi');
$romance = $read->showFilmByGenre('Romance');
$documentary = $read->showFilmByGenre('Documentary');
$music = $read->showFilmByGenre('Music');
$sport = $read->showFilmByGenre('Sport');

$gen_act = count($action);
$gen_adv = count($adventure);
$gen_crim = count($crime);
$gen_fant = count($fantasy);
$gen_horr = count($horror);
$gen_thril = count($thriller);
$gen_anima = count($animations);
$gen_drama = count($drama);
$gen_comedy = count($comedy);
$gen_mystery = count($mystery);
$gen_scifi = count($scifi);
$gen_romance = count($romance);
$gen_docum = count($documentary);
$gen_music = count($music);
$gen_sport = count($sport);


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
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-film icon-film" viewBox="0 0 20 20">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                            </svg> -->
                            <img src="assets/All.png" width="30px" alt="">
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
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-film icon-film" viewBox="0 0 20 20">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                            </svg> -->
                            <img src="assets/action.png" width="30px" alt="">
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
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-film icon-film" viewBox="0 0 20 20">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                            </svg> -->
                            <img src="assets/company.png" width="30px" alt="">
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
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-film icon-film" viewBox="0 0 20 20">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                            </svg> -->
                            <img src="assets/directors.png" width="30px" alt="">
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
                    <a href="maintable-panel.php" class="title-card">Data Film</a>
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
                            <?php
                            $date = $film['release_date'];
                            $release = date("d M Y", strtotime($date));
                            ?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $film['title'] ?></td>
                                <td><?php echo $film['genre_name'] ?></td>
                                <td><?php echo $film['name_production'] ?></td>
                                <td><?php echo $release ?></td>
                                <td><?php echo $film['name_director'] ?></td>
                            </tr>
                            <?php $a++ ?>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-3">
            <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                <div class="card-header">
                    <a href="directortable-panel.php" class="title-card">Data Directors</a>
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
                                <td><a href="director-detail.php?id=<?php echo $director['id'] ?>" class="text-primary" style="text-decoration: none;">Detail</a></td>
                            </tr>
                            <?php $a++ ?>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
            <!-- <div class="col-auto"> -->
            <!-- <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                    <div class="card-header">
                        <a href="genretable-panel.php" class="title-card">Table Genres</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm tabel   ">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Genre List</th>
                            </tr>
                            <?php
                            //  $a = 1 
                            ?>
                            <?php
                            //  foreach ($tableGenres as $genre) : 
                            ?>
                                <tr>
                                    <td><?php // echo $a 
                                        ?></td>
                                    <td><?php // echo $genre['genre_list'] 
                                        ?></td>
                                </tr>
                                <?php // $a++ 
                                ?>
                            <?php // endforeach 
                            ?>
                        </table>
                    </div>
                </div> -->
            <!-- </div> -->
        </div>
        <div class="col-7">
            <div class="card mt-4 shadow  mb-2 bg-body " style="max-width: 60rem;">
                <div class="card-header">
                    <a href="filmtable-panel.php" class="title-card">Data Genre</a>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="myChart" width="500px" height="230px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-5">
            <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                <div class="card-header">
                    <a href="productiontable-panel.php" class="title-card">Data Productions</a>
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
                            <?php
                            $date = $production['founded_date'];
                            $founded = date("d M Y", strtotime($date));
                            ?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $production['name_production'] ?></td>
                                <td><?php echo $founded ?></td>
                            </tr>
                            <?php $a++ ?>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</table>

<?php require 'footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = {
        labels: [
            <?php echo json_encode($act_name) ?>,
            <?php echo json_encode($adv_name) ?>,
            <?php echo json_encode($crm_name) ?>,
            <?php echo json_encode($ani_name) ?>,
            <?php echo json_encode($cmd_name) ?>,
            <?php echo json_encode($dcm_name) ?>,
            <?php echo json_encode($fnt_name) ?>,
            <?php echo json_encode($hrr_name) ?>,
            <?php echo json_encode($msc_name) ?>,
            <?php echo json_encode($rmc_name) ?>,
            <?php echo json_encode($scf_name) ?>,
            <?php echo json_encode($mys_name) ?>,
            <?php echo json_encode($thr_name) ?>,
            <?php echo json_encode($spt_name) ?>
        ],
        datasets: [{
            label: 'list',

            data: [
                <?php echo json_encode($gen_act) ?>,
                <?php echo json_encode($gen_adv) ?>,
                <?php echo json_encode($gen_crim) ?>,
                <?php echo json_encode($gen_anima) ?>,
                <?php echo json_encode($gen_comedy) ?>,
                <?php echo json_encode($gen_docum) ?>,
                <?php echo json_encode($gen_fant) ?>,
                <?php echo json_encode($gen_horr) ?>,
                <?php echo json_encode($gen_music) ?>,
                <?php echo json_encode($gen_romance) ?>,
                <?php echo json_encode($gen_scifi) ?>,
                <?php echo json_encode($gen_mystery) ?>,
                <?php echo json_encode($gen_thril) ?>,
                <?php echo json_encode($gen_sport) ?>
            ],

            backgroundColor: [
                'rgb(240, 115, 43)',
                'rgb(125, 95, 56)',
                'rgb(79, 43, 71)',
                'rgb(215, 237, 71)',
                'rgb(71, 137, 237)',
                'rgb(70, 80, 90)',
                'rgb(127, 222, 69)',
                'rgb(85, 25, 50)',
                'rgb(25, 88, 99)',
                'rgb(237, 71, 124)',
                'rgb(107, 71, 237)',
                'rgb(57, 58, 130)',
                'rgb(230, 200, 86)',
                'rgb(156, 57, 50)',
                'rgb(0, 0, 0)'
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                x: {
                    ticks: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                datalabels: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Genre from every film',
                },
                legend: {
                    display: false,
                    position: 'left',

                },
                labels: {
                    display: false
                },
                datalabes: {
                    display: false,
                    align: 'end'

                }
            }
        }
    };
</script>


<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>