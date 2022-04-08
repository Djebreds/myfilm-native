<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Create.php';
require '../BusinessLogic/Read.php';
// $db = new Dabes();
$create = new CreateFilm();
$read = new Read();

// $genres = $read->showListGenres();
// $directors = $read->showDirector();
// $productions = $read->showProduction();
// $films = $read->showFilms();
$films = $read->showTableFilm();

if (isset($_POST['searchButton'])) {
    $films = $read->searchFilm($_POST['searchInput']);
}

?>
<?php require 'header.php' ?>

<h2>Film Table</h2>
<div class="col">
    <div class="card mt-4 shadow  mb-2 bg-body rounded">
        <div class=" card-header">
            <a href="#" class="title-card">Table Productions</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="hstack gap-2 mb-3">
                    <div class="col-2">
                        <div class="row">
                            <div class="col-5">
                                <select class="form-select form-select-sm" name="count" id="count">
                                    <option value="10">10</option>
                                    <option value="30" selected>30</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 ms-auto">
                        <form action="" method="POST" class="input-group input-group-sm">
                            <input type="text" class="form-control" name="searchInput" placeholder="search..." aria-label="search..." aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit" name="searchButton" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></button>
                        </form>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-sm tabel   ">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Title</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Action</th>
                </tr>
                <?php $a = 1 ?>
                <?php foreach ($films as $film) : ?>
                    <tr>
                        <td><?php echo $a ?></td>
                        <td><?php echo $film['picture'] ?></td>
                        <td><?php echo $film['title'] ?></td>
                        <td><?php echo $film['runtime'] . " " . "minute" ?></td>
                        <td><?php echo $film['release_date'] ?></td>
                        <td>
                            <a href="" class=" btn btn-success btn-sm text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Views detail data"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 18 18">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg></a>
                            <div class="vr"></div>
                            <div class="btn-group btn-group-sm">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 18 18">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end drop-menu" aria-labelledby="dropdownMenuClickableOutside">
                                        <li>
                                            <p class="dropdown-header drop">Are you sure want to edit ?</p>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <div class="row mx-auto">
                                                <div class="col-5 ">
                                                    <a href="update-film.php?id_film=<?php echo $film['id_film'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="d-flex" style="height: 25px;">
                                                        <div class="vr"></div>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <a href="" class="dropdown-item text-center text-primary px-2">No</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="vr"></div>
                            <div class="btn-group btn-group-sm">
                                <!-- <div class="btn-group btn-group-sm dropup">
                                    <button type="button" class="btn btn-danger btn-sm" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 18 18">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg></button>
                                    <ul class="dropdown-menu dropdown-menu-end drop-menu">
                                        <li>
                                            <p class="dropdown-header drop">Delete</p>
                                            <p>If you edit this </p>
                                        </li>
                                    </ul>
                                </div> -->
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-danger dropdown-toggle btn-sm" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 18 18">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end drop-menu" aria-labelledby="dropdownMenuClickableOutside">
                                        <li>
                                            <p class="dropdown-header drop">Are you sure to delete ?</p>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <div class="row mx-auto">
                                                <div class="col-5 ">
                                                    <a href="update-film.php?id_film=<?php echo $film['id_film'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="d-flex" style="height: 25px;">
                                                        <div class="vr"></div>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <a href="#" class="dropdown-item text-center text-primary px-2">No</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $a++ ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>