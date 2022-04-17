<?php

require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';
require '../BusinessLogic/Create.php';
$dabes = new Dabes();
$create = new CreateFilm();
$read = new Read();

$genres = $read->showListGenres();
$directors = $read->showDirector();
$productions = $read->showProduction();
$films = $read->showFilms();



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

<div>
    <canvas id="myChart"></canvas>
</div>

<?php require 'footer.php' ?>