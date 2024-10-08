/*
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Common Plugins Js File
*/




function drawerSetting() {
    const allDrawerButtons = document.querySelectorAll('[data-drawer-target]');
    const allDrawerCloseButtons = document.querySelectorAll('[data-drawer-close]');
    const allModalButtons = document.querySelectorAll('[data-modal-target]');
    const allModalCloseButtons = document.querySelectorAll('[data-modal-close]');
    const bodyElement = document.body;

    let openDrawerId = null;
    let openModalId = null;
    if (document.getElementById("backDropDiv")) {
        var backDropOverlay = document.getElementById("backDropDiv");
    } else {
        var backDropOverlay = document.createElement('div');
        backDropOverlay.className = 'fixed inset-0 bg-gray-900/20 z-[1049] backdrop-overlay hidden';
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

var isShowDropMenu = false;
var isMenuInside = false;

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


