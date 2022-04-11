<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();
$directors = $read->showDirector();


$countPerPage = 10;
$countData = count($read->showDirector());
$countPage = ceil($countData / $countPerPage);
$activePage = (isset($_GET['page']) ? $_GET['page'] : 1);
$firstData = ($countPerPage * $activePage) - $countPerPage;

$directors = $read->showLimitDirector($firstData, $countPerPage);

if (isset($_POST['searchButton'])) {
    $directors = $read->searchDirector($_POST['searchInput']);
}

?>
<?php require 'header.php' ?>
<h2>Director Table</h2>
<div class="card mt-4 shadow  mb-2 bg-body rounded">
    <div class=" card-header">
        <a href="#" class="title-card">Table Directors</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="hstack gap-2 mb-3">
                <?php if (isset($_REQUEST['status']) == 'success') { ?>
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
                                Director name successfuly deleted <span class="ms-3"><b>note: Deleted data cannot recovery!</b></span>
                            </div>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                <?php } else if (isset($_REQUEST['status']) == 'failed') { ?>
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
                                <b>Have some trouble<b>. Failed to delete this director name
                            </div>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
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
        <table class="table table-bordered table-sm tabel   ">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name </th>
                <th scope="col">Action</th>
            </tr>
            <?php $a = $firstData + 1 ?>
            <?php foreach ($directors as $director) : ?>
                <tr>
                    <td><?php echo $a ?></td>
                    <td><?php echo $director['name_director'] ?></td>
                    <td>
                        <a href="director-detail.php?id=<?php echo $director['id'] ?>" class=" btn btn-success btn-sm text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Views detail data"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 18 18">
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
                                                <a href="update-director.php?id=<?php echo $director['id'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
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
                                                <a href="delete-director.php?id=<?php echo $director['id'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
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