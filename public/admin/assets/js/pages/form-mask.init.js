/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: form-mask Js File
*/

if (document.querySelector("#cleave-date")) {
    var cleaveDate = new Cleave('#cleave-date', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });
}

//DATE Formatting
if (document.querySelector("#cleaveDateFormat")) {
    var cleaveDateFormat = new Cleave('#cleaveDateFormat', {
        date: true,
        datePattern: ['m', 'y']
    });
}

//Time
if (document.querySelector("#cleaveTime")) {
    var cleaveTime = new Cleave('#cleaveTime', {
        time: true,
        timePattern: ['h', 'm', 's']
    });
}

//Time Formatting
if (document.querySelector("#cleaveTimeFormat")) {
    var cleaveTimeFormat = new Cleave('#cleaveTimeFormat', {
        time: true,
        timePattern: ['h', 'm']
    });
}

//Credit Card Number
if (document.querySelector("#cleaveCreditCard")) {
    var cleaveBlocks = new Cleave('#cleaveCreditCard', {
        blocks: [4, 4, 4, 4],
        uppercase: true
    });
}

//Delimiter
if (document.querySelector("#cleaveDelimiter")) {
    var cleaveDelimiter = new Cleave('#cleaveDelimiter', {
        delimiter: '·',
        blocks: [3, 3, 3],
        uppercase: true
    });
}

//Delimiters
if (document.querySelector("#cleaveDelimiters")) {
    var cleaveDelimiters = new Cleave('#cleaveDelimiters', {
        delimiters: ['.', '.', '-'],
        blocks: [3, 3, 3, 2],
        uppercase: true
    });
}

//Prefix 
if (document.querySelector("#cleavePrefix")) {
    var cleavePrefix = new Cleave('#cleavePrefix', {
        prefix: 'PREFIX',
        delimiter: '-',
        blocks: [6, 4, 4, 4],
        uppercase: true
    });
}

//Phone number
if (document.querySelector("#cleavePhone")) {
    var cleaveBlocks = new Cleave('#cleavePhone', {
        delimiters: ['(', ')', '-'],
        blocks: [0, 3, 3, 4]
    });
}

//Numeral
if (document.querySelector("#cleaveNumeral")) {
    var cleaveNumeral = new Cleave('#cleaveNumeral', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });
}