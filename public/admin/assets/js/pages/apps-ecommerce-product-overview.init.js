/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: apps ecommerce overview init Js File
*/

// Get all elements with the 'count-element' class
const countButtons = document.querySelectorAll('.count-button');

countButtons.forEach((element) => {
    element.addEventListener('click', () => {
        const numberDisplay = element.querySelector('.count-number');
        
        let numberOfProcesses = parseInt(numberDisplay.textContent);
        numberOfProcesses++;
        numberDisplay.textContent = numberOfProcesses;
    });
});
