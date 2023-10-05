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
               <div class=' jumbotron container my-4 p-5 d-flex'>
              <div class='jumbotron border border-2 border-danger p-5 rounded ' >
                  <h1 class='display-4'>About <b>Mr. " . $row2['name'] . "</b></h1>
                  <p class='lead'>This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                      to featured content or information.</p>
                  <hr class='my-4'>
                  <p>It uses utility classes for Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur officia quasi nisi animi quas ducimus mollitia, explicabo molestias doloribus blanditiis, voluptate tempora delectus, molestiae beatae quo itaque qui corrupti assumenda? typography and spacing to space content out within the larger container.</p>
                  <p class='lead'>
                  </p>
                  <hr class='my-4'>
                  <div  class='container'>
                    <table class='table'>
                    <thead>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'></th>
                      <th scope='col'></th>
                    </tr>
                  </thead>
                      <tbody>
                        <tr>
                          <th scope='row'>1</th>
                          <td><b>Full Name</b></td>
                          <td>".$row2['name']."</td>
                        </tr>
                        <tr>
                          <th scope='row'>2</th>
                          <td><b>Email</b></td>
                          <td>".$row2['email']."</td>
                        </tr>
                        <tr>
                        <th scope='row'>3</th>
                        <td ><b>Contact number</b></td>
                        <td>".$row2['phonenumber']."</td>
                      </tr>
                      <tr>
                        <tr>
                          <th scope='row'>4</th>
                          <td ><b>Specialist</b></td>
                          <td>".$row2['specialist']."</td>
                        </tr>
                        <tr>
                          <th scope='row'>5</th>
                          <td ><b>Experience</b></td>
                          <td>".$row2['experience']."</td>
                        </tr>
                        <tr>
                          <th scope='row'>6</th>
                          <td ><b>Doctorid</b></td>
                          <td>".$row2['doctorid']."</td>
                        </tr>
                        <tr>
                          <th scope='row'>7</th>
                          <td ><b>Description</b></td>
                          <td>".$row2['description']."</td>
                        </tr>
                        
                      </tbody>
                    </table>
                    <br>
                    <a class='btn btn-outline-danger' href='./myDoctor.php' role='button'> ◁ Back</a>

                   </div> 
              </div>
          </div>";
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


  </main>


</body>

</html>