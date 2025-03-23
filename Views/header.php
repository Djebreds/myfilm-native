<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login-admin.php');
    exit();
} else {
    $username   = $_SESSION['username'];
    $email      = $_SESSION['email'];
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style-admin-panel.css">
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
                    <a href="dashboard-panel.php" class="m-1 tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 20 20">
                            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                        </svg> Dashboard </a>
                </div>
                <hr class="hr">
                <p>TABLES</p>
                <ul class="item-list">
                    <li>
                        <a href="maintable-panel.php" class="m-1 tables"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 512 512">
                                <path d="M463.1 32h-416C21.49 32-.0001 53.49-.0001 80v352c0 26.51 21.49 48 47.1 48h416c26.51 0 48-21.49 48-48v-352C511.1 53.49 490.5 32 463.1 32zM111.1 408c0 4.418-3.582 8-8 8H55.1c-4.418 0-8-3.582-8-8v-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8L111.1 408zM111.1 280c0 4.418-3.582 8-8 8H55.1c-4.418 0-8-3.582-8-8v-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8V280zM111.1 152c0 4.418-3.582 8-8 8H55.1c-4.418 0-8-3.582-8-8v-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8L111.1 152zM351.1 400c0 8.836-7.164 16-16 16H175.1c-8.836 0-16-7.164-16-16v-96c0-8.838 7.164-16 16-16h160c8.836 0 16 7.162 16 16V400zM351.1 208c0 8.836-7.164 16-16 16H175.1c-8.836 0-16-7.164-16-16v-96c0-8.838 7.164-16 16-16h160c8.836 0 16 7.162 16 16V208zM463.1 408c0 4.418-3.582 8-8 8h-47.1c-4.418 0-7.1-3.582-7.1-8l0-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8V408zM463.1 280c0 4.418-3.582 8-8 8h-47.1c-4.418 0-8-3.582-8-8v-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8V280zM463.1 152c0 4.418-3.582 8-8 8h-47.1c-4.418 0-8-3.582-8-8l0-48c0-4.418 3.582-8 7.1-8h47.1c4.418 0 8 3.582 8 8V152z" />
                            </svg> Films </a>
                    </li>
                    <!-- <li>
                        <a href="filmtable-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 20 20">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg> Films </a>
                    </li> -->
                    <li>
                        <a href="productiontable-panel.php" class="m-1 tables"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 384 512">
                                <path d="M336 0C362.5 0 384 21.49 384 48V464C384 490.5 362.5 512 336 512H240V432C240 405.5 218.5 384 192 384C165.5 384 144 405.5 144 432V512H48C21.49 512 0 490.5 0 464V48C0 21.49 21.49 0 48 0H336zM64 272C64 280.8 71.16 288 80 288H112C120.8 288 128 280.8 128 272V240C128 231.2 120.8 224 112 224H80C71.16 224 64 231.2 64 240V272zM176 224C167.2 224 160 231.2 160 240V272C160 280.8 167.2 288 176 288H208C216.8 288 224 280.8 224 272V240C224 231.2 216.8 224 208 224H176zM256 272C256 280.8 263.2 288 272 288H304C312.8 288 320 280.8 320 272V240C320 231.2 312.8 224 304 224H272C263.2 224 256 231.2 256 240V272zM80 96C71.16 96 64 103.2 64 112V144C64 152.8 71.16 160 80 160H112C120.8 160 128 152.8 128 144V112C128 103.2 120.8 96 112 96H80zM160 144C160 152.8 167.2 160 176 160H208C216.8 160 224 152.8 224 144V112C224 103.2 216.8 96 208 96H176C167.2 96 160 103.2 160 112V144zM272 96C263.2 96 256 103.2 256 112V144C256 152.8 263.2 160 272 160H304C312.8 160 320 152.8 320 144V112C320 103.2 312.8 96 304 96H272z" />
                            </svg> Productions </a>
                    </li>
                    <li>
                        <a href="genretable-panel.php" class="m-1 tables"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 650 512">
                                <path d="M206.9 245.1C171 255.6 146.8 286.4 149.3 319.3C160.7 306.5 178.1 295.5 199.3 288.4L206.9 245.1zM95.78 294.9L64.11 115.5C63.74 113.9 64.37 112.9 64.37 112.9c57.75-32.13 123.1-48.99 189-48.99c1.625 0 3.113 .0745 4.738 .0745c13.1-13.5 31.75-22.75 51.62-26c18.87-3 38.12-4.5 57.25-5.25c-9.999-14-24.47-24.27-41.84-27.02c-23.87-3.875-47.9-5.732-71.77-5.732c-76.74 0-152.4 19.45-220.1 57.07C9.021 70.57-3.853 98.5 1.021 126.6L32.77 306c14.25 80.5 136.3 142 204.5 142c3.625 0 6.777-.2979 10.03-.6729c-13.5-17.13-28.1-40.5-39.5-67.63C160.1 366.8 101.7 328 95.78 294.9zM193.4 157.6C192.6 153.4 191.1 149.7 189.3 146.2c-8.249 8.875-20.62 15.75-35.25 18.37c-14.62 2.5-28.75 .376-39.5-5.249c-.5 4-.6249 7.998 .125 12.12c3.75 21.75 24.5 36.24 46.25 32.37C182.6 200.1 197.3 179.3 193.4 157.6zM606.8 121c-88.87-49.38-191.4-67.38-291.9-51.38C287.5 73.1 265.8 95.85 260.8 123.1L229 303.5c-15.37 87.13 95.33 196.3 158.3 207.3c62.1 11.13 204.5-53.68 219.9-140.8l31.75-179.5C643.9 162.3 631 134.4 606.8 121zM333.5 217.8c3.875-21.75 24.62-36.25 46.37-32.37c21.75 3.75 36.25 24.49 32.5 46.12c-.7499 4.125-2.25 7.873-4.125 11.5c-8.249-9-20.62-15.75-35.25-18.37c-14.75-2.625-28.75-.3759-39.5 5.124C332.1 225.9 332.9 221.9 333.5 217.8zM403.1 416.5c-55.62-9.875-93.49-59.23-88.99-112.1c20.62 25.63 56.25 46.24 99.49 53.87c43.25 7.625 83.74 .3781 111.9-16.62C512.2 392.7 459.7 426.3 403.1 416.5zM534.4 265.2c-8.249-8.875-20.75-15.75-35.37-18.37c-14.62-2.5-28.62-.3759-39.5 5.249c-.5-4-.625-7.998 .125-12.12c3.875-21.75 24.62-36.25 46.37-32.37c21.75 3.875 36.25 24.49 32.37 46.24C537.6 257.9 536.1 261.7 534.4 265.2z" />
                            </svg> Genres </a>
                    </li>
                    <li>
                        <a href="directortable-panel.php" class="m-1 tables"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M352 128C352 198.7 294.7 256 224 256C153.3 256 96 198.7 96 128C96 57.31 153.3 0 224 0C294.7 0 352 57.31 352 128zM209.1 359.2L176 304H272L238.9 359.2L272.2 483.1L311.7 321.9C388.9 333.9 448 400.7 448 481.3C448 498.2 434.2 512 417.3 512H30.72C13.75 512 0 498.2 0 481.3C0 400.7 59.09 333.9 136.3 321.9L175.8 483.1L209.1 359.2z" />
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
