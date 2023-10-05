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
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>

<body class="bg-secondary">

    <?php

    include 'navbar.php';

    ?>

    <div class="container my-5 p-5 ">
        <div class="jumbotron container border border-danger text-dark border-2  my-5 p-5 rounded">
            <h1 class="display-4">Hello,
                <?php echo $_SESSION['username'] ?><b>
                </b>
            </h1>
            <p class="lead my-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, ullam? Perferendis
                voluptatem laudantium nobis quis aliquid, esse fuga facere deleniti recusandae illum dicta laborum
                aut!
                Aspernatur, distinctio aliquam. Tenetur, ut!</p>
            <hr class="my-4">
            <p class="lead">
            </p>



            <main class="container my-4 ">
                <h1 class="text-center">Add Doctor</h1>
                <div class="container" style="max-width: 50rem;">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Doctor Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Phone number</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name="phonenumber"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Specialist</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="specialist"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Experience</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="experience"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Doctor ID</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="doctorid" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                required></textarea>

                        </div>
                        <button type="submit" name="signup_button" class="btn btn-outline-dark my-3 px-5">Add
                            Doctor</button>
                    </form>
                </div>
                <h1 class="text-center my-5">Remove Doctor</h1>
        <div class="container text-center" style="max-width: 50rem;">

          <a href="./kickoutDoctor.php" class="btn btn-dark ">Remove Doctor</a>
        </div>
            </main>


            <?php


            if (isset($_POST['signup_button'])) {
                include '../config.php';

                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
                $password = mysqli_real_escape_string($conn, ($_POST['password']));
                $specialist = mysqli_real_escape_string($conn, ($_POST['specialist']));
                $experience = mysqli_real_escape_string($conn, ($_POST['experience']));
                $doctorid = mysqli_real_escape_string($conn, ($_POST['doctorid']));
                $description = mysqli_real_escape_string($conn, ($_POST['description']));

                date_default_timezone_set('Asia/Kolkata');
                $registered_on = date('d/m/Y H:i:s', time());

                $sql = "SELECT name FROM doctors WHERE name = '{$username}'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class=" container alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Doctor </strong> Name Already taken by other !!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                } else {
                    $sql1 = "SELECT email FROM doctors WHERE email = '{$email}'";
                    $result1 = mysqli_query($conn, $sql1);

                    if (mysqli_num_rows($result1) > 0) {
                        echo '<div class=" container alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Doctor </strong> Email Already taken by other !!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    } else {
                        $sql2 = "INSERT INTO `doctors`(`name`, `email`, `phonenumber`, `password`, `specialist`,`experience`,`doctorid`,`description` ) VALUES ('{$username}','{$email}','{$phonenumber}','{$password}','{$specialist}','{$experience}','{$doctorid}','{$description}')";
                        if (mysqli_query($conn, $sql2)) {
                            echo '<div class=" container alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Doctor </strong> add Successfully 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                            // header("Location: http://localhost/healthstream");
                            // $_SESSION['username'] = $username;
                        }
                    }
                }
            }
            ?>
        </div>
    </div>

 

</body>

</html>