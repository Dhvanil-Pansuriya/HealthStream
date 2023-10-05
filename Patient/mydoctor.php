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
  <title>Patient - HealthStream</title>
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


    <div class="container  my-3 p-5">
    </div>
    <div class="container  my-5 p-5  border border-2 border-dark p-4 rounded">


      <?php

      include "../config.php";

      $sql = " SELECT username , allocateddoctor FROM `users` WHERE `username`='{$_SESSION['username']}' ";
      $result = mysqli_query($conn, $sql);



      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $sql2 = " SELECT name , email, phonenumber, specialist, doctorid,experience, description  FROM `doctors` WHERE `name`= '{$row['allocateddoctor']}' ";
          $result2 = mysqli_query($conn, $sql2);
          if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
              echo "
                            <div class='dr-card'>
                        <h4 class = 'display-5'>Doctor : <b>" . $row2['name'] . "</b></h4>    
                        <br>
                            <div class='row row-cols-1 row-cols-md-3 g-4'>

                            <div class='col'>
                              <div class='card h-100'>
                                <div class='card-body bg-secondary'>
                                  <h5 class='card-title'>Doctor Information</h5>
                                  <br />
                                  <div class='row'>
                                    <div class='col-sm-3'>
                                      <p class='mb-0'><b>Name</b></p>
                                    </div>
                                    <div class='col-sm-9'>
                                      <p class='mb-0'><b> Dr. </b>" . $row2['name'] . "</p>
                                    </div>
                                  </div>
                                  <hr />
                                  <div class='row'>
                                    <div class='col-sm-3'>
                                      <p class='mb-0'><b>Doctor ID</b></p>
                                    </div>
                                    <div class='col-sm-9'>
                                      <p class='mb-0'>" . $row2['doctorid'] . "</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class='col'>
                              <div class='card h-100'>
                                <div class='card-body bg-secondary'>
                                  <h5 class='card-title'>Contact Information</h5>
                                  <br />
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
                                      <p class='mb-0'><b>Email</b></p>
                                    </div>
                                    <div class='col-sm-9'>
                                      <p class='mb-0'>" . $row2['email'] . "</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class='col'>
                            <div class='card h-100'>
                              <div class='card-body bg-secondary'>
                                <h5 class='card-title'>Other Information</h5>
                                <br />
                                <div class='col'>
                                  <div class='row'>
                                    <div class='col-sm-4'>
                                      <p class='mb-0'><b>Experience</b></p>
                                    </div>
                                    <div class='col-sm-8'>
                                      <p class='mb-0'>" . $row2['experience'] . "</p>
                                    </div>
                                  </div>
                                  <hr />
                                </div>
                                <a class='btn btn-outline-danger mx-2' href='./index.php' role='button'> ◁ Back</a>
                                <a class='btn btn-outline-light' href='./moreAboutDoctor.php' role='button'>More</a>

                                </div>
                            </div>
                            </div>
                            </div>
                            
                            ";
            }
          }
        }
      } else {
        echo '
              <div class="container border border-2 p-5">
              <div class="jumbotron jumbotron-fluid ">
                <h1 class="display-4">No Doctor in List</h1>
              </div>
            </div>';
      }

      ?>

    </div>

  </main>


</body>

</html>