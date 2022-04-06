<?php require 'header.php' ?>
<h2>Dashboard</h2>
<div class="dahsboard">
    <div class="row">
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-0 border-bottom-0 border-primary shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body text-primary">
                    <h6 class="card-title">Count Data Films</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-0 border-bottom-0 border-success shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body text-success">
                    <h6 class="card-title">Count Data Genres</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-0 border-bottom-0 border-warning shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body">
                    <h6 class="card-title">Count Data Productions</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-4 border border-4 border-end-0 border-top-0 border-bottom-0 border-info shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body">
                    <h6 class="card-title">Count Data Directors</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 60rem;">
                <div class="card-header">
                    <p class="fw-bold fs-6 text-primary title">
                        Table Films
                    </p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm tabel   ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Production</th>
                                <th scope="col">Release Date</th>
                                <th scope="col">Director</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                            <?php foreach ($films as $film) : ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><?php echo $film['title'] ?></td>
                                    <td><?php echo $film['genre_name'] ?></td>
                                    <td><?php echo $film['name_production'] ?></td>
                                    <td><?php echo $film['release_date'] ?></td>
                                    <td><?php echo $film['name'] ?></td>
                                </tr>
                                <?php $a++ ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mt-4 shadow  mb-2 bg-body rounded" style="max-width: 18rem;">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</table>

<?php require 'footer.php' ?>