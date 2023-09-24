document.addEventListener("DOMContentLoaded", function () {
    const registrationForm = document.getElementById("registration-form");

    registrationForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(registrationForm);

        fetch("register.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Registration successful!");
                registrationForm.reset();
            } else {
                alert("Registration failed. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");

    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(loginForm);

        fetch("login.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.usertype === "associate") {
                    window.location.href = "associate_dashboard.php";
                } else if (data.usertype === "teamleader") {
                    window.location.href = "teamleader_dashboard.php";
                }
            } else {
                alert("Login failed. Please check your credentials.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});