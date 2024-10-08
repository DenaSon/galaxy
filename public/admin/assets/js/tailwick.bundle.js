/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: Common Plugins Js File
*/


(function () {
    ("use strict");
    
    function loadScriptIfElementsExist(selector, scriptSrc) {
        var elements = document.querySelectorAll(selector);
        if (elements.length > 0) {
          var scriptElement = document.createElement('script');
          scriptElement.src = scriptSrc;
          document.head.appendChild(scriptElement);
        }
    }

    loadScriptIfElementsExist("[data-toast]", 'assets/libs/toastify-js/src/toastify.js');
    loadScriptIfElementsExist("[data-provider]", 'assets/libs/flatpickr/flatpickr.min.js');

    function pluginData() {

        // Toast UI Notification
        var toastExamples = document.querySelectorAll("[data-toast]");
        Array.from(toastExamples).forEach(function (element) {
            element.addEventListener("click", function () {
                var toastData = {};
                var isToastVal = element.attributes;
                if (isToastVal["data-toast-text"])
                    toastData.text = isToastVal["data-toast-text"].value.toString();
                if (isToastVal["data-toast-gravity"])
                    toastData.gravity = isToastVal["data-toast-gravity"].value.toString();
                if (isToastVal["data-toast-position"])
                    toastData.position = isToastVal["data-toast-position"].value.toString();
                if (isToastVal["data-toast-className"])
                    toastData.className = isToastVal["data-toast-className"].value.toString();
                if (isToastVal["data-toast-duration"])
                    toastData.duration = isToastVal["data-toast-duration"].value.toString();
                if (isToastVal["data-toast-close"])
                    toastData.close = isToastVal["data-toast-close"].value.toString();
                if (isToastVal["data-toast-style"])
                    toastData.style = isToastVal["data-toast-style"].value.toString();
                if (isToastVal["data-toast-offset"])
                    toastData.offset = isToastVal["data-toast-offset"];

                setTimeout(() => {
                    Toastify({
                        newWindow: true,
                        text: toastData.text,
                        gravity: toastData.gravity,
                        position: toastData.position,
                        className: "bg-" + toastData.className + "-500",
                        stopOnFocus: true,
                        offset: {
                            x: toastData.offset ? 50 : 0, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                            y: toastData.offset ? 10 : 0, // vertical axis - can be a number or a string indicating unity. eg: '2em'
                        },
                        duration: toastData.duration,
                        close: toastData.close == "close" ? true : false,
                        style: toastData.style == "style" ? {
                            background: "#3b82f6"
                        } : "",
                    }).showToast();
                }, 200);
            });
        });

        // Choices Select plugin
        var choicesExamples = document.querySelectorAll("[data-choices]");
        Array.from(choicesExamples).forEach(function (item) {
            var choiceData = {};
            var isChoicesVal = item.attributes;
            if (isChoicesVal["data-choices-groups"])
                choiceData.placeholderValue = "This is a placeholder set in the config";
            if (isChoicesVal["data-choices-search-false"])
                choiceData.searchEnabled = false;
            if (isChoicesVal["data-choices-search-true"])
                choiceData.searchEnabled = true;
            if (isChoicesVal["data-choices-removeItem"])
                choiceData.removeItemButton = true;
            if (isChoicesVal["data-choices-sorting-false"])
                choiceData.shouldSort = false;
            if (isChoicesVal["data-choices-sorting-true"])
                choiceData.shouldSort = true;
            if (isChoicesVal["data-choices-multiple-remove"])
                choiceData.removeItemButton = true;
            if (isChoicesVal["data-choices-limit"])
                choiceData.maxItemCount = isChoicesVal["data-choices-limit"].value.toString();
            if (isChoicesVal["data-choices-limit"])
                choiceData.maxItemCount = isChoicesVal["data-choices-limit"].value.toString();
            if (isChoicesVal["data-choices-editItem-true"])
                choiceData.maxItemCount = true;
            if (isChoicesVal["data-choices-editItem-false"])
                choiceData.maxItemCount = false;
            if (isChoicesVal["data-choices-text-unique-true"])
                choiceData.duplicateItemsAllowed = false;
            if (isChoicesVal["data-choices-text-disabled-true"])
                choiceData.addItems = false;
            choiceData.allowHTML = true;
            isChoicesVal["data-choices-text-disabled-true"] ? new Choices(item, choiceData).disable() : new Choices(item, choiceData);
        });

        // flatpickr
        var flatpickrExamples = document.querySelectorAll("[data-provider]");
        Array.from(flatpickrExamples).forEach(function (item) {
            if (item.getAttribute("data-provider") == "flatpickr") {
                var dateData = {};
                var isFlatpickerVal = item.attributes;
                if (isFlatpickerVal["data-date-format"])
                    dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
                if (isFlatpickerVal["data-enable-time"]) {
                    (dateData.enableTime = true),
                        (dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString() + " H:i");
                }
                if (isFlatpickerVal["data-altFormat"]) {
                    (dateData.altInput = true),
                        (dateData.altFormat = isFlatpickerVal["data-altFormat"].value.toString());
                }
                if (isFlatpickerVal["data-minDate"]) {
                    dateData.minDate = isFlatpickerVal["data-minDate"].value.toString();
                    dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
                }
                if (isFlatpickerVal["data-maxDate"]) {
                    dateData.maxDate = isFlatpickerVal["data-maxDate"].value.toString();
                    dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
                }
                if (isFlatpickerVal["data-default-date"]) {
                    dateData.defaultDate = isFlatpickerVal["data-default-date"].value.toString();
                    dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
                }
                if (isFlatpickerVal["data-multiple-date"]) {
                    dateData.mode = "multiple";
                    dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
                }
                if (isFlatpickerVal["data-range-date"]) {
                    dateData.mode = "range";
                    dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
                }
                if (isFlatpickerVal["data-inline-date"]) {
                    (dateData.inline = true),
                        (dateData.defaultDate = isFlatpickerVal["data-default-date"].value.toString());
                    dateData.dateFormat = isFlatpickerVal["data-date-format"].value.toString();
                }
                if (isFlatpickerVal["data-disable-date"]) {
                    var dates = [];
                    dates.push(isFlatpickerVal["data-disable-date"].value);
                    dateData.disable = dates.toString().split(",");
                }
                if (isFlatpickerVal["data-week-number"]) {
                    var dates = [];
                    dates.push(isFlatpickerVal["data-week-number"].value);
                    dateData.weekNumbers = true
                }
                document.addEventListener('DOMContentLoaded', function () {
                    flatpickr(item, dateData);
                });
            } else if (item.getAttribute("data-provider") == "timepickr") {
                var timeData = {};
                var isTimepickerVal = item.attributes;
                if (isTimepickerVal["data-time-basic"]) {
                    (timeData.enableTime = true),
                        (timeData.noCalendar = true),
                        (timeData.dateFormat = "H:i");
                }
                if (isTimepickerVal["data-time-hrs"]) {
                    (timeData.enableTime = true),
                        (timeData.noCalendar = true),
                        (timeData.dateFormat = "H:i"),
                        (timeData.time_24hr = true);
                }
                if (isTimepickerVal["data-min-time"]) {
                    (timeData.enableTime = true),
                        (timeData.noCalendar = true),
                        (timeData.dateFormat = "H:i"),
                        (timeData.minTime = isTimepickerVal["data-min-time"].value.toString());
                }
                if (isTimepickerVal["data-max-time"]) {
                    (timeData.enableTime = true),
                        (timeData.noCalendar = true),
                        (timeData.dateFormat = "H:i"),
                        (timeData.minTime = isTimepickerVal["data-max-time"].value.toString());
                }
                if (isTimepickerVal["data-default-time"]) {
                    (timeData.enableTime = true),
                        (timeData.noCalendar = true),
                        (timeData.dateFormat = "H:i"),
                        (timeData.defaultDate = isTimepickerVal["data-default-time"].value.toString());
                }
                if (isTimepickerVal["data-time-inline"]) {
                    (timeData.enableTime = true),
                        (timeData.noCalendar = true),
                        (timeData.defaultDate = isTimepickerVal["data-time-inline"].value.toString());
                    timeData.inline = true;
                }
                setTimeout(() => {
                    flatpickr(item, timeData);
                }, 750);
            }
        });
    }

    // Counter Number
    function counter() {
        const counters = document.querySelectorAll(".counter-value");
        const speed = 250;

        if (counters.length) {
            counters.forEach((counter) => {
                const target = +counter.getAttribute("data-target");
                const inc = target / speed;

                let count = 0;
                const updateCount = () => {
                    count += inc;
                    if (count < target) {
                        counter.innerText = numberWithCommas(count.toFixed(0));
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = numberWithCommas(target);
                    }
                };
                updateCount();
            });
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }

// // input spinner value ++ or --

    function inputSpinComponents() {
        isData();

        function isData() {
            const plusElements = document.querySelectorAll('button.plus');
            const minusElements = document.querySelectorAll('button.minus');

            if (plusElements.length) {
                plusElements.forEach(element => {
                    element.addEventListener('click', (event) => {
                        const inputElement = getDivFromTheElement(event.target);
                        let inputVal = Number(inputElement.value);
                        const maxVal = Number(inputElement.getAttribute('max'));
                        if (inputVal < maxVal) {
                            inputElement.value = inputVal + 1;
                            updateQuantity(inputElement);
                            removeBtn(inputElement)
                        }
                    });
                });
            }

            if (minusElements.length) {
                minusElements.forEach(element => {
                    element.addEventListener('click', (event) => {
                        const inputElement = getDivFromTheElement(event.target);
                        let inputVal = Number(inputElement.value);
                        const minVal = Number(inputElement.getAttribute('min'));
                        if (inputVal > minVal) {
                            inputElement.value = inputVal - 1;
                            updateQuantity(inputElement);
                            removeBtn(inputElement)
                        }
                    });
                });
            }
        }

        function updateQuantity(quantityInput) {
            var productRow = quantityInput.closest('.product');
            var productList = quantityInput.closest('.product-list');
            var price = parseFloat(productRow.querySelector('.product-price span')?.innerHTML || 0);
            var quantity = parseFloat(quantityInput.value);
            var linePrice = price * quantity;

            Array.from(productRow.getElementsByClassName('product-line-price')).forEach(function (e) {
                e.innerHTML = linePrice.toFixed(2);
                recalculateCart();
            });
        }
        // Add remove button functionality
        function removeBtn(productElement) {
            var productRow = productElement.closest('.product');
            var removeButton = productRow.querySelector('.remove-button');
            if (removeButton) {
                removeButton.addEventListener('click', function () {
                    productRow.remove();
                    recalculateCart();
                });
            }
        }
        function recalculateCart() {
            var elm = document.querySelector(".product-list");
            var subtotal = 0;
            Array.from(elm.getElementsByClassName("product")).forEach(function (item) {
                Array.from(item.getElementsByClassName('product-line-price')).forEach(function (e) {
                    subtotal += parseFloat(e.innerHTML);
                });
            });
            var currencySign = "$";
            var taxRate = 0.125;
            var shippingRate = 65.00;
            var discountRate = 0.15;
            /* Calculate totals */
            var tax = subtotal * taxRate;
            var discount = subtotal * discountRate;

            var shipping = (subtotal > 0 ? shippingRate : 0);
            var newTotal = subtotal + tax + shipping - discount;
            const cartSubtitle = elm.parentElement.querySelector(".table-total .cart-subtotal")
           if (cartSubtitle) {
                cartSubtitle.innerHTML = currencySign + subtotal.toFixed(2);
            }
            const cartTex = elm.parentElement.querySelector(".table-total .cart-tax")
            if (cartTex) {
                cartTex.innerHTML = currencySign + tax.toFixed(2);
            }
            const cartShipping = elm.parentElement.querySelector(".table-total .cart-shipping")
            if (cartShipping) {
                cartShipping.innerHTML = currencySign + shipping.toFixed(2);
            }
            const cartTotal = elm.parentElement.querySelector(".table-total .cart-total")
            if (cartTotal) {
                cartTotal.innerHTML = currencySign + newTotal.toFixed(2);
            }
            const cartDiscount = elm.parentElement.querySelector(".table-total .cart-discount")
            if (cartDiscount) {
                cartDiscount.innerHTML = "-" + currencySign + discount.toFixed(2);
            }
        }
    }


    // Function to get the input element from the parent hierarchy
    function getDivFromTheElement(element) {
        let temp = element.parentNode.querySelector('input.product-quantity');

        if (!temp) {
            const upperParent = element.parentNode;
            return getDivFromTheElement(upperParent);
        }
        return temp;
    }

    // drawer setting offCanvas
    function drawerSetting() {
        const allDrawerButtons = document.querySelectorAll('[data-drawer-target]');
        const allDrawerCloseButtons = document.querySelectorAll('[data-drawer-close]');
        const allModalButtons = document.querySelectorAll('[data-modal-target]');
        const allModalCloseButtons = document.querySelectorAll('[data-modal-close]');
        const bodyElement = document.body;       
        
        let openDrawerId = null;
        let openModalId = null;
        if(document.getElementById("backDropDiv")) {
            var backDropOverlay = document.getElementById("backDropDiv");
        } else {
            var backDropOverlay = document.createElement('div');
            backDropOverlay.className = 'fixed inset-0 bg-slate-900/40 dark:bg-zink-800/70 z-[1049] backdrop-overlay hidden';
            backDropOverlay.id = 'backDropDiv';
        }
        if (allModalButtons.length > 0 || allDrawerButtons.length > 0)
            document.body.appendChild(backDropOverlay);

        // Function to toggle the state of drawers and modals
        function toggleElementState(elementId, show, delay) {
            const element = document.getElementById(elementId);
            if (element) {
                if (!show) {
                    element.classList.add('show');
                    backDropOverlay.classList.add('hidden');
                    setTimeout(() => {
                        element.classList.add("hidden");
                    }, 350);
                } else {
                    element.classList.remove("hidden");
                    setTimeout(() => {
                        element.classList.remove('show');
                        backDropOverlay.classList.remove('hidden');
                    }, delay);
                }
                bodyElement.classList.toggle('overflow-hidden', show);
                if (show) {
                    openDrawerId = elementId;
                    openModalId = elementId;
                } else {
                    openDrawerId = null;
                    openModalId = null;
                }
            }
        }

        // Attach click event listeners to drawer buttons
        allDrawerButtons.forEach(element => {
            const drawerId = element.getAttribute('data-drawer-target');
            if (drawerId) {
                element.addEventListener('click', function () {
                    toggleElementState(drawerId, true, 0);
                });
            }
        });

        // Attach click event listeners to drawer close buttons
        allDrawerCloseButtons.forEach(element => {
            const drawerId = element.getAttribute('data-drawer-close');
            if (drawerId) {
                element.addEventListener('click', function () {
                    toggleElementState(drawerId, false, 0);
                });
            }
        });

        // Attach click event listeners to modal buttons
        allModalButtons.forEach(element => {
            const modalId = element.getAttribute('data-modal-target');
            if (modalId) {
                element.addEventListener('click', function () {
                    toggleElementState(modalId, true, 200);
                });
            }
        });

        // Attach click event listeners to modal close buttons
        allModalCloseButtons.forEach(element => {
            const modalId = element.getAttribute('data-modal-close');
            if (modalId) {
                element.addEventListener('click', function () {
                    toggleElementState(modalId, false, 200);
                });
            }
        });

        // Attach click event listener to backdrop-overlay
        backDropOverlay?.addEventListener('click', function () {
            if (openDrawerId) {
                toggleElementState(openDrawerId, false, 0);
            }
            if (openModalId) {
                toggleElementState(openModalId, false, 200);
            }
        });
    }

    //Tooltip Plugins
    function initTooltip() {
        const allTooltipButtons = document.querySelectorAll('[data-tooltip]');

        allTooltipButtons.forEach(element => {
            const tooltipContent = element.getAttribute('data-tooltip-content');

            const tippyOptions = {
                content: tooltipContent,
            };

            if (element.getAttribute('data-tooltip-placement'))
                tippyOptions.placement = element.getAttribute('data-tooltip-placement');
            if (element.getAttribute('data-tooltip-content'))
                tippyOptions.content = element.getAttribute('data-tooltip-content');
            if (element.getAttribute('data-tooltip-arrow'))
                tippyOptions.arrow = element.getAttribute('data-tooltip-arrow') === "false" ? false : element.getAttribute('data-tooltip-arrow') === "true" ? true : element.getAttribute('data-tooltip-arrow');
            if (element.getAttribute('data-tooltip-duration'))
                tippyOptions.duration = element.getAttribute('data-tooltip-duration');
            if (element.getAttribute('data-tooltip-animation'))
                tippyOptions.animation = element.getAttribute('data-tooltip-animation');
            if (element.getAttribute('data-tooltip-trigger'))
                tippyOptions.trigger = element.getAttribute('data-tooltip-trigger');
            if (element.getAttribute('data-tooltip-follow-cursor'))
                tippyOptions.followCursor = element.getAttribute('data-tooltip-follow-cursor');
            if (element.getAttribute('data-tooltip-theme'))
                tippyOptions.theme = element.getAttribute('data-tooltip-theme');

            tippy(element, tippyOptions);
        });
    }

    function tabsComponents() {
        // Select all tab containers with the class "nav-tabs"
        document.querySelectorAll(".nav-tabs").forEach(function (tabContainer) {
            // Select each tab item within the tab container
            tabContainer.querySelectorAll('[data-tab-toggle]').forEach(function (tabItem) {
                // Add a click event listener to each tab item
                tabItem.addEventListener("click", function () {
                    var targetTabID = tabItem.getAttribute("data-target"); // Get the target tab ID
                    var tabContents = document.getElementById(targetTabID)?.parentElement.querySelectorAll(".tab-pane");
                    if (tabContents) {
                        var activeTabItem = tabContainer.querySelector("li.active");
                        if (activeTabItem) activeTabItem.classList.remove("active"); // Remove the "active" class from the currently active tab item

                        // Loop through tab content panes and update their classes
                        for (let i = 0; i < tabContents.length; i++) {
                            tabContents[i].classList.add("hidden"); // Hide the tab content
                            tabContents[i].classList.remove("block"); // Remove the block display class
                        }

                        // Add necessary classes to the clicked tab item and its corresponding tab content
                        tabItem.parentElement.classList.add("active");
                        document.getElementById(targetTabID).classList.remove("hidden");
                        document.getElementById(targetTabID).classList.add("block");
                    }
                });
            });
        });
    }

    function collapseComponent() {
        // Select all collapsible sections
        const collapsibleSections = document.querySelectorAll('.collapsible');

        collapsibleSections.forEach(collapsible => {
            const collapsibleHeader = collapsible.querySelector('.collapsible-header');
            const collapsibleContent = collapsible.querySelector('.collapsible-content');

            collapsibleHeader.addEventListener('click', () => {
                collapsibleContent.classList.toggle('hidden');
                collapsibleHeader.classList.toggle('show');
            });
        });
    }

    function init() {
        counter();
        inputSpinComponents();
        initTooltip();
        tabsComponents();
        drawerSetting();
        collapseComponent();
        pluginData();
    }
    init();

})();


var dropdownElem = document.querySelectorAll('.dropdown');
var dropupElem = document.querySelectorAll('.dropup');
var dropStartElem = document.querySelectorAll('.dropstart');
var dropendElem = document.querySelectorAll('.dropend');
var isShowDropMenu = false;
var isMenuInside = false;
// dropdown event
dropdownEvent(dropdownElem, 'bottom-start');
// dropup event
dropdownEvent(dropupElem, 'top-start');
// dropstart event
dropdownEvent(dropStartElem, 'left-start');
// dropend event
dropdownEvent(dropendElem, 'right-start');

function dropdownEvent(elem, place) {
    Array.from(elem).forEach(function (item) {
        item.querySelectorAll(".dropdown-toggle").forEach(function (subitem) {
            subitem.addEventListener("click", function (event) {
                subitem.classList.toggle("show");
                var popper = Popper.createPopper(subitem, item.querySelector(".dropdown-menu"), {
                    placement: place
                });

                if (subitem.classList.contains("show") != true) {
                    item.querySelector(".dropdown-menu").classList.remove("block")
                    item.querySelector(".dropdown-menu").classList.add("hidden")
                } else {
                    dismissDropdownMenu()
                    item.querySelector(".dropdown-menu").classList.add("block")
                    item.querySelector(".dropdown-menu").classList.remove("hidden")
                    if (item.querySelector(".dropdown-menu").classList.contains("block")) {
                        subitem.classList.add("show")
                    } else {
                        subitem.classList.remove("show")
                    }
                    event.stopPropagation();
                }

                isMenuInside = false;
            });
        });
    });
}

function dismissDropdownMenu() {
    Array.from(document.querySelectorAll(".dropdown-menu")).forEach(function (item) {
        item.classList.remove("block")
        item.classList.add("hidden")
    });
    Array.from(document.querySelectorAll(".dropdown-toggle")).forEach(function (item) {
        item.classList.remove("show")
    });
    isShowDropMenu = false;
}

// dropdown form
Array.from(document.querySelectorAll(".dropdown-menu")).forEach(function (item) {
    if (item.querySelectorAll("form")) {
        Array.from(item.querySelectorAll("form")).forEach(function (subitem) {
            subitem.addEventListener("click", function (event) {
                if (!isShowDropMenu) {
                    isShowDropMenu = true;
                }
            })
        });
    }
});

// data-tw-auto-close
Array.from(document.querySelectorAll(".dropdown-toggle")).forEach(function (item) {
    var elem = item.parentElement
    if (item.getAttribute('data-tw-auto-close') == 'outside') {
        elem.querySelector(".dropdown-menu").addEventListener("click", function () {
            if (!isShowDropMenu) {
                isShowDropMenu = true;
            }
        });
    } else if (item.getAttribute('data-tw-auto-close') == 'inside') {
        item.addEventListener("click", function () {
            isShowDropMenu = true;
            isMenuInside = true;
        });
        elem.querySelector(".dropdown-menu").addEventListener("click", function () {
            isShowDropMenu = false;
            isMenuInside = false;
        });
    }
});

window.addEventListener('click', function (e) {
    if (!isShowDropMenu && !isMenuInside) {
        if (!e.target.closest('.dropdown-menu')) {
            dismissDropdownMenu();
        }
    }
    isShowDropMenu = false;
});

//Lucide icons js
lucide.createIcons();

// Get references to all the buttons with the "toggle-button" class
var toggleButtons = document.querySelectorAll('.toggle-button');

// Add a click event listener to each button
toggleButtons.forEach(button => {
    button.addEventListener("click", function () {
        // Toggle the 'inactive' and 'active' classes on the clicked button
        button.classList.toggle("active");
        button.classList.toggle("inactive");
    });
});