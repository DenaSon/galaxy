// First set of menus and button
const toggleButton1 = document.querySelector('.navbar-toggale-button button ');
const navbarMenu1 = document.querySelector('.navbar-menu');
toggleButton1.addEventListener('click', () => {
    // Toggle the 'hidden' class on the .navbar-menu element for the first set of menus
    navbarMenu1.classList.toggle('hidden');
});

// Second set of menus and button
const toggleButton2 = document.querySelectorAll('.navbar-toggale-button button')[1];
const navbarMenu2 = document.querySelectorAll('.navbar-menu')[1];

toggleButton2.addEventListener('click', () => {
    // Toggle the 'hidden' class on the .navbar-menu element for the second set of menus
    navbarMenu2.classList.toggle('hidden');
});

// three set of menus and button
const toggleButton3 = document.querySelectorAll('.navbar-toggale-button button ')[2];
const navbarMenu3 = document.querySelectorAll('.navbar-menu')[2];

toggleButton3.addEventListener('click', () => {
    // Toggle the 'hidden' class on the .navbar-menu element for the second set of menus
    navbarMenu3.classList.toggle('hidden');
});

// four set of menus and button
const toggleButton4 = document.querySelectorAll('.navbar-toggale-button button')[3];
const navbarMenu4 = document.querySelectorAll('.navbar-menu')[3];

toggleButton4.addEventListener('click', () => {
    // Toggle the 'hidden' class on the .navbar-menu element for the second set of menus
    navbarMenu4.classList.toggle('hidden');
});

// five set of menus and button
const toggleButton5 = document.querySelectorAll('.navbar-toggale-button button')[4];
const navbarMenu5 = document.querySelectorAll('.navbar-menu')[4];

toggleButton5.addEventListener('click', () => {
    // Toggle the 'hidden' class on the .navbar-menu element for the second set of menus
    navbarMenu5.classList.toggle('hidden');
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