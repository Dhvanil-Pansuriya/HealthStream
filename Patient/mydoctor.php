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
    <title>Code Sharing Platform</title>
    <!-- <link rel="stylesheet" href="./css/navbar.css"> -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/bot.css">

</head>

<body id="homepage" class="bg-secondary">

    <?php
    include "./navbar.php";
    ?>

    <main>



        <div class="container my-5 border border-2 border-danger p-4 rounded">
            <?php

            include "../config.php";

            $sql = " SELECT username , allocateddoctor FROM `users` WHERE `username`='{$_SESSION['username']}' ";
            $result = mysqli_query($conn, $sql);



            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $sql2 = " SELECT name , email, phonenumber, specialist, doctorid, description  FROM `doctors` WHERE `name`= '{$row['allocateddoctor']}' ";
                    $result2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            echo "
                        <section class='container'>
                        <h1><b><u> Doctor : " . $row2['name'] . "</u></b></h1>
                        
                        <div class='col-lg-12'>
                            <div class='card-body'>
                            <div class='row'>
                                <div class='col-sm-3'>
                                <p class='mb-0'><b>Doctor Name</b></p>
                                </div>
                                <div class='col-sm-9'>
                                <p class='mb-0'>" . $row2['name'] . "</p>
                                </div>
                            </div>
                            <hr />
                            <div class='row'>
                                <div class='col-sm-3'>
                                <p class='mb-0'><b>Email</b></p>
                                </div>
                                <div class='col-sm-9'>
                                <p class='mb-0'>" . $row2['email'] . "</p>
                                </div>
                            </div>
                            <hr />
                            <div class='row'>
                                <div class='col-sm-3'>
                                <p class='mb-0'><b>Phone</b></p>
                                </div>
                                <div class='col-sm-9'>
                                <p class='mb-0'>" . $row2['phonenumber'] . "</p>
                                </div>
                            </div>
                            <hr />
                            <div class='row'>
                                <div class='col-sm-3'>
                                <p class='mb-0'><b>Doctor id</b></p>
                                </div>
                                <div class='col-sm-9'>
                                <p class='mb-0'>" . $row2['doctorid'] . "</p>
                                </div>
                            </div>
                            <hr />
                            <div class='row'>
                                <div class='col-sm-3'>
                                <p class='mb-0'><b>Description</b></p>
                                </div>
                                <div class='col-sm-9'>
                                <p class='mb-0'>" . $row2['description'] . "</p>
                                </div>
                            </div>
                            <hr />
                            </div>
                        </div>
                        </section>
                        ";

                        }
                    }
                }
            } else {
                echo "0 results";
            }

            ?>
        </div>

    </main>


</body>

</html>