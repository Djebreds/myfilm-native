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
    <title>Document</title>

    <style>
        body {
            font-family: "Nunito", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sidenav {
            height: 100%;
            width: 16%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-image: linear-gradient(to right bottom, #4e73df, #496dd8, #4468d1, #3f62cb, #3a5dc4);
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 20px;
            overflow: visible;
        }

        .sidenav a {
            text-decoration: none;
            font-size: 20px;
            padding: 8px 8px 8px 20px;
            display: block;
            font-weight: 600;
            color: #fff;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            margin-left: 250px;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .sidenav .taks-list .list-item a {
            padding: 8px 8px 8px 20px;
            text-decoration: none;
            font-size: 13px;
            color: #e3e3e3;
            display: block;
            transition: 0.3s;
        }

        .sidenav .taks-list .list-item a:hover {
            color: #fff;
        }


        .sidenav .taks-list {
            width: 100%;
            height: 100px;
        }

        .sidenav .taks-list .list-item p {
            padding: 20px 5px 5px 20px;
            margin: 0;
            font-size: 11px;
            font-family: 'Open Sans', sans-serif;
            font-weight: 800;
            color: #a9bad1;
        }

        .sidenav .taks-list .list-item a {
            margin: 5px;
        }

        .hr {
            margin: auto;
            width: 85%;
            border-top: 1px solid #fff;
        }

        .taks-list .name {
            padding: 20px;
            margin: auto;
        }

        .taks-list .admin ul li a {
            font-size: 15px;
        }

        .tabel tr th {
            font-size: 13px;
            color: #787878;
        }

        .tabel tr td {
            font-size: 12px;
            color: grey;
        }

        .title-card {
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            color: #0d6efd;
        }

        .count {
            margin: 0px;
            font-size: 9px;
            font-weight: 700;
            color: #0d6efd;
        }

        .status {
            margin: 0px;
            font-size: 15px;
            font-weight: 700;
            color: #696969;
        }

        .icon-film {
            color: #bdc8db;
        }

        .list-item ul {
            list-style-type: none;

        }

        .drop-menu p {
            font-size: 12px;
        }

        .drop-menu a {
            font-size: 12px;
            font-weight: 500;
        }


        /* 
        table.table {
            margin: 0 ;
            width: 700px;
        }

        /** only for the head of the table. */
        /* table.table thead th {
            padding: 0;
        } */

        /** only for the body of the table. */
        /* table.table tbody td {
            padding: 0;
        } */

        /** only for the head of the table. */
        /* table.table thead th {
            padding: 0;
        } */

        /** only for the body of the table. */
        /* table.table tbody td {
            margin-left: 0px;
            padding: 0;
        } */
    </style>

</head>

<body>
    <div id="mySidenav" class="sidenav">
        <a class="navbar-brand text-center fs-3 logo" href="#">Admin-films</a>
        <div class="taks-list">
            <div class="list-item" id="list-item">
                <hr class="hr">

                <a href="dashboard-panel.php" class="tables active"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 20 20">
                        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                        <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                    </svg> Dashboard </a>

                <hr class="hr">
                <p>TABLES</p>
                <ul>
                    <li>
                        <a href="maintable-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 20 20">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg> Main table </a>
                    </li>
                    <li>
                        <a href="filmtable-panel.php" class="tables"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table" viewBox="0 0 20 20">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
                            </svg> Films </a>
                    </li>
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
                <hr class="hr">
                <p>ADD DATA</p>
                <ul>
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
                </ul>
            </div>
            <hr class="hr">
            <!-- Example split danger button -->
            <div class="name">
                <div class="row">
                    <div class="btn-group dropend">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 20 20">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg> Dadang Jebred
                        </button>
                        <ul class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <li><button class="dropdown-item" name="info" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 20 20">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg> Info </button></li>
                            <hr class="hr">

                            <li><button class="dropdown-item" name="logout" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                    </svg> Logout </button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main">