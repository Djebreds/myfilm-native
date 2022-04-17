<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';
require '../BusinessLogic/Update.php';

$read = new Read();
$update = new Update();


$error = "";
$message = "";
$title = "";

$id_film = $_GET['id_film'];
$films = $read->showFilmsById($id_film);
$genres = $read->showListGenres();
$directors = $read->showDirector();
$productions = $read->showProduction();

$checked = explode(', ', $films[0]['genre_name']);

if (isset($_POST['edit'])) {
    if ($update->updateFilm($_POST) > 0) {
        $error = false;
    } else {
        $error = true;
    }
}

?>

<?php require 'header.php' ?>

<style>
    img {
        max-width: 60%;
        width: 30%;
    }
</style>

<body>
    <div class="row">
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-1 border-bottom-0 border-start-0 border-primary shadow  mb-2 bg-body rounded mx-auto" style="width: 70rem;">
                <div class="card-header text-primary fw-bold">
                    Film
                </div>
                <div class="card-body update">
                    <?php if ($error == true) { ?>
                        <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                            <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                                <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
                            </symbol>
                        </svg>
                        <div class='alert alert-danger d-flex alert-dismissible fade show' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'>
                                <use xlink:href='#check-circle-fill' />
                            </svg>
                            <div>
                                <b>Have some trouble</b>. Failed to edit Film
                            </div>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    <?php } else if ($error === false) { ?>
                        <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                            <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
                                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z' />
                            </symbol>
                        </svg>
                        <div class='alert alert-success d-flex alert-dismissible fade show' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'>
                                <use xlink:href='#check-circle-fill' />
                            </svg>
                            <div>
                                Film successfuly to edit <a href='maintable-panel.php' class='alert-link'>See for more</a>.
                            </div>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    <?php }  ?>
                    <form action="" method="POST" enctype="multipart/form-data" class="form-group form-group-sm m-4 pt-4 needs-validation">
                        <input type="hidden" name="id_film" value="<?php echo $films[0]['id_film'] ?>">
                        <input type="hidden" name="oldPicture" value="<?php echo $films[0]['picture'] ?>">
                        <div class="row justify-content-center">
                            <div class="text-center images">
                                <div class="row">
                                    <div class="col">
                                        <p>New Poster</p>
                                        <img id="blah" src="http://placehold.it/180" class="img-fluid mt-2 rounded-3" alt="...">
                                    </div>
                                    <div class="col">
                                        <p>Old Poster</p>
                                        <img src="uploaded/<?php echo $films[0]['picture'] ?>" class="img-fluid mt-2 rounded-3" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3 pt-2">
                                    <p class="form-label form-label-sm text-center">Upload poster</p>
                                    <input class="form-control form-control-sm" id="formFileSm" name="picture" type="file" onchange="readURL(this);">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label form-label-sm">Title</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="form-control form-control-sm" name="title" id="title" value="<?php echo $films[0]['title'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="<?php echo $genre['genre_list'] ?>" class="form-label form-label-sm">Genre</label>
                                        <div class="col-sm-7 mb-3">
                                            <div class="row">
                                                <?php foreach ($genres as $genre) : ?>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input type="hidden" name="genre_id" value="<?php echo $genre['id_list'] ?>">
                                                            <input class="form-check-input {genre[]:true}" type="checkbox" value="<?php echo $genre['genre_list'] ?>" name="genres[]" id="<?php echo $genre['genre_list'] ?>" <?php in_array($genre['genre_list'], $checked) ? print "checked" : "" ?> onchange="checkRequired();">
                                                            <label class="form-check-label" for="<?php echo $genre['genre_list'] ?>">
                                                                <?php echo $genre['genre_list'] ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                <a href="#" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 20 20">
                                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg> Add new genre </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="trailer" class="form-label form-label-sm">Trailer</label>
                                            <div class="col-10">
                                                <input type="text" class="form-control form-control-sm" name="trailer" placeholder="https://youtube.com" value="<?php echo $films[0]['trailer'] ?>" id="trailer" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="vr" style="height: 400px;"></div>
                                </div>
                                <div class="col-4">
                                    <div class="row mb-3">
                                        <label for="dates" class="form-label form-label-sm">Release Date</label>
                                        <div class="col-2">
                                            <label for="dates" class="input-group-text btn btn-primary btn-sm" aria-describedby="inputGroup-sizing-sm" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                                </svg></label>
                                        </div>
                                        <div class="col-5">
                                            <input type="date" class="form-control form-control-sm" name="release_date" id="dates" value="<?php echo $films[0]['release_date'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="runtime" class="form-label form-label-sm">Duration Film</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control form-control-sm" name="runtime" id="runtime" placeholder="(minute)" maxlength="3" value="<?php echo $films[0]['runtime'] ?>" required>
                                            </div>
                                            <div class="col-3">
                                                <label for="runtime" class="input-group-text btn btn-primary btn-sm" aria-describedby="inputGroup-sizing-sm" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                    </svg></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="row mb-3">
                                            <label for="director" class="form-label form-label-sm">Directors</label>
                                            <div class="col-10">
                                                <select class="form-select form-select-sm" name="director" id="director" aria-label=".form-select-sm" required>
                                                    <option value="">Select Director</option>
                                                    <?php foreach ($directors as $director) : ?>
                                                        <option value="<?php echo $director['id'] ?>" <?= ($director['name_director'] == $films[0]['name_director']) ? 'selected' : '' ?>><?php echo $director['name_director'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <a href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 17 17">
                                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row mb-3">
                                            <label for="production" class="form-label form-label-sm">Productions</label>
                                            <div class="col-10">
                                                <select class="form-select form-select-sm" name="production" id="production" aria-label=".form-select-sm" required>
                                                    <option value="">Select Production</option>
                                                    <?php foreach ($productions as $production) : ?>
                                                        <option value="<?php echo $production['id_production'] ?>" <?= ($production['name_production'] == $films[0]['name_production']) ? 'selected' : '' ?>><?php echo $production['name_production'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <a href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 17 17">
                                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <p class="text-center" class="form-label" for="synopsis">Synopsis</p>
                                    <textarea class="form-control" id="synopsis" name="synopsis" rows="12" placeholder="synopsis..." required><?php echo $films[0]['synopsis'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" name="edit" type="submit">Save changes</button>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>