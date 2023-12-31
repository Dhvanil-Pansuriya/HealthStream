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
                <h1 class="text-center">Add Patient</h1>
                <div class="container" style="max-width: 50rem;">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
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
                            <div class="dropdown my-4">

                                <label for="exampleInputPassword1" class="form-label">Allocate Doctor</label>
                                <select class="form-select" aria-label="Default select example" name="allocateddoctor">

                                    <?php

                                    include "../config.php";
                                    $sql = " SELECT name, specialist FROM doctors ";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            echo " <option value='" . $row['name'] . " '>" . $row['name'] . " ( " . $row['specialist'] . " ) </option>
                                        ";

                                        }
                                    } else {
                                        echo "No Doctor Available";
                                    }

                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Patient's Disease</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="disease"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"
                                required></textarea>

                        </div>
                        <button type="submit" name="signup_button" class="btn btn-outline-dark my-3 px-5">Add
                            Patient</button>
                    </form>
                </div>
            </main>


            <?php


            if (isset($_POST['signup_button'])) {
                include '../config.php';

                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, ($_POST['password']));
                $address = mysqli_real_escape_string($conn, ($_POST['address']));
                $allocateddoctor = mysqli_real_escape_string($conn, ($_POST['allocateddoctor']));
                $disease = mysqli_real_escape_string($conn, ($_POST['disease']));

                date_default_timezone_set('Asia/Kolkata');
                $registered_on = date('d/m/Y H:i:s', time());

                $sql = "SELECT username FROM users WHERE username = '{$username}'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo '<div class=" container alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Patient </strong> Name Already taken by other !!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                } else {
                    $sql1 = "SELECT email FROM users WHERE email = '{$email}'";
                    $result1 = mysqli_query($conn, $sql1);

                    if (mysqli_num_rows($result1) > 0) {
                        echo '<div class=" container alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Patient </strong> Email Already taken by other !!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    } else {
                        $sql2 = "INSERT INTO `users`(`username`, `email`, `phonenumber`, `registered_date`, `password`,`address`,`allocateddoctor`,`disease` ) VALUES ('{$username}','{$email}','{$phonenumber}', NOW(),'{$password}','{$address}','{$allocateddoctor}','{$disease}')";
                        if (mysqli_query($conn, $sql2)) {
                            echo '<div class=" container alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Patient </strong> add Successfully 
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

    <div class="my-5">
        <hr>
    </div>

</body>

</html>