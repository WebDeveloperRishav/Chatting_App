<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("Location: login.php");
}

?>
<?php include "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="chat_area">
            <header>
                <?php
                include "assets/php/config.php";
                $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
                $sql = mysqli_query($conn, "SELECT * from users where unique_id = {$user_id}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="users.php" class="back_icon"><i class='bx bx-left-arrow-alt'></i></a>
                <img src="assets/php/images/<?php echo $row['img']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat_box">


            </div>
            <form action="#" class="typing_area">
                <input type="text" name="outgoing_id" hidden value="<?php echo $_SESSION['unique_id']; ?>" placeholder="Type a message here.">
                <input type="text" name="incoming_id" hidden value="<?php echo $user_id; ?>" placeholder="Type a message here.">
                <input type="text" class="input_filed" name="message" placeholder="Type a message here.">
                <button><i class='bx bxl-telegram'></i></button>
            </form>
        </section>
    </div>
    <script src="assets/js/jquery/jquery.js"></script>
    <script src="assets/js/chat.js"></script>
</body>

</html>