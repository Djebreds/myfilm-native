<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();
$productions = $read->showProduction();
$value = "";
$message = "";

$countPerPage = 10;
$countData = count($read->showProduction());
$countPage = ceil($countData / $countPerPage);
$activePage = (isset($_GET['page']) ? $_GET['page'] : 1);
$firstData = ($countPerPage * $activePage) - $countPerPage;

$productions = $read->showLimitProduction($firstData, $countPerPage);

if (isset($_POST['searchButton'])) {
    $productions = $read->searchProduction(htmlspecialchars($_POST['searchInput']));
    if ($_POST['searchInput'] == "") {
        $productions = $read->showLimitProduction($firstData, $countPerPage);
    }
}

if (isset($_POST['showAll'])) {
    $films = $read->showLimitProduction($firstData, $countPerPage);
}
?>
<?php require 'header.php' ?>
<h2>Data Production</h2>
<div class="card mt-4 shadow  mb-2 bg-body rounded">
    <div class="card-header">
        <a href="#" class="title-card">Table Productions</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="hstack gap-2 mb-3">
                <div class="col">
                    <a href="add-production.php" type="button" class="button btn btn-success">
                        <span class="button__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 640 512">
                                <path d="M0 48C0 21.49 21.49 0 48 0H336C362.5 0 384 21.49 384 48V232.2C344.9 264.5 320 313.3 320 368C320 417.5 340.4 462.2 373.3 494.2C364.5 505.1 351.1 512 336 512H240V432C240 405.5 218.5 384 192 384C165.5 384 144 405.5 144 432V512H48C21.49 512 0 490.5 0 464V48zM80 224C71.16 224 64 231.2 64 240V272C64 280.8 71.16 288 80 288H112C120.8 288 128 280.8 128 272V240C128 231.2 120.8 224 112 224H80zM160 272C160 280.8 167.2 288 176 288H208C216.8 288 224 280.8 224 272V240C224 231.2 216.8 224 208 224H176C167.2 224 160 231.2 160 240V272zM272 224C263.2 224 256 231.2 256 240V272C256 280.8 263.2 288 272 288H304C312.8 288 320 280.8 320 272V240C320 231.2 312.8 224 304 224H272zM64 144C64 152.8 71.16 160 80 160H112C120.8 160 128 152.8 128 144V112C128 103.2 120.8 96 112 96H80C71.16 96 64 103.2 64 112V144zM176 96C167.2 96 160 103.2 160 112V144C160 152.8 167.2 160 176 160H208C216.8 160 224 152.8 224 144V112C224 103.2 216.8 96 208 96H176zM256 144C256 152.8 263.2 160 272 160H304C312.8 160 320 152.8 320 144V112C320 103.2 312.8 96 304 96H272C263.2 96 256 103.2 256 112V144zM640 368C640 447.5 575.5 512 496 512C416.5 512 352 447.5 352 368C352 288.5 416.5 224 496 224C575.5 224 640 288.5 640 368zM492.7 323.3L521.4 352H432C423.2 352 416 359.2 416 368C416 376.8 423.2 384 432 384H521.4L492.7 412.7C486.4 418.9 486.4 429.1 492.7 435.3C498.9 441.6 509.1 441.6 515.3 435.3L571.3 379.3C577.6 373.1 577.6 362.9 571.3 356.7L515.3 300.7C509.1 294.4 498.9 294.4 492.7 300.7C486.4 306.9 486.4 317.1 492.7 323.3V323.3z" />
                            </svg>
                        </span>
                        <span class="button__text"> Add Production </span>
                    </a>
                </div>
                <?php if (in_array('success', $_REQUEST)) { ?>
                    <div class="col-6">
                        <div class='delete_status'>
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
                                    Production successfuly deleted <span class='ms-3'><b>note: Deleted data cannot recovery!</b></span>
                                </div>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                <?php } else if (in_array('failed', $_REQUEST)) { ?>
                    <div class="col-6">
                        <div class='delete_status'>
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
                                    <span class='ms-3'><b>Have some trouble. Failed to delete this production!</b></span>
                                </div>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-3 ms-auto">
                    <form action="" method="POST" class="input-group input-group-sm">
                        <input type="text" class="form-control text-secondary" name="searchInput" placeholder="search..." aria-label="search..." value="<?php if (isset($_POST['searchInput'])) $value = $_POST['searchInput'];
                                                                                                                                                        echo $value  ?>" aria-describedby="button-addon2">
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
                <th scope="col">Name Company</th>
                <th scope="col">Founded Date</th>
                <th scope="col">Action</th>
            </tr>
            <?php $a = $firstData + 1 ?>
            <?php foreach ($productions as $production) : ?>
                <?php
                $date = $production['founded_date'];
                $founded = date("d M Y", strtotime($date));
                ?>
                <tr>
                    <td><?php echo $a ?></td>
                    <td><?php echo $production['name_production'] ?></td>
                    <td><?php echo $founded ?></td>
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
                                                <a href="update-production.php?id_production=<?php echo $production['id_production'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
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
                                                <a href="delete-production.php?id_production=<?php echo $production['id_production'] ?>" class="dropdown-item text-center text-danger px-2">Yes</a>
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
        <?php if ($productions == []) { ?>
            <p class="text-secondary text-center fw-bold">" Data no found "</p>
        <?php } ?>
        <?php if (isset($_POST['searchButton']) && $_POST['searchInput'] != "") { ?>
            <p class="text-secondary " style="font-weight:700; font-family: 'Nunito', sans-serif; font-size: 13px;">Founded data : <?php echo count($productions) ?> </p>
            <form action="" method="POST">
                <button type="submit" name="showAll" class="btn btn-primary btn-sm">Show all</button>
            </form>
        <?php } else { ?>
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
        <?php } ?>
    </div>
</div>
<?php require 'footer.php' ?>
