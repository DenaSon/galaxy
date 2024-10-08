/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: apps chat init js
*/

// Create Contact Profile Img
if (document.querySelector("#profile-img-file-input")) {
    document.querySelector("#profile-img-file-input").addEventListener("change", function () {
        var preview = document.querySelector(".user-profile-image");
        var file = document.querySelector(".profile-img-file-input").files[0];
        var reader = new FileReader();
        reader.addEventListener(
            "load",
            function () {
                preview.src = reader.result;
            },
            false
        );
        if (file) {
            reader.readAsDataURL(file);
        }
    });
}

// Create Contact Profile Img
if (document.querySelector("#profile-img-file-input")) {
    document.querySelector("#profile-img-file-input").addEventListener("change", function () {
        var preview = document.querySelector(".user-profile-image");
        var file = document.querySelector(".profile-img-file-input").files[0];
        var reader = new FileReader();
        reader.addEventListener(
            "load",
            function () {
                preview.src = reader.result;
            },
            false
        );
        if (file) {
            reader.readAsDataURL(file);
        }
    });
}

//chat content 
const chatContent = document.querySelector(".chat-content");
const botContent = document.querySelector(".bot-content");
const menuContent = document.querySelector(".menu-content");

const mainChatList = document.querySelector(".mainChatList");
const botChat = document.querySelector(".botChat");
const chatListLinks = document.querySelectorAll("#chatList li a");
const botChatLinks = document.querySelectorAll("#botChat ul li a");
const navTabsLinks = document.querySelectorAll(".nav-tabs li a");

mainChatList.addEventListener("click", () => {
    chatContent.classList.add("active");
    botContent.classList.remove("active");
    menuContent.classList.remove("hidden");
});

botChat.addEventListener("click", () => {
    chatContent.classList.remove("active");
    botContent.classList.add("active");
    menuContent.classList.remove("hidden");
});

function handleLinkClick(link, targetContent) {
    link.addEventListener("click", () => {
        chatContent.classList.remove("show");
        botContent.classList.remove("show");
        menuContent.classList.add("hidden");
        targetContent.classList.add("show");
    });
}

chatListLinks.forEach(link => {
    handleLinkClick(link, chatContent);
});

botChatLinks.forEach(link => {
    handleLinkClick(link, botContent);
});

navTabsLinks.forEach(link => {
    link.addEventListener("click", () => {
        menuContent.classList.remove("hidden");
        chatContent.classList.remove("show");
        botContent.classList.remove("show");
    });
});
