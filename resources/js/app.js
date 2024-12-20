import "./libs/trix";
import './bootstrap';
import '../css/app.css';
import '../css/style.css';


import Swiper from 'swiper/bundle';
// import styles bundle
import 'swiper/css/bundle';

import '../js/libs/swiper.js'
function startSwiper() {


        const swiper_blog = new Swiper('.swiperBlog', {


            loop: true,


            slidesPerView: 4,
            spaceBetween: 10,

            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },



            // Navigation configuration
            navigation: {
                nextEl: ".swiper-button-next", // Next arrow container
                prevEl: ".swiper-button-prev", // Prev arrow container
            },

            breakpoints: {
                // When the viewport is 320px or larger
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                // When the viewport is 480px or larger
                480: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                // When the viewport is 768px or larger
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                // When the viewport is 1024px or larger
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },

                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            },



        });



    // init Swiper:
    const swiper = new Swiper('.swiper', {

        effect: 'flip', // Flip effect for a unique visual
        grabCursor: true, // Adds a cursor style for better user experience
        loop: false, // Enables infinite looping
        navigation: {
            nextEl: '.swiper-button-next', // Customizable next button
            prevEl: '.swiper-button-prev', // Customizable previous button
        },
        pagination: {
            el: '.swiper-pagination', // Adds dots for better navigation
            clickable: true, // Makes pagination dots interactive
        },
        keyboard: {
            enabled: true, // Allow navigation using keyboard arrows
        },
        autoplay: {
            delay: 4500, // Auto-slide every 3 seconds
            disableOnInteraction: false, // Keeps autoplay running after manual navigation
        },
        flipEffect: {
            slideShadows: true, // Adds shadow for depth effect
            limitRotation: true, // Smooth transitions
        },

    });

}

document.addEventListener('DOMContentLoaded', startSwiper);

document.addEventListener('livewire:navigated', (event) => {

    startSwiper();

}, {once: false});
