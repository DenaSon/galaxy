/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: landing onepage init Js File
*/

//  Window scroll sticky class add
function windowScroll() {
    var navbar = document.getElementById("navbar");
    if (navbar) {
        if (document.body.scrollTop >= 50 || document.documentElement.scrollTop >= 50) {
            navbar.classList.add("is-sticky");
        } else {
            navbar.classList.remove("is-sticky");
        }
    }
}

window.addEventListener('scroll', function (ev) {
    ev.preventDefault();
    windowScroll();
});

//active menu 
const toggleButton1 = document.querySelector('.navbar-toggale-button button ');
const navbarMenu1 = document.querySelector('.navbar-menu');
toggleButton1.addEventListener('click', () => {
    // Toggle the 'hidden' class on the .navbar-menu element for the first set of menus
    navbarMenu1.classList.toggle('hidden');
});

document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll('.navbar-menu a');

    menuItems.forEach(item => {
        item.addEventListener('click', function () {
            const parentId = item.parentElement.parentElement.getAttribute('id');

            if (parentId) {
                const parentContainer = document.getElementById(parentId);

                if (parentContainer) {
                    const linksInsideContainer = parentContainer.querySelectorAll('li a.active');

                    linksInsideContainer.forEach(link => {
                        link.classList.remove('active');
                    });
                }
            }

            // Add 'active' class to the clicked link
            this.classList.add('active');
        });
    });

});

//
/********************* scroll top js ************************/
//

var backToTopButton = document.getElementById("back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 50 ||
        document.documentElement.scrollTop > 50
    ) {
        backToTopButton.style.opacity = "1";
    } else {
        backToTopButton.style.opacity = "0";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
document.querySelector("#back-to-top").addEventListener("click", () => {
    topFunction()
})