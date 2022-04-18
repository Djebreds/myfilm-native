<?php
require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';

$read = new Read();
if (isset($_GET['searchButton'])) {
    $films = $read->searchFilm($_GET['searchInput']);
    header("Location: searchFilm.php?title=$_GET[searchInput]");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Views/css/style-public-user.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top nav-top p-4">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a href="#" class="navbar-brand">Film List</a>
                </ul>
                <div class="col-sm-4">
                    <form action="" method="GET" class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm border border-white rounded-pill search" name="searchInput" placeholder="search..." aria-label="search..." aria-describedby="button-addon2">
                        <button class="btn btn-primary rounded-circle ms-1" type="submit" name="searchButton" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 18">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>