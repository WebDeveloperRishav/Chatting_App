<?php include "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#" id="signup_form">
                <div class="error_txt"></div>
                <div class="name_details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class='bx bx-low-vision'></i>
                </div>
                <div class="field image">
                    <label for="">Select Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Already Signed Up? <a href="login">Login now</a></div>
        </section>
    </div>
    <script src="assets/js/jquery/jquery.js"></script>
    <script src="assets/js/pass_show_hide.js"></script>
    <script src="assets/js/singup.js"></script>
    <!-- <script>
        $(document).ready(function() {
            const continuebtn = $(".signup form .button");
            
        })
    </script> -->
</body>

</html>