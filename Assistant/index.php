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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-secondary">

    <?php

    include 'navbar.php';

    ?>

    <div class="container my-5 p-5 ">
        <div class="jumbotron container border border-danger text-dark border-2  my-5 p-5 rounded">
            <h1 class="display-4">Hello,<b>
                </b>
            </h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, ullam? Perferendis
                voluptatem laudantium nobis quis aliquid, esse fuga facere deleniti recusandae illum dicta laborum
                aut!
                Aspernatur, distinctio aliquam. Tenetur, ut!</p>
            <hr class="my-4">
            <p class="lead">
            </p>
       


    <main class="container my-4 ">
        <!-- <div class="auth-form" style="max-width: 50rem;"> -->
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
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">phonenumber</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="phonenumber" required>
                </div>
                <div class="mb-3">
                    <div class="dropdown my-4">
                        
                        <label for="exampleInputPassword1" class="form-label">Allocate Doctor</label>
                        <select class="form-select" aria-label="Default select example" name="allocateddoctor">

                            <?php

                            include "../config.php";
                            $sql = " SELECT name FROM doctors ";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo " <option value='" . $row['name'] . " '>" . $row['name'] . " </option>
                                        ";

                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>

                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>

                </div>
                <button type="submit" name="signup_button">Add Patient</button>
            </form>
            <!-- </div> -->
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

        date_default_timezone_set('Asia/Kolkata');
        $registered_on = date('d/m/Y H:i:s', time());

        $sql = "SELECT username FROM users WHERE username = '{$username}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo " <div style='display:flex; justify-content: center; align-items: center; margin:30px; color:#200101; '>Username already being used.</div>";
        } else {
            $sql1 = "SELECT email FROM users WHERE email = '{$email}'";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) {
                echo "<div style='display:flex; justify-content: center; align-items: center; margin:30px; '>Email Already being Used.</div>";
            } else {
                $sql2 = "INSERT INTO `users`(`username`, `email`, `phonenumber`, `registered_date`, `password`,`address`,`allocateddoctor` ) VALUES ('{$username}','{$email}','{$phonenumber}', NOW(),'{$password}','{$address}','{$allocateddoctor}')";
                if (mysqli_query($conn, $sql2)) {
                    echo "<div style='display:flex; justify-content: center; align-items: center; margin:30px; '>Patient Add Successfully</div>";
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