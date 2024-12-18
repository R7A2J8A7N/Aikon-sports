document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm");
    const nameField = document.getElementById("name");
    const emailField = document.getElementById("email");
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirm-password");

    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const confirmPasswordError = document.getElementById("confirmPasswordError");

    form.addEventListener("submit", function (e) {
        let isValid = true;

        // Name Validation
        if (nameField.value.trim().length < 2) {
            nameError.style.display = "block";
            isValid = false;
        } else {
            nameError.style.display = "none";
        }

        // Email Validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex for email validation
        if (!emailRegex.test(emailField.value.trim())) {
            emailError.style.display = "block";
            isValid = false;
        } else {
            emailError.style.display = "none";
        }

        // Password Validation
        if (passwordField.value.trim().length < 6) {
            passwordError.style.display = "block";
            isValid = false;
        } else {
            passwordError.style.display = "none";
        }

        // Confirm Password Validation
        if (confirmPasswordField.value.trim() !== passwordField.value.trim()) {
            confirmPasswordError.style.display = "block";
            isValid = false;
        } else {
            confirmPasswordError.style.display = "none";
        }

        // Prevent form submission if any validation fails
        if (!isValid) {
            e.preventDefault();
        }
    });
});
