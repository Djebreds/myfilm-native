<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';
$read = new Read();

?>
<?php require 'header.php' ?>
<h2>Info</h2>
<div class="card mt-4 shadow  mb-2 bg-body rounded" style="width: 40rem;">
    <div class="card-header">
        <a href="#" class="title-card">Info User</a>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row m-3">
                <div class="hstack gap-3">
                    <div class="vr "></div>
                    <div class="info-header align-self-start">
                        <div class="col-12">
                            <h3><span class="item-info"><?php echo $username ?></span></h3>
                            <hr class="haer">
                            <?php
                            $date = $created_at;
                            $date = date("d F Y / h:i:s A", strtotime($date));
                            ?>
                            <p><span class="item-info">Email:</span> <?php echo $email ?></p>
                            <p><span class="item-info">Created at:</span> <?php echo $date ?></p>
                            <p><span class="item-info">Role:</span> Admin</p>
                        </div>
                    </div>
                </div>
                <div class="hstack ">
                    <button type="button" class="btn btn-primary ms-auto" onclick="history.back()">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>