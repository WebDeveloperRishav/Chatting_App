<?php
include 'config.php';
session_start();
if (isset($_SESSION['unique_id'])) {
    $logout_id = mysqli_real_escape_string($conn, $_REQUEST['logoutid']);
    if (isset($logout_id)) {
        $status = "Offline Now";

        $sql = mysqli_query($conn, "UPDATE users set status = '{$status}' where unique_id = {$logout_id}");
        if ($sql) {
            session_unset();
            session_destroy();
            echo "success";
        } else {
            echo "failed";
        }
    }
}
