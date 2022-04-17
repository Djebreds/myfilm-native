<?php
session_start();

require '../BusinessLogic/Dabes.php';
require '../BusinessLogic/Read.php';
$Dabes = new Dabes();
$Read = new Read();
$username = $password = "";
$usernameErr = $passErr = "";
$error = "";
$message = "";

if (isset($_SESSION['login'])) {
    header('Location: dashboard-panel.php');
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!preg_match("/^[a-zA-Z' ]*$/", $username)) {
        $error = true;
        $usernameErr = "<div class='invalid'>
                                Only letters and white space allowed
                            </div>";
    }
    if ($Dabes->checkUsername($username) === 1) {
        $result = $Read->showAdmin($username);
        if (password_verify($password, $result[0]['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $result[0]['username'];
            $_SESSION['email'] = $result[0]['email'];
            $_SESSION['created_at'] = $result[0]['created_at'];

            header('Location: dashboard-panel.php');
            exit;
        } else {
            $error = true;
            $message = "<div class='alert alert-danger error' role='alert'>
                            Password do not match! Input your correct password.
                        </div>";
        }
    } else {
        $error = true;
        $message = "<div class='alert alert-danger error' role='alert'>
                            Username not registered. Click <a href='sign-admin.php' class='alert-link'>here</a> to register.
                        </div>";
    }
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
    <style>
        * {
            font-family: "Nunito", sans-serif;
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .card {
            position: relative;
            border-radius: 30px;
            overflow: hidden;
        }

        .card-body {
            position: relative;
        }

        div {
            z-index: 1;
        }

        label {
            font-size: 13px;
        }

        .svg-1 {
            position: absolute;
            z-index: -2;
            width: 370%;
            border-radius: 20px;
            top: 15px;
            transform: rotate(180deg);
        }

        .svg-2 {
            position: absolute;
            z-index: -4;
            width: 200%;
            border-radius: 20px;
            transform: rotate(-145deg);
        }

        .svg-3 {
            position: absolute;
            z-index: -3;
            left: 60%;
            top: 50px;
            width: 40%;
            transform: rotate(15deg) scaleX(-1);
        }

        .register {
            border-radius: 25px;
            width: 9.4rem;
        }

        .login {
            border-radius: 25px;
            width: 9.4rem;
        }

        .intro h5 {
            font-size: 20px;
            font-weight: 500;
        }

        .intro h4 {
            font-size: 25px;
            font-weight: 600;
        }

        .copyright {
            font-size: 12px;
            font-weight: 100;
            margin-right: 20px;
        }

        .invalid {
            font-size: 12px;
            margin: 2px;
            color: #f23838;
        }

        .error {
            margin: 5px;
            padding: 15px;
            height: 50px;
            font-size: 13px;
        }
    </style>

<body>
    <div class="container">
        <h2 class="mb-4 mt-4 text-center">Login</h2>
        <div class="row g-0 justify-content-center">
            <div class="card shadow  bg-body mt-4" style="width: 45rem;">
                <div class="card-body m-4">
                    <div class="row">
                        <div class="col-7">
                            <?php if ($error == true) {
                                echo $message;
                            } else {
                                echo $message;
                            } ?>

                            <form action="" method="POST">
                                <div class="mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control form-control-sm rounded-pill" name="username" id="username" value="<?php echo $username ?>" required>
                                    <?php if ($error == true) {
                                        echo $usernameErr;
                                    } ?>
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-sm rounded-pill" name="password" id="password" required>
                                </div>
                                <div class="ms-4 mt-4">
                                    <button type="submit" class="btn btn-primary shadow register" name="login">Login</button>
                                    <button type="button" class="btn btn-primary shadow ms-2 login" name="register" onclick="window.location.href = 'sign-admin.php'">Register</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-5 intro">
                            <h4 class="text-center">Here we go again!</h4>
                        </div>
                    </div>
                </div>
                <svg class="svg-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#0099ff" fill-opacity="1" d="M0,288L34.3,256C68.6,224,137,160,206,128C274.3,96,343,96,411,106.7C480,117,549,139,617,138.7C685.7,139,754,117,823,101.3C891.4,85,960,75,1029,80C1097.1,85,1166,107,1234,101.3C1302.9,96,1371,64,1406,48L1440,32L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z" style="--darkreader-inline-fill: #0074c2;" data-darkreader-inline-fill=""></path>
                </svg>
                <svg class="svg-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#0099ff" fill-opacity="1" d="M0,224L24,218.7C48,213,96,203,144,181.3C192,160,240,128,288,96C336,64,384,32,432,37.3C480,43,528,85,576,96C624,107,672,85,720,101.3C768,117,816,171,864,202.7C912,235,960,245,1008,213.3C1056,181,1104,107,1152,112C1200,117,1248,203,1296,245.3C1344,288,1392,288,1416,288L1440,288L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path>
                </svg>
                <img class="svg-3" src="../Views/assets/home-img.png" width="40%" alt="">
                <p class="text-start ms-3 copyright">Copyright © Refi Ahmad Fauzan 2022</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>