<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';
require '../BusinessLogic/Create.php';
$create = new CreateFilm();
$read = new Read();

$films = $read->showFilms();

$countPerPage = 15;
$countData = count($read->showFilms());
$countPage = ceil($countData / $countPerPage);
$activePage = (isset($_GET['page']) ? $_GET['page'] : 1);
$firstData = ($countPerPage * $activePage) - $countPerPage;

$films = $read->showLimitMain($firstData, $countPerPage);

if (isset($_POST['searchButton'])) {
    $films = $read->searchMain($_POST['searchInput']);
}



?>
<?php require 'header.php' ?>
<div class="title">
    <h2>Data Film</h2>
    <p>This data is combined with table
        <a href="productiontable-panel.php" class="fw-normal text-primary" style="text-decoration: none;">Films</a> , table <a href="productiontable-panel.php" class="fw-normal text-primary" style="text-decoration: none;">  Directors </a>
        , table <a href="productiontable-panel.php" class="fw-normal text-primary" style="text-decoration: none;">Genres</a>
        and table <a href="productiontable-panel.php" class="fw-normal text-primary" style="text-decoration: none;">Productions. </a>

    </p>
</div>
<div class="card mt-4 shadow  mb-2 bg-body rounded">
    <div class="card-header">
        <a href="#" class="title-card">Table Main</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="hstack gap-2 mb-3">
                <div class="col me-auto">
                    <a href="add-film.php" type="button" class="button btn btn-success">
                        <span class="button__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 640 512">
                                <path d="M352 432c0 8.836-7.164 16-16 16H176c-8.838 0-16-7.164-16-16L160 128H48C21.49 128 .0003 149.5 .0003 176v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48L512 384h-160L352 432zM104 439c0 4.969-4.031 9-9 9h-30c-4.969 0-9-4.031-9-9v-30c0-4.969 4.031-9 9-9h30c4.969 0 9 4.031 9 9V439zM104 335c0 4.969-4.031 9-9 9h-30c-4.969 0-9-4.031-9-9v-30c0-4.969 4.031-9 9-9h30c4.969 0 9 4.031 9 9V335zM104 231c0 4.969-4.031 9-9 9h-30c-4.969 0-9-4.031-9-9v-30C56 196 60.03 192 65 192h30c4.969 0 9 4.031 9 9V231zM408 409c0-4.969 4.031-9 9-9h30c4.969 0 9 4.031 9 9v30c0 4.969-4.031 9-9 9h-30c-4.969 0-9-4.031-9-9V409zM591.1 0H239.1C213.5 0 191.1 21.49 191.1 48v256c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48v-256C640 21.49 618.5 0 591.1 0zM303.1 64c17.68 0 32 14.33 32 32s-14.32 32-32 32C286.3 128 271.1 113.7 271.1 96S286.3 64 303.1 64zM574.1 279.6C571.3 284.8 565.9 288 560 288H271.1C265.1 288 260.5 284.6 257.7 279.3C255 273.9 255.5 267.4 259.1 262.6l70-96C332.1 162.4 336.9 160 341.1 160c5.11 0 9.914 2.441 12.93 6.574l22.35 30.66l62.74-94.11C442.1 98.67 447.1 96 453.3 96c5.348 0 10.34 2.672 13.31 7.125l106.7 160C576.6 268 576.9 274.3 574.1 279.6z" />
                            </svg>
                        </span>
                        <span class="button__text"> Add Film </span>
                    </a>
                </div>
                <?php if (in_array('success', $_REQUEST)) { ?>
                    <div class="col-6">
                        <div class="delete_status">
                            <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                                <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
                                    <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z' />
                                </symbol>
                            </svg>
                            <div class='alert alert-success d-flex alert-dismissible fade show' role='alert'>
                                <svg class='bi flex-shrink-0 me-2' width='16' height='16' role='img' aria-label='Success:'>
                                    <use xlink:href='#check-circle-fill' />
                                </svg>
                                <div>
                                    Film successfuly deleted <span class="ms-3"><b>note: Deleted data cannot recovery!</b></span>
                                </div>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                <?php } else if (in_array('failed', $_REQUEST)) { ?>
                    <div class="col-6">
                        <div class="delete_status">
                            <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                                <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                                    <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z' />
                                </symbol>
                            </svg>
                            <div class='alert alert-danger d-flex alert-dismissible fade show' role='alert'>
                                <svg class='bi flex-shrink-0 me-2' width='16' height='16' role='img' aria-label='Failed:'>
                                    <use xlink:href='#check-circle-fill' />
                                </svg>
                                <div>
                                    <span class='ms-3'><b>Have some trouble. Failed to delete this film!</b></span>
                                </div>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-3 ms-auto">
                    <form action="" method="POST" class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" name="searchInput" placeholder="search..." aria-label="search..." aria-describedby="button-addon2">
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
                <th scope="col">Title</th>
                <th scope="col">Genre</th>
                <th scope="col">Production</th>
                <th scope="col">Release Date</th>
                <th scope="col">Director</th>
                <th scope="col">Action</th>
            </tr>
            <?php $a = $firstData + 1 ?>
            <?php foreach ($films as $film) : ?>
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
                    <td>
                        <a href="detail-film.php?id_film=<?php echo $film['id_film'] ?>" class=" btn btn-success btn-sm text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Views detail data"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 18 18">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg></a>
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
                                                <a href="#" class="dropdown-item text-center text-primary px-2">No</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="vr"></div>
                        <div class="btn-group btn-group-sm">
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
                                                <a href="delete-film.php?id_film=<?php echo $film['id_film'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
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
                </tr>
                <?php $a++ ?>
            <?php endforeach ?>
        </table>
        <div class="row">
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <?php if ($activePage > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $activePage - 1; ?>">Previous</a>
                        </li>
                    <?php else : ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="?page=<?= $activePage - 1; ?>">Previous</a>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $countPage; $i++) : ?>
                        <?php if ($i == $activePage) : ?>
                            <li class="page-item active">
                                <a class="page-link " href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link " href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php endif; ?>

                    <?php endfor; ?>
                    <?php if ($activePage < $countPage) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $activePage + 1; ?>">Next</a>
                        </li>
                    <?php else : ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="?page=<?= $activePage + 1; ?>">Next</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php require 'footer.php' ?>