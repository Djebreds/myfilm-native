<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login-admin.php');
    exit();
} else {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $created_at = $_SESSION['created_at'];
}

$exp = explode(" ", $username);
$check = count($exp);

if ($check > 2) {
    $profile = $exp[0] . " " . $exp[1];
} else {
    $profile = $username;
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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet" />

    <title>Document</title>
</head>

<body>
    <div id="mySidenav" class="sidenav">
        <a class="navbar-brand text-center fs-3 logo" href="#">Admin-films</a>
        <div class="taks-list">
            <div class="list-item" id="list-item">
                <div class="row justify-content-center">
                    <!-- <div class="col-3">
                        <img src="assets/profile.png" width="40px" class="rounded-circle" alt="...">
                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropright
                            </button>
                            <ul class="dropdown-menu">
                                
                            </ul>
                        </div>
                    </div> -->
                    <div class="btn-group dropend">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/profile.png" width="35px" alt="">
                            <span class="ms-1"><?php echo $profile ?> <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 256 512">
                                    <path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z" />
                                </svg></span>

                        </a>
                        <ul class="dropdown-menu profile-item" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="info-panel.php"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" fill="#696969" width="11" heigth="11" viewBox="0 0 448 512">
                                        <path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z" />
                                    </svg><span class="profile">Profile</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="hr my-0">
                <div class="dashboard">
                    <a href="dashboard-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 20 20">
                            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                        </svg> Dashboard </a>
                </div>
                <hr class="hr">
                <p>TABLES</p>
                <ul class="item-list">
                    <li>
                        <a href="maintable-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 20 20">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg> Main table </a>
                    </li>
                    <!-- <li>
                        <a href="filmtable-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 20 20">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg> Films </a>
                    </li> -->
                    <li>
                        <a href="productiontable-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 20 20">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg> Productions </a>
                    </li>
                    <li>
                        <a href="genretable-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 20 20">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg> Genres </a>
                    </li>
                    <li>
                        <a href="directortable-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 20 20">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg> Directors </a>
                    </li>
                </ul>
                <!-- <hr class="hr">
                <p>ADD DATA</p>
                <ul class="item-list">
                    <li>
                        <a href="add-film.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 20 20">
                                <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z" />
                            </svg> Film </a>
                    </li>
                    <li>
                        <a href="add-production.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 20 20">
                                <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z" />
                            </svg> Production </a>
                    </li>
                    <li>
                        <a href="add-genre.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 20 20">
                                <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z" />
                            </svg> Genre </a>
                    </li>
                    <li>
                        <a href="add-director.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 20 20">
                                <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z" />
                            </svg> Directors </a>
                    </li>
                </ul> -->
                <div class="logout">
                    <hr class="hr">
                    <div class="row justify-content-center">
                        <a href="logout.php" class="btn btn-danger mt-4 btn-sm rounded-pill link text-white text-center " style="font-weight:600; width: 150px;"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" fill="currentColor" height="16" viewBox="0 0 512 512">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M96 480h64C177.7 480 192 465.7 192 448S177.7 416 160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64C177.7 96 192 81.67 192 64S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256C0 437 42.98 480 96 480zM504.8 238.5l-144.1-136c-6.975-6.578-17.2-8.375-26-4.594c-8.803 3.797-14.51 12.47-14.51 22.05l-.0918 72l-128-.001c-17.69 0-32.02 14.33-32.02 32v64c0 17.67 14.34 32 32.02 32l128 .001l.0918 71.1c0 9.578 5.707 18.25 14.51 22.05c8.803 3.781 19.03 1.984 26-4.594l144.1-136C514.4 264.4 514.4 247.6 504.8 238.5z" />
                            </svg>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main">