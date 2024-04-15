<?php
include 'config.php';
session_start();
$outgoing_id = $_SESSION['unique_id'];
$search = mysqli_real_escape_string($conn, $_REQUEST['search_trem']);
$output = "";
$sql = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '%{$search}%' or lname LIKE '%{$search}%'");
if (mysqli_num_rows($sql) > 0) {
    include 'data.php';
} else {
    $output .= "No user Found Related to your Search Term";
}


echo $output;
