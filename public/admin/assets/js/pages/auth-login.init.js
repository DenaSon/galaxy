/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: auth login init Js File
*/

document.getElementById('signInForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get input values
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Define regular expressions for validation
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const strongPasswordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    // Validate username/email and password
    const usernameError = document.getElementById('username-error');
    const passwordError = document.getElementById('password-error');
    const successAlert = document.getElementById('successAlert');
    const rememberMeCheckbox = document.getElementById('checkboxDefault1');
    const rememberError = document.getElementById('remember-error');

    usernameError.classList.add('hidden'); // Hide any previous error message
    passwordError.classList.add('hidden');
    successAlert.classList.add('hidden'); // Hide the success message

    if (!emailRegex.test(username)) {
        usernameError.classList.remove('hidden'); // Show error message
    } else if (!strongPasswordRegex.test(password)) {
        passwordError.classList.remove('hidden'); // Show error message
    } else {
        // Form is valid, show the success message
        successAlert.classList.remove('hidden');
    }

    if (!rememberMeCheckbox.checked) {
        // Prevent the form from submitting if the checkbox is not checked
        event.preventDefault();
        rememberError.classList.remove('hidden');
    } else {
        rememberError.classList.add('hidden');
    }
});