/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: form multi select init js
*/

//basic example
var multiSelectBasic = document.getElementById("multiselect-basic");
if (multiSelectBasic) {
    multi(multiSelectBasic, {
        enable_search: false
    });
}

//header 
var multiSelectHeader = document.getElementById("multiselect-header");
if (multiSelectHeader) {
    multi(multiSelectHeader, {
        non_selected_header: "Cars",
        selected_header: "Favorite Cars"
    });
}

//group options
var multiSelectOptGroup = document.getElementById("multiselect-optiongroup");
if (multiSelectOptGroup) {
    multi(multiSelectOptGroup, {
        enable_search: true
    });
}