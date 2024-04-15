<?php
while ($row = mysqli_fetch_assoc($sql)) {
    $sql2 = "SELECT * FROM messages WHERE (incoming_id = {$row['unique_id']}
    or outgoing_id = {$row['unique_id']}) AND (outgoing_id = {$outgoing_id}
    or incoming_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if (mysqli_num_rows($query2) > 0) {
        $res = $row2['msg'];
    } else {
        $res = "No Message Available";
    }
    (strlen($res > 28)) ? $msg = substr($res, 0, 28) . "..." : $msg = $res;
    // ($outgoing_id == $row2['incoming_id']) ? $you = "you" : $you = "";
    ($row['status'] == "Offline Now") ? $offline = "offline" : $offline = "";

    $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                <div class="content">
                <img src="assets/php/images/' . $row['img'] . '" alt="">
                <div class="details">
                    <span>' . $row["fname"] . " " . $row["lname"] . '</span>
                    <p>' . $msg . '</p>
                </div>
                </div>
                <div class="status_dot ' . $offline . '">
                    <i class="bx bxs-circle"></i>
                </div>
                </a>';
}
