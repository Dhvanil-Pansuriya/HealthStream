<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Code Sharing Platform</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body id="signup-page">

    <?php

    // include '../navbar.php'
    
    ?>
    <div id="signup-header">
        <h2>Health Stream</h2>
    </div>
    <main>
        <!-- <div class="auth-form" style="max-width: 50rem;"> -->
        <h1>Add Patient</h1>
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
                <button type="submit" name="signup_button">Add Patient</button>
            </form>
            <!-- </div> -->
        </div>
    </main>
    <?php

    session_start();


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
    <script src="./js/app.js"></script>
</body>

</html>