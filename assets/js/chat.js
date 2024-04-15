let chat_box_div = document.querySelector(".chat_box");
const scrolltopfun = () => {
    chat_box_div.scrollTop = chat_box_div.scrollHeight;
}

$(document).ready(function () {
    const form = $(".typing_area");
    const msginput = $(".typing_area > .input_filed");
    const sendbtn = $('.typing_area > button');
    const chat_box = $('.chat_box');
    chat_box.on('mouseenter', function () {
        chat_box.addClass("active");
    });
    chat_box.on('mouseleave', function () {
        chat_box.removeClass("active");
    });
    form.submit(function (e) {
        e.preventDefault();
    });

    sendbtn.on('click', function (e) {
        const formVal = $(".typing_area")[0];
        let formdata = new FormData(formVal);

        $.ajax({
            type: "POST",
            url: "assets/php/chat.php",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (data) {
                msginput.val('');
                if (!chat_box.hasClass('active')) {
                    scrolltopfun();
                }
            }
        });
    });

    setInterval(() => {
        const getformVal = $(".typing_area")[0];
        let getformdata = new FormData(getformVal);
        $.ajax({
            type: "POST",
            url: "assets/php/getmsg.php",
            data: getformdata,
            processData: false,
            contentType: false,
            success: function (data) {
                chat_box.html(data);
                if (!chat_box.hasClass('active')) {
                    scrolltopfun();
                }
            }
        });
    }, 500);
});