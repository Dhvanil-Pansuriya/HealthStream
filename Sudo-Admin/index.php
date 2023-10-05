<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: http://localhost/healthstream/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - HealthStream </title>
    <!-- <link rel="stylesheet" href="./css/navbar.css"> -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="./css/bot.css"> -->
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>


<body id="homepage" class="bg-secondary">

    <?php
    include "./navbar.php";
    ?>

    <div class="container my-4 p-5 d-flex">
        <div class="jumbotron border border-2 border-danger p-5 rounded " >
            <h1 class="display-4">Namaste, <b>Mr. <?php echo $_SESSION['username']?></b></h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur officia quasi nisi animi quas ducimus mollitia, explicabo molestias doloribus blanditiis, voluptate tempora delectus, molestiae beatae quo itaque qui corrupti assumenda? typography and spacing to space content out within the larger container.</p>
            <p class="lead">
            </p>
        </div>
    </div>

</body>

</html>