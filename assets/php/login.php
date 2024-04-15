<?php
include 'config.php';
session_start();
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);

if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users where email = '{$email}' and password = '{$password}'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $status = "Active Now";
        $_SESSION['unique_id'] = $row['unique_id'];
        $slq1 = "UPDATE users SET status = '{$status}' WHERE email = '{$email}'";
        if (mysqli_query($conn, $slq1)) {
            echo "success";
        }
    } else {
        echo "Email and Password is incorrect";
    }
} else {
    echo "All input fields are required";
}
