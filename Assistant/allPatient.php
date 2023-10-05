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
  <title>Assistant - HealthStream</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</head>

<body class="bg-secondary">
  <?php
  include './navbar.php';
  ?>

  <div class="container my-5 py-5">
    <h1 class="display-4">Your Patient Information</h1>
  </div>
  <!-- <div class="container border border-2 p-4 border-danger my-5 rounded"> -->
    <?php

    include "../config.php";
    // $sql = " SELECT username, email, phonenumber, registered_date, address, allocateddoctor FROM users WHERE `allocateddoctor`= '{$_SESSION['username']}' ";
    // $result = mysqli_query($conn, $sql);
    
    $getUsersSQL = "SELECT * FROM users ";
    $getUserResult = mysqli_query($conn, $getUsersSQL) or die("Query Failed.");

    $count = 0;

    if (mysqli_num_rows($getUserResult) > 0) {
      while ($row = mysqli_fetch_assoc($getUserResult)) {
        // if (mysqli_num_rows($result) > 0) {
        // while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        echo "
                  <section class='container border border-1 border-dark p-4 my-3 rounded'>
                    <h1><b> Patient : " . $count . "</b></h1>
                    <div class='col-lg-12'>
                      <div class='card-body'>
                        <div class='row'>
                          <div class='col-sm-3'>
                            <p class='mb-0'><b>Patient Name</b></p>
                          </div>
                          <div class='col-sm-9'>
                            <p class='mb-0'>" . $row['username'] . "</p>
                          </div>
                        </div>
                        <hr />
                        <div class='row'>
                          <div class='col-sm-3'>
                            <p class='mb-0'><b>Patient's Disease</b></p>
                          </div>
                          <div class='col-sm-9'>
                            <p class='mb-0'>" . $row['disease'] . "</p>
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
                            <p class='mb-0'><b>Phone</b></p>
                          </div>
                          <div class='col-sm-9'>
                            <p class='mb-0'>" . $row['phonenumber'] . "</p>
                          </div>
                        </div>
                        <hr />
                        <div class='row'>
                          <div class='col-sm-3'>
                            <p class='mb-0'><b>Address</b></p>
                          </div>
                          <div class='col-sm-9'>
                            <p class='mb-0'>" . $row['address'] . "</p>
                          </div>
                        </div>
                        <hr />
                        <div class='row'>
                          <div class='col-sm-3'>
                            <p class='mb-0'><b>Registered Date</b></p>
                          </div>
                          <div class='col-sm-9'>
                            <p class='mb-0'>" . $row['registered_date'] . "</p>
                          </div>
                        </div>
                        <hr />
                        <div class='row'>
                          <div class='col-sm-3'>
                          <a class='btn btn-outline-light' href='removeUser.php?username=" . $row['username'] . "' style='ext-decoration: none; color: #7b1414;'>
                          Remove Patient
                      </a>                          </div>
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
        <h1 class="display-4">No Patient in List</h1>
        <p class="lead">There 0 Patient In List For List Patient Please Add Patient</p>
      </div>
    </div>';
    }
    // }
    // }
    
    ?>
  <!-- </div> -->

</body>

</html>