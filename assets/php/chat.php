<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include 'config.php';
    $outgoing_id = mysqli_real_escape_string($conn, $_REQUEST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_REQUEST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_REQUEST['message']);

    if (!empty($message)) {
        $sql = mysqli_query($conn, "INSERT INTO messages(outgoing_id, incoming_id, msg) VALUES({$outgoing_id},{$incoming_id},'{$message}')");
    }
} else {
    header("Location: login.php");
}
