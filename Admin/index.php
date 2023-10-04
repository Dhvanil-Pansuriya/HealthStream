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
    <link rel="stylesheet" href="../css/style.css">
</head>


<body id="homepage" class="bg-secondary">

    <?php
    include "../navbar.php";
    ?>

    <main>

        <div class=" container  my-5 p-3 ">
            <div class="jumbotron container border border-danger text-dark border-2  my-5 p-5 rounded">
                <h2 class="display-4">Hello, Dear<b>
                        <?php echo " {$_SESSION['username']}" ?>
                    </b>
                </h2>
                <hr class="my-4">
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, ullam? Perferendis
                    voluptatem laudantium nobis quis aliquid, esse fuga facere deleniti recusandae illum dicta laborum
                    aut!
                    Aspernatur, distinctio aliquam. Tenetur, ut!</p>

            </div>
        </div>


        <section>
            <div class="container">
                <div class="jumbotron container border border-dark text-dark border-2 my-5 p-4 rounded">
                    <div id="signup-header" class="">
                        <h3 class="text-dark">Add <b>Patient</b></h3>
                    </div>
                    <main class="container my-5">
                        <!-- <div class="auth-form">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" required />
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required />
                                <label for="name">Phone Number</label>
                                <input type="number" name="phonenumber" id="phonenumber" required />
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required />
                                <button type="submit" name="signup_button">Add Patient</button>
                            </form>

                        </div> -->
                        <div class="container" style="max-width: 50rem;">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" name="email"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">phonenumber</label>
                                    <input type="number" class="form-control" id="exampleInputPassword1"
                                        name="phonenumber" required>
                                </div>
                                <button type="submit" name="signup_button">Add Patient</button>
                            </form>
                        </div>
                        <?php
                        // session_start();


                        if (isset($_POST['signup_button'])) {
                            include '../config.php';

                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            $password = mysqli_real_escape_string($conn, ($_POST['password']));

                            date_default_timezone_set('Asia/Kolkata');
                            $registered_on = date('d/m/Y H:i:s', time());

                            $sql = "SELECT username FROM users WHERE username = '{$username}'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                echo " <div style='display:flex; justify-content: center; align-items: center; margin:30px; '>Username already being used.</div>";
                            } else {
                                $sql1 = "SELECT email FROM users WHERE email = '{$email}'";
                                $result1 = mysqli_query($conn, $sql1);

                                if (mysqli_num_rows($result1) > 0) {
                                    echo "<div style='display:flex; justify-content: center; align-items: center; margin:30px; '>Email Already being Used.</div>";
                                } else {
                                    $sql2 = "INSERT INTO `users`(`username`, `email`, `phonenumber`, `registered_date`, `password`) VALUES ('{$username}','{$email}','{$phonenumber}', NOW(),'{$password}')";

                                    if (mysqli_query($conn, $sql2)) {
                                        $_SESSION['username'] = $username;

                                        header("Location: http://localhost/healthstream/Admin/admin.php");
                                    }
                                }
                            }
                        }
                        ?>
                </div>
    </main>
    <script src="./js/app.js"></script>
    </div>
    </div>

    </section>


    </main>


</body>

</html>