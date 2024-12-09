import "./libs/trix";
import './bootstrap';
import '../css/app.css';
import '../css/style.css';
import Swiper from 'swiper/bundle';
// import styles bundle
import 'swiper/css/bundle';

import '../js/libs/swiper.js'
function startSwiper() {
    // init Swiper:
    const swiper = new Swiper('.swiper', {

        effect: 'flip', // Flip effect for a unique visual
        grabCursor: true, // Adds a cursor style for better user experience
        loop: true, // Enables infinite looping
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

startSwiper();



document.addEventListener('livewire:navigated', (event) => {

    startSwiper();

}, {once: false});
