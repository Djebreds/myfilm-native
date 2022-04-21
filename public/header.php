<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();

if (isset($_GET['searchButton'])) {
    $films = $read->searchFilm($_GET['searchInput']);
    header("Location: searchFilm.php?title=$_GET[searchInput]");
}


?>


<body>
    <nav class="navbar navbar-expand-lg fixed-top nav-top p-4">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a href="#" class="navbar-brand">Film List</a>
                </ul>
                <div class="col-sm-4">
                    <form action="" method="GET" class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm border border-0 rounded-pill search text-secondary" name="searchInput" value="<?php echo (isset($_GET['title'])) ? $_GET['title'] : '' ?>" placeholder="search..." aria-label="search..." aria-describedby="button-addon2">
                        <button class="btn btn-primary rounded-circle ms-1" type="submit" name="searchButton" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 18">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>