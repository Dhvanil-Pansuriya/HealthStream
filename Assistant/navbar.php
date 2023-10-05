
<!-- NabBar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="opacity: 100%;">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Health Stream</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li> -->
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown navbar-dark bg-dark">
                            <a class="nav-link dropdown-toggle px-5 " href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo " {$_SESSION['username']}" ?>
                            </a>
                            <ul class="dropdown-menu  bg-secondary" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./index.php">My Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./allPatient.php">All Patient</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">My Lab Test</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li><a class="dropdown-item" href="#">Notifications</a></li>
                            </ul>
                        </li>
                        <a href="./logout.php" class="btn btn-outline-danger ">Log out</a>
                    </ul>
                </form>

            </div>
        </div>
    </nav>
</header>
<!-- NabBar End -->