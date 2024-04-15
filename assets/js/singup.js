$(document).ready(function () {
    const form = $("#signup_form");
    const continuebtn = $("#signup_form .button");
    form.submit(function (e) {
        e.preventDefault();
    });
    continuebtn.click(function () {

        // let formdata = form.serialize();
        let formvalue = $("#signup_form")[0];
        let formdata = new FormData(formvalue);
        $.ajax({
            type: "POST",
            url: "assets/php/signup.php",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == "success") {
                    window.location.href = "users.php";
                } else {
                    $(".error_txt").text(data);
                    $(".error_txt").css({ "display": "block" });
                }
            }
        });
    });




});