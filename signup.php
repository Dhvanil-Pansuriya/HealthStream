<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Code Sharing Platform</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body id="signup-page">
    <div id="signup-header">
        <h2>Health Stream</h2>
    </div>
    <main>
        <div class="auth-form">
            <h1>Sign Up</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required />
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
                <label for="name">Phone Number</label>
                <input type="number" name="phonenumber" id="phonenumber" required />
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required />
                <button type="submit" name="signup_button">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </main>
    <?php

    session_start();

    if (isset($_SESSION['username'])) {
        header('Location: http://localhost/healthstream');
    }

    if (isset($_POST['signup_button'])) {
        include 'config.php';

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

                    header("Location: http://localhost/healthstream/Patient/index.php");
                }
            }
        }
    }
    ?>
    <script src="./js/app.js"></script>
</body>

</html>