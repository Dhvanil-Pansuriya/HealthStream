<?php

session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: http://localhost/healthstream/index.php", true);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - Health Stream</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body id="signup-page" class="bg-secondary">
    <div id="signup-header">
        <h2>Login - Health Stream</h2>
    </div>


    <main>
        <div class="auth-form border border-4 border-danger" style="max-width: 40rem;">
            <h1>Log In</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" />
                <label for="password">Password</label>
                <input type="password" name="password" id="password" />
                <button type="submit" name="login_button" class="btn-outline-danger">Log In</button>
            </form>
            <!-- <p>Or create <a href="./signup.php">A new account</a></p> -->
        <div class=" my-3">
            <?php

            if (isset($_POST['login_button'])) {
                include "./config.php";

                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                $sql3 = "SELECT name FROM `sudo-admin` WHERE name = '{$username}' AND password='{$password}'";
                $result3 = mysqli_query($conn, $sql3);

                if (mysqli_num_rows($result3) > 0) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_role'] = 'Sudo-Admin';
                    header("Location: http://localhost/healthstream/Sudo-Admin/index.php");
                }

                $sql2 = "SELECT name FROM `assistant` WHERE name = '{$username}' AND password='{$password}'";
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_role'] = 'assistant';
                    header("Location: http://localhost/healthstream/Assistant/index.php");
                }

                $sql1 = "SELECT name FROM `doctors` WHERE name = '{$username}' AND password='{$password}'";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_role'] = 'doctors';
                    header("Location: http://localhost/healthstream/Doctor/index.php");
                }

                $sql = "SELECT username FROM users WHERE username = '{$username}' AND password='{$password}'";
                $result = mysqli_query($conn, $sql) or die('Query Failed.');

                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_role'] = 'user';
                    header("Location: http://localhost/healthstream/Patient/index.php");
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username or password </strong> did not matched.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                }
            }

            ?>
        </div>
        </div>
    </main>
    <script src="./js/app.js"></script>
</body>

</html>