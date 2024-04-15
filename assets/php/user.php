<?php
include 'config.php';
session_start();
$outgoing_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * from users WHERE  not unique_id = {$outgoing_id}");

$output = "";
if (mysqli_num_rows($sql) > 0) {
    include 'data.php';
} else {
    $output .= "no user are available to chat";
}
echo $output;
