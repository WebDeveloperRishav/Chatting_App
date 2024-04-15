const searchBar = document.querySelector(".users .search input");
const searchbtn = document.querySelector(".users .search button");

searchbtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchbtn.classList.toggle("active");
}

$(document).ready(function () {
    let userList = $(".users > .users_list");

    $('.search > input').on('keyup', function () {
        let searchbar = $(this).val();
        if (searchBar != "") {
            $(".search > input").addClass("active");
            // console.log(this);
        } else {
            $(".search > input").removeClass("active");
        }
        $.ajax({
            type: "POST",
            url: "assets/php/search.php",
            data: {
                search_trem: searchbar
            },
            success: function (data) {
                $(userList).html(data);
                // console.log(data);

            }
        });

    });


    setInterval(() => {
        $.ajax({
            type: "POST",
            url: "assets/php/user.php",
            success: function (data) {
                if (!$('.search > input').hasClass("active")) {
                    $(userList).html(data);
                    // console.log(data);
                }
            }
        });
    }, 500);
});