/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: form-validation init js
*/

document.getElementById('signUp').addEventListener('submit', function (event) {
    event.preventDefault();

    const firstName = document.getElementById('firstNameInput').value.trim();
    const lastName = document.getElementById('lastNameInput').value.trim();
    const email = document.getElementById('emailInput').value.trim();
    const phoneNumber = document.getElementById('phoneNumberInput').value.trim();
    const termsCheckbox = document.getElementById('termsCondition');

    const firstNameError = document.getElementById('firstNameError');
    const lastNameError = document.getElementById('lastNameError');
    const emailError = document.getElementById('emailError');
    const phoneNumberError = document.getElementById('phoneNumberError');
    const termsError = document.getElementById('termsError');

    firstNameError.textContent = '';
    lastNameError.textContent = '';
    emailError.textContent = '';
    phoneNumberError.textContent = '';
    termsError.textContent = '';

    let isValid = true;

    if (firstName === '') {
        firstNameError.textContent = 'First Name is required.';
        isValid = false;
    }

    if (lastName === '') {
        lastNameError.textContent = 'Last Name is required.';
        isValid = false;
    }

    if (email === '') {
        emailError.textContent = 'Email is required.';
        isValid = false;
    } else if (!isValidEmail(email)) {
        emailError.textContent = 'Please enter a valid email.';
        isValid = false;
    }

    if (phoneNumber === '') {
        phoneNumberError.textContent = 'Phone Number is required.';
        isValid = false;
    } else if (!isValidPhoneNumber(phoneNumber)) {
        phoneNumberError.textContent = 'Please enter a valid 10-digit phone number.';
        isValid = false;
    }

    if (!termsCheckbox.checked) {
        termsError.textContent = 'You must agree to the terms and conditions.';
        isValid = false;
    }

    if (isValid) {
        // Perform form submission or further processing here
        alert('Form submitted successfully!');
    }
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPhoneNumber(phoneNumber) {
    const phoneRegex = /^\d{10}$/; // Validates exactly 10 digits
    return phoneRegex.test(phoneNumber);
}