<?php
include "../config.php";
$username = $_GET['username'];

$sql = "DELETE FROM `users` WHERE username='{$username}'";
$result = mysqli_query($conn, $sql) or die("Query Failed.");

header("location: ./allPatient.php");
?>