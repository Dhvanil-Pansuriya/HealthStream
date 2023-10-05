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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor - HealthStream</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</head>

<body class="bg-secondary ">
    <?php
    include './navbar.php';
    ?>
    <div class="my-5 container p-3"></div>
    <div class="my-5 container">


        <nav class="navbar navbar-light bg-secoundary">
            <div class="container-fluid">
                <a class='btn btn-outline-light' href='./manageAssistant.php' role='button'> ◁ Back</a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search here" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="my-5 container">

            <h1 class="container my-5">All Doctors Information</h1>

            <?php

            include "../config.php";


            $getUsersSQL = "SELECT * FROM doctors ";
            $getUserResult = mysqli_query($conn, $getUsersSQL) or die("Query Failed.");

            $count = 0;

            if (mysqli_num_rows($getUserResult) > 0) {
                while ($row = mysqli_fetch_assoc($getUserResult)) {
                    $count++;
                    echo "
      <section class='container border border-1 border-dark p-4 my-3 rounded'>
        <h2><b> Doctors : " . $count . "</b></h2>
        <div class='col-lg-12'>
          <div class='card-body'>
            <div class='row'>
              <div class='col-sm-3'>
                <p class='mb-0'><b>Doctor Name</b></p>
              </div>
              <div class='col-sm-9'>
                <p class='mb-0'>" . $row['name'] . "</p>
              </div>
            </div>
            <hr />
            <div class='row'>
              <div class='col-sm-3'>
                <p class='mb-0'><b>Email</b></p>
              </div>
              <div class='col-sm-9'>
                <p class='mb-0'>" . $row['email'] . "</p>
              </div>
            </div>
            <hr />
            <div class='row'>
              <div class='col-sm-3'>
                <p class='mb-0'><b>Phone Number</b></p>
              </div>
              <div class='col-sm-9'>
                <p class='mb-0'>" . $row['phonenumber'] . "</p>
              </div>
            </div>
            <hr />

            <div class='row'>
              <div class='col-sm-3'>
                <p class='mb-0'><b>Specialist</b></p>
              </div>
              <div class='col-sm-9'>
                <p class='mb-0'>" . $row['specialist'] . "</p>
              </div>
            </div>
            <hr />
            <div class='row'>
              <div class='col-sm-3'>
                <p class='mb-0'><b>Experience</b></p>
              </div>
              <div class='col-sm-9'>
                <p class='mb-0'>" . $row['experience'] . "</p>
              </div>
            </div>
            <hr />
            <div class='row'>
              <div class='col-sm-3'>
                <p class='mb-0'><b>Doctor ID</b></p>
              </div>
              <div class='col-sm-9'>
                <p class='mb-0'>" . $row['doctorid'] . "</p>
              </div>
            </div>
            <hr />
            <div class='row'>
              <div class='col-sm-3'>
                <p class='mb-0'><b>Description</b></p>
              </div>
              <div class='col-sm-9'>
                <p class='mb-0'>" . $row['description'] . "</p>
              </div>
            </div>
            <hr />
            <div class='row'>
              <div class='col-sm-3'>
              <a class='btn btn-outline-light' href='removeDoctor.php?username=" . $row['name'] . "' style='ext-decoration: none; color: #7b1414;'>
              Remove Doctor
          </a>                    
              </div>
              <div class='col-sm-9'>
          </div>
            </div>
          </div>
        </div>
      </section>
      ";


                }
            } else {
                echo '
  <div class="container border border-2 p-5">
  <div class="jumbotron jumbotron-fluid ">
    <h1 class="display-4">No Doctor in List</h1>
    <p class="lead">There is 0 Doctor In List For Listing Doctors Please Add Doctor</p>
  </div>
</div>';
            }

            ?>
        </div>
</body>

</html>