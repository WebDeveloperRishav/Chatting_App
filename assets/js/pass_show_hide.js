// $(document).ready(function () {
//     const password = $(".form .field input[type='password']");
//     const toggleBtn = $(".form .field i");
//     toggleBtn.on('click', function () {
//         console.log(password.attr('type'));
//     });
// })

const password = document.querySelector(".form .field input[type='password']");
const toggleBtn = document.querySelector(".form .field i");
toggleBtn.onclick = () => {
    if (password.type == 'password') {
        password.type = "text";
        toggleBtn.classList.add("active");
    } else {
        password.type = "password";
        toggleBtn.classList.remove("active");
    }
}

