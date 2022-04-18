<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();
$genres = $read->showListGenres();

$countPerPage = 10;
$countData = count($read->showListGenres());
$countPage = ceil($countData / $countPerPage);
$activePage = (isset($_GET['page']) ? $_GET['page'] : 1);
$firstData = ($countPerPage * $activePage) - $countPerPage;

$genres = $read->showLimitGenre($firstData, $countPerPage);

if (isset($_POST['searchButton'])) {
    $genres = $read->searchGenre($_POST['searchInput']);
}

?>
<?php require 'header.php' ?>
<h2>Data Genre</h2>
<div class="card mt-4 shadow  mb-2 bg-body rounded">
    <div class="card-header">
        <a href="#" class="title-card">Table Genres</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="hstack gap-2 mb-3">
                <div class="col">
                    <a href="add-genre.php" type="button" class="button btn btn-success">
                        <span class="button__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="20" height="20" viewBox="0 0 640 512">
                                <path d="M206.9 245.1C171 255.6 146.8 286.4 149.3 319.3C160.7 306.5 178.1 295.5 199.3 288.4L206.9 245.1zM95.78 294.9L64.11 115.5C63.74 113.9 64.37 112.9 64.37 112.9c57.75-32.13 123.1-48.99 189-48.99c1.625 0 3.113 .0745 4.738 .0745c13.1-13.5 31.75-22.75 51.62-26c18.87-3 38.12-4.5 57.25-5.25c-9.999-14-24.47-24.27-41.84-27.02c-23.87-3.875-47.9-5.732-71.77-5.732c-76.74 0-152.4 19.45-220.1 57.07C9.021 70.57-3.853 98.5 1.021 126.6L32.77 306c14.25 80.5 136.3 142 204.5 142c3.625 0 6.777-.2979 10.03-.6729c-13.5-17.13-28.1-40.5-39.5-67.63C160.1 366.8 101.7 328 95.78 294.9zM193.4 157.6C192.6 153.4 191.1 149.7 189.3 146.2c-8.249 8.875-20.62 15.75-35.25 18.37c-14.62 2.5-28.75 .376-39.5-5.249c-.5 4-.6249 7.998 .125 12.12c3.75 21.75 24.5 36.24 46.25 32.37C182.6 200.1 197.3 179.3 193.4 157.6zM606.8 121c-88.87-49.38-191.4-67.38-291.9-51.38C287.5 73.1 265.8 95.85 260.8 123.1L229 303.5c-15.37 87.13 95.33 196.3 158.3 207.3c62.1 11.13 204.5-53.68 219.9-140.8l31.75-179.5C643.9 162.3 631 134.4 606.8 121zM333.5 217.8c3.875-21.75 24.62-36.25 46.37-32.37c21.75 3.75 36.25 24.49 32.5 46.12c-.7499 4.125-2.25 7.873-4.125 11.5c-8.249-9-20.62-15.75-35.25-18.37c-14.75-2.625-28.75-.3759-39.5 5.124C332.1 225.9 332.9 221.9 333.5 217.8zM403.1 416.5c-55.62-9.875-93.49-59.23-88.99-112.1c20.62 25.63 56.25 46.24 99.49 53.87c43.25 7.625 83.74 .3781 111.9-16.62C512.2 392.7 459.7 426.3 403.1 416.5zM534.4 265.2c-8.249-8.875-20.75-15.75-35.37-18.37c-14.62-2.5-28.62-.3759-39.5 5.249c-.5-4-.625-7.998 .125-12.12c3.875-21.75 24.62-36.25 46.37-32.37c21.75 3.875 36.25 24.49 32.37 46.24C537.6 257.9 536.1 261.7 534.4 265.2z" />
                            </svg>
                        </span>
                        <span class="button__text"> Add Genre </span>
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
                                    Genre successfuly deleted <span class="ms-3"><b>note: Deleted data cannot recovery!</b></span>
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
                                <svg class='bi flex-shrink-0 me-2' width='16' height='16' role='img' aria-label='Success:'>
                                    <use xlink:href='#check-circle-fill' />
                                </svg>
                                <div>
                                    <span class="ms-3"><b>Have some trouble. Failed to this genre list!</b></span>
                                </div>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
        <table class="table table-bordered table-sm tabel">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Genre List</th>
                <th scope="col">Action</th>
            </tr>
            <?php $a = $firstData + 1 ?>
            <?php foreach ($genres as $genre) : ?>
                <tr>
                    <td><?php echo $a ?></td>
                    <td><?php echo $genre['genre_list'] ?></td>
                    <td>
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
                                                <a href="update-genre.php?id_list=<?php echo $genre['id_list'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
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
                                                <a href="delete-genre.php?id_list=<?php echo $genre['id_list'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
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
<?php require 'footer.php' ?>