const toggle_password = document.querySelector(".hide_eyes");
if (toggle_password !== null) {
    toggle_password.addEventListener("click", (e) => {
        const input = e.target.parentNode.querySelector("input");
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    });
}
