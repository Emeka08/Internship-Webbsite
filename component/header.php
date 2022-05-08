<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./bootstrap-5.1.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/style2.css">
    <title>Intern Portal</title>
</head>

<body>
    <header class="sticky-top">
        <!-- As a link -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-0">
            <div class="container-fluid p-3">
                <a class="navbar-brand" href="./">
                    <img width="30" src="./img/coou_logo.png" alt="logo" />
                    Internship Portal
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse kill-flex-grow pt-3" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="aboutus.php" class="nav-link text-decoration-none link-primary px-2">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="intern.php" class="nav-link text-decoration-none link-primary px-2">Intership</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION["username"])) {
                                echo '<a href="./logout.php" class="nav-link text-decoration-none link-primary px-2">Logout</a>';
                            } else {
                                echo '<a href="./login.php" class="nav-link text-decoration-none link-primary px-2">Login</a>';
                            };
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
