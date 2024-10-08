/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: swiper.init.js */

//Default
var swiper = new Swiper(".mySwiper", {});

//Navigation
var swiper = new Swiper(".navigation-swiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

//Pagination
var swiper = new Swiper(".pagination-slider", {
    pagination: {
        el: ".swiper-pagination",
    },
});

//Pagination dynamic
var swiper = new Swiper(".pagination-dynamic", {
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
});

//Vertical
var swiper = new Swiper(".vertical-slider", {
    direction: "vertical",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

//Pagination progress
var swiper = new Swiper(".pagination-progress", {
    pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});