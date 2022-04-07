<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Create.php';
require '../BusinessLogic/Read.php';
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

<?php require 'header.php' ?>
<h2>Add data Film</h2>
<div class="row">
    <div class="col">
        <div class="card mt-4 border border-4 border-end-0 border-top-1 border-bottom-0 border-start-0 border-primary shadow  mb-2 bg-body rounded mx-auto" style="width: 70rem;">
            <div class="card-header">
                Film
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" class="form-group form-group-sm m-4 ">
                    <img src="assests/bighero.jpeg" class="rounded mx-auto d-block" width="20%" height="40%" alt="...">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <div class="mb-3 pt-2">
                                <p class="form-label form-label-sm text-center">Upload poster</p>
                                <input class="form-control form-control-sm" id="formFileSm" name="picture" type="file">
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
                                        <input type="text" class="form-control form-control-sm" name="title" id="title">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="<?php echo $genre['genre_list'] ?>" class="form-label form-label-sm">Genre</label>
                                    <div class="col-sm-7">
                                        <?php foreach ($genres as $genre) : ?>
                                            <div class="form-check">
                                                <input type="hidden" name="genre_id" value="<?php echo $genre['id_list'] ?>">
                                                <input class="form-check-input" type="checkbox" value="<?php echo $genre['genre_list'] ?>" name="genres[]" id="<?php echo $genre['genre_list'] ?>">
                                                <label class="form-check-label" for="<?php echo $genre['genre_list'] ?>">
                                                    <?php echo $genre['genre_list'] ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                        <a href="#" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 20 20">
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                            </svg> Add new genre </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="vr" style="height: 450px;"></div>
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
                                        <input type="date" class="form-control form-control-sm" id="dates">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-3">
                                        <label for="runtime" class="form-label form-label-sm">Duration Film</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control form-control-sm" name="title" id="runtime" placeholder="(minute)">
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
                                            <select class="form-select form-select-sm" name="director" id="director" aria-label=".form-select-sm">
                                                <option value="">Select Director</option>
                                                <?php foreach ($directors as $director) : ?>
                                                    <option value="<?php echo $director['id'] ?>"><?php echo $director['name'] ?></option>
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
                                            <select class="form-select form-select-sm" name="production" id="production" aria-label=".form-select-sm">
                                                <option value="">Select Production</option>
                                                <?php foreach ($productions as $production) : ?>
                                                    <option value="<?php echo $production['id_production'] ?>"><?php echo $production['name_production'] ?></option>
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
                                <textarea class="form-control" id="synopsis" rows="10" placeholder="synopsis..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" name="add" type="submit">Button</button>
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