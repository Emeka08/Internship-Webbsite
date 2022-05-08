<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap-5.1.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <?php
    if (!isset($_SESSION["username"])) {
        echo '<link rel="stylesheet" href="../css/style2.css" />';
    } else {
    }
    ?>

    <title>Intern Portal</title>
</head>
<header class="sticky-top">
    <!-- As a link -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-0">
        <div class="container-fluid p-3">
            <a class="navbar-brand" href="./index.php">
                <img width="30" src="../img/coou_logo.png" alt="logo" />
                Internship Admin Portal
            </a>
            <?php
            if (!isset($_SESSION["username"])) {
                echo '';
            } else {
                echo '
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse kill-flex-grow pt-3" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="./administrator.php" class="nav-link text-decoration-none link-primary"><i class="fas fa-user-shield me-1"></i>Administrator</a>
                        </li>
                        <li class="nav-item">
                            <a href="./studentsacc.php" class="nav-link text-decoration-none link-primary"><i class="fas fa-user-graduate me-1"></i>Students Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="./uploadjobs.php" class="nav-link text-decoration-none link-primary"><i class="fas fa-upload me-1"></i> Upload Internship</a>    
                        </li>
                        <li class="nav-item">
                            <a href="./appliedstudents.php" class="nav-link text-decoration-none link-primary"><i class="fas fa-list me-1"></i> Applied Students</a>
                        </li>
                        <li class="nav-item">
                            <a href="./logout.php" class="nav-link text-decoration-none link-primary"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                        </li>
                    </ul>
                </div>
                ';
            };
            ?>
        </div>
</header>

<script>
    let toggleBtn = document.getElementById("toggleBtn");
    let shownBtn = document.getElementById("shown");

    toggleBtn.addEventListener("click", function() {
        if (shownBtn.className == 'shown d-none') {
            shownBtn.classList.remove("d-none");
            shownBtn.className += " d-block";
        } else if (shownBtn.classList == 'shown d-block') {
            shownBtn.classList.remove("d-block");
            shownBtn.className += " d-none";
        }
    });
</script>