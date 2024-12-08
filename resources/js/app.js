import "./libs/trix";
import './bootstrap';
import '../css/app.css';
import '../css/style.css';

import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

// init Swiper:
const swiper = new Swiper('.swiper', {

    effect: 'cube',  // Cube rotation effect
    cubeEffect: {
        shadow: true,  // Adds a shadow behind the slides
        slideShadows: true,  // Adds shadows to the individual slides
    },






    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});


