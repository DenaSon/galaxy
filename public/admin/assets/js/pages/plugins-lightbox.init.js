/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: plugins lightbox init js
*/

//basic example
const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
    autoplayVideos: true,
});

//description
const lightboxDescription = GLightbox({
    touchNavigation: true,
    loop: true,
    autoplayVideos: true,
    selector: '.description'
});

//video
var lightboxVideo = GLightbox({
    selector: '.video'
});