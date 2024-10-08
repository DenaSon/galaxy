/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: auth Register init Js File
*/

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registerForm");
    const emailField = document.getElementById("email-field");
    const usernameField = document.getElementById("username-field");
    const passwordField = document.getElementById("password");
    const emailError = document.getElementById("email-error");
    const usernameError = document.getElementById("username-error");
    const passwordError = document.getElementById("password-error");
    const passwordSuggestion = document.getElementById("password-suggestion");

    form.addEventListener("submit", function (event) {
        let valid = true;

        // Reset previous error messages and styles
        emailField.classList.remove("error");
        usernameField.classList.remove("error");
        passwordField.classList.remove("error");
        emailError.classList.add("hidden");
        usernameError.classList.add("hidden");
        passwordError.classList.add("hidden");

        if (!validateEmail(emailField.value)) {
            emailField.classList.add("error");
            emailError.classList.remove("hidden");
            valid = false;
        }

        if (!usernameField.value.trim()) {
            usernameField.classList.add("error");
            usernameError.classList.remove("hidden");
            valid = false;
        }

        if (passwordField.value.length < 8 || !containsLettersAndNumbers(passwordField.value)) {
            passwordField.classList.add("error");
            passwordError.classList.remove("hidden");
            passwordSuggestion.classList.remove("hidden");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function containsLettersAndNumbers(str) {
        return /[a-zA-Z]/.test(str) && /\d/.test(str);
    }
});