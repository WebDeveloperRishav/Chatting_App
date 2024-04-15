<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("Location: login.php");
}

?>
<?php include "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                include "assets/php/config.php";
                $sql = mysqli_query($conn, "SELECT * from users where unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                    <img src="assets/php/images/<?php echo $row['img']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="" data-logoutid="<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class='bx bx-search'></i></button>
            </div>
            <div class="users_list">
            </div>
        </section>
    </div>
    <script src="assets/js/jquery/jquery.js"></script>
    <script src="assets/js/user.js"></script>
    <script src="assets/js/logout.js"></script>
</body>

</html>