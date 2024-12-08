import "./libs/trix";
import './bootstrap';
import '../css/app.css';
import '../css/style.css';

import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';


function startSwiper() {
    // init Swiper:
    const swiper = new Swiper('.swiper', {

        effect: 'cube',
        cubeEffect: {
            shadow: true,
            slideShadows: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

}

startSwiper();

document.addEventListener('livewire:navigated', (event) => {

    startSwiper();

},{ once: false });
