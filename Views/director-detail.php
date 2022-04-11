<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();
$id = $_GET['id'];
$shows = $read->showDirectorById($id);


?>
<?php require 'header.php' ?>
<h2>Add data director</h2>
<div class="row">
    <div class="col">
        <div class="card mt-4 border border-4 border-end-0 border-top-1 border-bottom-0 border-start-0 border-info shadow  mb-2 bg-body rounded mx-auto" style="width: 70rem;">
            <div class="card-header">
                Director
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" class="form-control  pt-4 needs-validation" novalidate>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <div class="mb-3 pt-2">
                                <div class="header-detail">
                                    <p class=" text-center">Director Name</p>
                                    <h4 class="text-center"><?php echo $shows[0]['name_director'] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <div class="header-about">
                                    <h6 class="text-center">About</h6>
                                    <div class="card">
                                        <div class="card-body">
                                            <p><?php echo $shows[0]['about'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" name="back" type="button" onclick="history.back()">Back</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php' ?>