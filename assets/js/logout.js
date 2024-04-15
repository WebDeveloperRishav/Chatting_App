$(document).ready(function () {
    const logout = $(".logout");
    logout.on('click', function (e) {
        e.preventDefault();
        let logout = $(this).data('logoutid');
        if (confirm("do you want to logout?")) {
            $.ajax({
                type: "POST",
                url: "assets/php/logout.php",
                data: {
                    logoutid: logout
                },
                success: function (data) {
                    if (data == "success") {
                        window.location.href = "login.php";
                    } else {
                        window.location.href = "users.php";

                    }

                }
            });
        } else {

        }


    })
});