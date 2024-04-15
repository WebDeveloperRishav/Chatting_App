<?php include "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#" id="login">
                <div class="error_txt"></div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter new password">
                    <i class='bx bx-low-vision'></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet Signed Up? <a href="index">Signup now</a></div>
        </section>
    </div>
    <script src="assets/js/jquery/jquery.js"></script>
    <script src="assets/js/pass_show_hide.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>