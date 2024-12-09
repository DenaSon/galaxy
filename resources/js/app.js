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



function startSupportWidget() {
    !function () {
        var i = "qcNyHg", a = window, d = document;

        function g() {
            var g = d.createElement("script"), s = "https://www.goftino.com/widget/" + i,
                l = localStorage.getItem("goftino_" + i);
            g.async = !0, g.src = l ? s + "?o=" + l : s;
            d.getElementsByTagName("head")[0].appendChild(g);
        }

        "complete" === d.readyState ? g() : a.attachEvent ? a.attachEvent("onload", g) : a.addEventListener("load", g, !1);
    }();

}

startSupportWidget();
startSwiper();
document.addEventListener('livewire:navigated', (event) => {

    startSwiper();
    startSupportWidget();
}, {once: false});
