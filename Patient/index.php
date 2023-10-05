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
    <link rel="stylesheet" href="../css/bot.css">
</head>


<body id="homepage" class="bg-secondary">


    <?php
    include "./navbar.php";
    ?>

    <main>

        <div class=" container   my-5 p-5 ">
            <div class="jumbotron container border border-danger text-dark border-2  my-5 p-5 rounded">
                <h1 class="display-4">Hello,<b>
                        <?php echo " {$_SESSION['username']}" ?>
                    </b>
                </h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, ullam? Perferendis
                    voluptatem laudantium nobis quis aliquid, esse fuga facere deleniti recusandae illum dicta laborum
                    aut!
                    Aspernatur, distinctio aliquam. Tenetur, ut!</p>
                <hr class="my-4">



                <p class="lead">
                    Chat With Us (See in Right Bottom Corner)
                </p>
            </div>
        </div>


        <section>
            <?php

            include "../config.php";
            $sql = " SELECT * FROM users WHERE username='{$_SESSION['username']}' ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                                echo "<section class='container   my-5 p-5  '>
                    <h1><b>Your Information</b></h1>
                    
                    <div class='col-lg-12'>
                    <div class='card-body'>
                    <div class='row'>
                    <div class='col-sm-3'>
                    <p class='mb-0'>Full Name</p>
                    </div>
                    <div class='col-sm-9'>
                    <p class=' mb-0'>" . $row['username'] . "</p>
                        </div>
                    </div>
                    <hr>
                    <div class='row'>
                    <div class='col-sm-3'>
                    <p class='mb-0'>Email</p>
                    </div>
                    <div class='col-sm-9'>
                    <p class=' mb-0'>" . $row['email'] . "</p>
                    </div>
                    </div>
                    <hr>
                    <div class='row'>
                    <div class='col-sm-3'>
                    <p class='mb-0'>Phone</p>
                        </div>
                        <div class='col-sm-9'>
                            <p class=' mb-0'>" . $row['phonenumber'] . "</p>
                        </div>
                    </div> 
                    <hr>
                    <div class='row'>
                    <div class='col-sm-3'>
                    <p class='mb-0'>Address</p>
                        </div>
                        <div class='col-sm-9'>
                            <p class=' mb-0'>" . $row['address'] . "</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>";
                }
            }

            ?>
        </section>

        <button class="chatbot-toggler">
            <span class="material-symbols-rounded">≡</span>
            <span class="material-symbols-outlined">≡</span>
        </button>

        <div class="chatbot">
            <header>
                <h2>Chatbot</h2>
                <span class="close-btn material-symbols-outlined">close</span>
            </header>
            <ul class="chatbox">
                <li class="chat incoming">
                    <span class="material-symbols-outlined">😎</span>
                    <p>Hi there <br>How can I help you tooday ?</p>
                </li>
                <li class="chat outgoing">

                </li>
            </ul>
            <div class="chat-input">
                <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
                <span id="send-btn" class="material-symbols-rounded">send</span>
            </div>
        </div>

        <script src="../js/bot.js" defer></script>

    </main>


</body>

</html>