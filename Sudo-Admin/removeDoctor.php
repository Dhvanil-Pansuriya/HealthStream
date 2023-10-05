<?php
include "../config.php";
$username = $_GET['username'];

$sql = "DELETE FROM `doctors` WHERE  `name`='{$username}'";
$result = mysqli_query($conn, $sql) or die("Query Failed.");


header("location: ./manageDoctor.php");
?>