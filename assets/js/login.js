$(document).ready(function () {
    const form = $("#login");
    const continuebtn = $("#login .button");
    form.submit(function (e) {
        e.preventDefault();
    });
    continuebtn.click(function () {

        // let formdata = form.serialize();
        let formvalue = $("#login")[0];
        let formdata = new FormData(formvalue);
        $.ajax({
            type: "POST",
            url: "assets/php/login.php",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (data) {
                // console.log(data);
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