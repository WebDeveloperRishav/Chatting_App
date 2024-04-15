<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include 'config.php';
    $outgoing_id = mysqli_real_escape_string($conn, $_REQUEST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_REQUEST['incoming_id']);

    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN users on users.unique_id = messages.incoming_id
     WHERE (outgoing_id = {$outgoing_id} and incoming_id = {$incoming_id}) or (outgoing_id = {$incoming_id} and incoming_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    // $sql = mysqli_query($conn, "SELECT * FROM messages where (outgoing_id = {$outgoing_id} AND incoming_id = {$incoming_id}) OR (incoming_id = {$outgoing_id} AND outgoing_id = {$incoming_id}) ORDER BY msg_id DESC");
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_id'] == $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                 <p>' . $row['msg'] . '</p>
                                </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="assets/php/images/' . $row['img'] . '" alt="">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                            </div>';
            }
        }
        echo $output;
    }
}
