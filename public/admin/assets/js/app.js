
document.addEventListener('livewire:navigated', () => {

// const { document } = require("postcss");
var navbarMenuHTML = document.querySelector(".app-menu").innerHTML;
var moreMenuWidth = 150;
let scrollbarElement = '';
var default_lang = "fa"; // set Default Language
var language = localStorage.getItem("language") ? localStorage.getItem("language") : default_lang;

function initLanguage() {
    // Set new language
    (language === null) ? setLanguage(default_lang) : setLanguage(language);
    var languages = document.getElementsByClassName("language");
    languages && Array.from(languages).forEach(function (dropdown) {
        dropdown.addEventListener("click", function (event) {
            setLanguage(dropdown.getAttribute("data-lang"));
        });
    });
}

function setLanguage(lang) {
    if (document.getElementById("header-lang-img")) {
        if (lang == "fa") {
            document.getElementById("header-lang-img").src = "admin/assets/images/flags/20/ir.svg";
        } else if (lang == "en") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/us.svg";
        }  else if (lang == "sp") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/es.svg";
        } else if (lang == "gr") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/de.svg";
        } else if (lang == "it") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/it.svg";
        } else if (lang == "ru") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/ru.svg";
        } else if (lang == "ch") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/china.svg";
        } else if (lang == "fr") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/fr.svg";
        } else if (lang == "ar") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/ae.svg";
        } else if (lang == "jp") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/jp.svg";
        } else if (lang == "ar") {
            document.getElementById("header-lang-img").src = "assets/images/flags/20/ae.svg";
        }
        localStorage.setItem("language", lang);
        language = localStorage.getItem("language");
        getLanguage();
    }
}

// Multi language setting
function getLanguage() {
    language == null ? setLanguage(default_lang) : false;
    var request = new XMLHttpRequest();
    // Instantiating the request object
    request.open("GET", "admin/assets/lang/" + language + ".json");
    // Defining event listener for readystatechange event
    request.onreadystatechange = function () {
        // Check if the request is compete and was successful
        if (this.readyState === 4 && this.status === 200) {
            var data = JSON.parse(this.responseText);
            Object.keys(data).forEach(function (key) {
                var elements = document.querySelectorAll("[data-key='" + key + "']");
                Array.from(elements).forEach(function (elem) {
                    elem.textContent = data[key];
                });
            });
        }
    };
    // Sending the request to the server
    request.send();
}

function updateHorizontalMenus() {
    const navbarMenu = document.querySelector(".app-menu");
    const dataLayout = document.documentElement.getAttribute("data-layout");
    if (navbarMenu) {
        navbarMenu.innerHTML = navbarMenuHTML;
        if (dataLayout != "vertical")
            document.documentElement.setAttribute("data-sidebar-size", "lg");
        else
            document.documentElement.setAttribute("data-sidebar-size", sessionStorage.getItem("data-sidebar-size"));
    }
    const navbarNav = document.querySelector(".navbar-header");
    // count width of horizontal menu
    const fullWidthOfMenu = navbarNav.clientWidth - moreMenuWidth;
    const extraMenuName = "بیشتر";
    const menuData = document.querySelectorAll("ul#navbar-nav > li");
    let newMenus = "";
    let splitItem = "";
    let menusWidth = 0;

    Array.prototype.forEach.call(menuData, function (item, index) {
        menusWidth += item.offsetWidth;
        if (menusWidth > fullWidthOfMenu && fullWidthOfMenu != 0 && dataLayout && dataLayout !== "vertical" && window.innerWidth > 767) {
            newMenus += item.outerHTML;
            item.remove();
        } else {
            splitItem = item;
        }

        if (index + 1 === menuData.length) {
            if (splitItem.insertAdjacentHTML && newMenus) {
                splitItem.insertAdjacentHTML(
                    "afterend",
                    `<li class="relative group-data-[layout=horizontal]:shrink-0 group/sm more-menu">\
                            <a class="relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-150 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0relative dropdown-button flex items-center ltr:pl-3 rtl:pr-3 ltr:pr-5 rtl:pl-5 mx-3 my-1 group/menu-link text-vertical-menu-item-font-size font-normal transition-all duration-150 ease-linear rounded-md py-2.5 text-vertical-menu-item hover:text-vertical-menu-item-hover hover:bg-vertical-menu-item-bg-hover [&.active]:text-vertical-menu-item-active [&.active]:bg-vertical-menu-item-bg-active group-data-[sidebar=dark]:text-vertical-menu-item-dark group-data-[sidebar=dark]:hover:text-vertical-menu-item-hover-dark group-data-[sidebar=dark]:dark:hover:text-custom-500 group-data-[layout=horizontal]:dark:hover:text-custom-500 group-data-[sidebar=dark]:hover:bg-vertical-menu-item-bg-hover-dark group-data-[sidebar=dark]:dark:hover:bg-zink-600 group-data-[sidebar=dark]:[&.active]:text-vertical-menu-item-active-dark group-data-[sidebar=dark]:[&.active]:bg-vertical-menu-item-bg-active-dark group-data-[sidebar=brand]:text-vertical-menu-item-brand group-data-[sidebar=brand]:hover:text-vertical-menu-item-hover-brand group-data-[sidebar=brand]:hover:bg-vertical-menu-item-bg-hover-brand group-data-[sidebar=brand]:[&.active]:bg-vertical-menu-item-bg-active-brand group-data-[sidebar=brand]:[&.active]:text-vertical-menu-item-active-brand group-data-[sidebar=modern]:text-vertical-menu-item-modern group-data-[sidebar=modern]:hover:bg-vertical-menu-item-bg-hover-modern group-data-[sidebar=modern]:hover:text-vertical-menu-item-hover-modern group-data-[sidebar=modern]:[&.active]:bg-vertical-menu-item-bg-active-modern group-data-[sidebar=modern]:[&.active]:text-vertical-menu-item-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:text-center group-data-[sidebar-size=sm]:group-hover/sm:w-[calc(theme('spacing.vertical-menu-sm')_*_3.63)] group-data-[sidebar-size=sm]:group-hover/sm:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:group-hover/sm:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:group-hover/sm:bg-vertical-menu-modern group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:group-hover/sm:bg-vertical-menu-brand group-data-[sidebar-size=sm]:my-0 group-data-[sidebar-size=sm]:rounded-b-none group-data-[layout=horizontal]:m-0 group-data-[layout=horizontal]:ltr:pr-8 group-data-[layout=horizontal]:rtl:pl-8 group-data-[layout=horizontal]:hover:bg-transparent group-data-[layout=horizontal]:[&.active]:bg-transparent [&.dropdown-button]:before:absolute [&.dropdown-button]:[&.show]:before:content-['\ea4e'] [&.dropdown-button]:before:content-['\ea6e'] [&.dropdown-button]:before:font-remix ltr:[&.dropdown-button]:before:right-2 rtl:[&.dropdown-button]:before:left-2 [&.dropdown-button]:before:text-16 group-data-[sidebar-size=sm]:[&.dropdown-button]:before:hidden group-data-[sidebar-size=md]:[&.dropdown-button]:before:hidden group-data-[sidebar=dark]:dark:text-zink-200 group-data-[layout=horizontal]:dark:text-zink-200 group-data-[sidebar=dark]:[&.active]:dark:bg-zink-600 group-data-[layout=horizontal]:dark:[&.active]:text-custom-500 rtl:[&.dropdown-button]:before:rotate-180 group-data-[layout=horizontal]:[&.dropdown-button]:before:rotate-90 group-data-[layout=horizontal]:[&.dropdown-button]:[&.show]:before:rotate-0 rtl:[&.dropdown-button]:[&.show]:before:rotate-0" href="#!">\
                                <span class="min-w-[1.75rem] group-data-[sidebar-size=sm]:h-[1.75rem] inline-block text-start text-[16px] group-data-[sidebar-size=md]:block"><i data-lucide="network" class="h-4 group-data-[sidebar-size=sm]:h-5 group-data-[sidebar-size=sm]:w-5 transition group-hover/menu-link:animate-icons fill-slate-100 group-hover/menu-link:fill-blue-200 group-data-[sidebar=dark]:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:dark:fill-zink-600 group-data-[layout=horizontal]:dark:fill-zink-600 group-data-[sidebar=brand]:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:fill-vertical-menu-item-bg-active-modern group-data-[sidebar=dark]:group-hover/menu-link:fill-vertical-menu-item-bg-active-dark group-data-[sidebar=dark]:group-hover/menu-link:dark:fill-custom-500/20 group-data-[layout=horizontal]:dark:group-hover/menu-link:fill-custom-500/20 group-data-[sidebar=brand]:group-hover/menu-link:fill-vertical-menu-item-bg-active-brand group-data-[sidebar=modern]:group-hover/menu-link:fill-vertical-menu-item-bg-active-modern group-data-[sidebar-size=md]:block group-data-[sidebar-size=md]:mx-auto group-data-[sidebar-size=md]:mb-2"></i></span> <span class="group-data-[sidebar-size=sm]:pl-10 align-middle group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:hidden" data-key="t-more">` + extraMenuName + `</span>
                            </a>
                            <div class="extra-menu dropdown-content group-data-[sidebar-size=sm]:left-vertical-menu-sm group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_*_2.8)] group-data-[sidebar-size=sm]:absolute group-data-[sidebar-size=sm]:rounded-b-sm bg-vertical-menu group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=modern]:bg-transparent group-data-[layout=horizontal]:md:absolute group-data-[layout=horizontal]:top-full group-data-[layout=horizontal]:md:w-44 group-data-[layout=horizontal]:py-2 group-data-[layout=horizontal]:rounded-b-md group-data-[layout=horizontal]:md:shadow-lg group-data-[layout=horizontal]:md:shadow-slate-500/10 group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:dark:md:shadow-zink-600/20 hidden group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:rounded-br-md group-data-[sidebar-size=sm]:shadow-lg group-data-[sidebar-size=sm]:shadow-slate-700/10 group-data-[sidebar-size=sm]:group-hover/sm:block group-data-[sidebar-size=sm]:rounded-br-md">
                            <ul class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 group-data-[sidebar-size=sm]:ltr:pl-0 group-data-[sidebar-size=sm]:rtl:pr-0 group-data-[sidebar-size=sm]:py-2 group-data-[layout=horizontal]:ltr:pl-0 group-data-[layout=horizontal]:rtl:pr-0">
                                <ul class="ltr:pl-[1.75rem] rtl:pr-[1.75rem] group-data-[sidebar-size=md]:ltr:pl-0 group-data-[sidebar-size=md]:rtl:pr-0 group-data-[sidebar-size=sm]:ltr:pl-0 group-data-[sidebar-size=sm]:rtl:pr-0 group-data-[sidebar-size=sm]:py-2 group-data-[layout=horizontal]:ltr:pl-0 group-data-[layout=horizontal]:rtl:pr-0">
                                    <!-- Add your list items here -->` + newMenus + `
                                </ul>
                            </div>
                        </li>`
                );
            }
        }
        lucide.createIcons();
    });

    applyScrollbarLogic();
    // menuPosSetOnClickNHover();
    initActiveMenu();
    handleDropdownMenu();
    setTimeout(() => {
        navbarMenu.classList.remove("group-data-[layout=horizontal]:opacity-0");
    }, 500);
    if (dataLayout != "vertical")
        document.documentElement.removeAttribute("data-sidebar-size");
}

// custom sidebar menu collapse

function handleDropdownMenu() {
    const dropdownToggleButtons = document.querySelector("#scrollbar")?.querySelectorAll('.dropdown-button');
    dropdownToggleButtons.forEach((button, index) => {
        const content = button.nextElementSibling;
        button.addEventListener('click', () => {
            if (!content) {
                return;
            }
            setTimeout(() => {
                // get the dropdown menu element
                var dropdownMenu = button;
                const subMenus = (dropdownMenu.nextElementSibling) ? dropdownMenu.nextElementSibling : dropdownMenu.parentElement.nextElementSibling;
                if (document.documentElement.getAttribute("data-layout") == "horizontal" && subMenus.closest(".extra-menu") && !subMenus.classList.contains("extra-menu")) {
                    if (dropdownMenu && subMenus) {
                        // get the position and dimensions of the dropdown menu
                        var dropdownOffset = subMenus.getBoundingClientRect();
                        var dropdownWidth = subMenus.offsetWidth;
                        var dropdownHeight = subMenus.offsetHeight;

                        // get the dimensions of the screen
                        var screenWidth = window.innerWidth;
                        var screenHeight = window.innerHeight;

                        // calculate the maximum x and y coordinates of the dropdown menu
                        var maxDropdownX = dropdownOffset.left + dropdownWidth;
                        var maxDropdownY = dropdownOffset.top + dropdownHeight;

                        // check if the dropdown menu goes outside the screen
                        var isDropdownOffScreen = (maxDropdownX > screenWidth) || (maxDropdownY > screenHeight);

                            if (isDropdownOffScreen) {
                                if (subMenus.classList.contains("group-data-[layout=horizontal]:left-full")) {
                                    subMenus.classList.remove("group-data-[layout=horizontal]:left-full")
                                    subMenus.classList.add("group-data-[layout=horizontal]:right-full")
                                } else {
                                    subMenus.classList.add("group-data-[layout=horizontal]:left-full")
                                    subMenus.classList.remove("group-data-[layout=horizontal]:right-full")
                                }
                            } else {
                                subMenus.classList.add("group-data-[layout=horizontal]:left-full")
                                subMenus.classList.remove("group-data-[layout=horizontal]:right-full")
                            }
                    }
                }
            }, 10);
            removeActiveMenu(content);

            updateParentActive(button);
            content?.classList.toggle('hidden');
            (content?.classList.contains("hidden")) ? button?.classList.remove('show') : button?.classList.add('show');
            content?.classList.toggle('opacity-100');
            const isRightOverflow = content?.getBoundingClientRect()?.right > window.innerWidth;
            if (document.documentElement.getAttribute("data-layout") === "vertical") {
                if (!isRightOverflow) {
                    content.style.right = 'auto';
                    content.style.left = '0';
                } else {
                    content.style.right = '0';
                    content.style.left = 'auto';
                }
            }
        });

        removeActiveMenu(content);
        // get the dropdown menu element
        var dropdownMenu = button;
        const subMenus = (dropdownMenu.nextElementSibling) ? dropdownMenu.nextElementSibling : dropdownMenu.parentElement.nextElementSibling;
        if (subMenus.classList.contains("group-data-[layout=horizontal]:left-full") || subMenus.classList.contains("group-data-[layout=horizontal]:right-full")) {
            if (dropdownMenu && subMenus) {
                // get the position and dimensions of the dropdown menu
                var dropdownOffset = subMenus.getBoundingClientRect();
                var dropdownWidth = subMenus.offsetWidth;
                var dropdownHeight = subMenus.offsetHeight;

                // get the dimensions of the screen
                var screenWidth = window.innerWidth;
                var screenHeight = window.innerHeight;

                // calculate the maximum x and y coordinates of the dropdown menu
                var maxDropdownX = dropdownOffset.left + dropdownWidth;
                var maxDropdownY = dropdownOffset.top + dropdownHeight;

                // check if the dropdown menu goes outside the screen
                var isDropdownOffScreen = (maxDropdownX > screenWidth) || (maxDropdownY > screenHeight);
                if (isDropdownOffScreen) {
                    if (subMenus.classList.contains("group-data-[layout=horizontal]:left-full")) {
                        subMenus.classList.remove("group-data-[layout=horizontal]:left-full")
                        subMenus.classList.add("group-data-[layout=horizontal]:right-full")
                    }
                } else if (subMenus.classList.contains("group-data-[layout=horizontal]:right-full")) {
                    subMenus.classList.add("group-data-[layout=horizontal]:left-full")
                    subMenus.classList.remove("group-data-[layout=horizontal]:right-full")
                }
            }
        }
    });
}

function removeActiveMenu(content) {
    document.querySelector("#scrollbar")?.querySelectorAll('.dropdown-button.show').forEach((aTag) => {
        if (!Object.is(aTag?.nextElementSibling, content)) {
            aTag?.classList.remove('show');
            aTag?.nextElementSibling?.classList.add('opacity-100');
            aTag?.nextElementSibling?.classList.add('hidden');
        }
    });
}
function updateParentActive(button) {
    if (button?.closest(".dropdown-content")) {
        button.closest(".dropdown-content").classList.remove("hidden");
        button.closest(".dropdown-content").classList.remove('opacity-100');
        button.closest(".dropdown-content").previousElementSibling?.classList.add("show");
        updateParentActive(button.closest(".dropdown-content").previousElementSibling)
    }
}

function toggleHamburgerMenu() {
    var windowSize = document.documentElement.clientWidth;
    var verticalOverlay = document.getElementById("sidebar-overlay");

    if (windowSize > 768)
        document.querySelector(".hamburger-icon").classList.toggle("open");

    //For collapse vertical menu
    if (document.documentElement.getAttribute("data-layout") === "vertical") {
        if (windowSize <= 1025 && windowSize >= 768) {
            document.documentElement.getAttribute("data-sidebar-size") == "sm" ?
                document.documentElement.setAttribute("data-sidebar-size", "lg") :
                document.documentElement.setAttribute("data-sidebar-size", "sm");
        } else if (windowSize > 1025) {
            document.documentElement.getAttribute("data-sidebar-size") == sessionStorage.getItem("data-sidebar-size") ?
                document.documentElement.setAttribute("data-sidebar-size", sessionStorage.getItem("data-sidebar-size") == 'sm' ? 'lg' : 'sm') :
                document.documentElement.setAttribute("data-sidebar-size", sessionStorage.getItem("data-sidebar-size"));
        } else if (windowSize < 768) {
            // document.getElementById("sidebar-overlay").classList.remove("hidden")
            document.body.classList.add("overflow-hidden");
            if (verticalOverlay.classList.contains("hidden")) {
                verticalOverlay.classList.remove("hidden");
                document.querySelector(".app-menu").classList.remove("hidden");
            }
            document.documentElement.setAttribute("data-sidebar-size", "lg");
        }
        applyScrollbarLogic();
        handleDropdownMenu();
    } else {
        if (windowSize < 768) {
            // document.getElementById("sidebar-overlay").classList.remove("hidden")
            document.body.classList.add("overflow-hidden");
            if (verticalOverlay.classList.contains("hidden")) {
                verticalOverlay.classList.remove("hidden");
                document.querySelector(".app-menu").classList.remove("hidden");
            }
        }
    }
}

function hideShowLayoutOptions(dataLayout) {
    if (dataLayout == "horizontal") {
        if (document.getElementById("customizerButton")) {
            document.getElementById("sidebar-size").style.display = "none";
            document.getElementById("sidebar-color").style.display = "none";
            document.getElementById("navigation-type").style.display = "none";
            document.documentElement.removeAttribute("data-sidebar-size");
            document.documentElement.removeAttribute("data-sidebar");
            document.documentElement.removeAttribute("data-navbar");
        }
    } else {
        if (document.getElementById("customizerButton")) {
            document.getElementById("sidebar-size").style.display = "block";
            document.getElementById("sidebar-color").style.display = "block";
            document.getElementById("navigation-type").style.display = "block";
            document.documentElement.setAttribute("data-sidebar-size", sessionStorage.getItem("data-sidebar-size"));
            document.documentElement.setAttribute("data-sidebar", sessionStorage.getItem("data-sidebar"));
            document.documentElement.setAttribute("data-navbar", sessionStorage.getItem("data-navbar"));
        }
    }
}

function isLoadBodyElement() {
    var windowSize = document.documentElement.clientWidth;
    var verticalOverlay = document.getElementById("sidebar-overlay");
    if (verticalOverlay) {
        verticalOverlay.addEventListener("click", function () {
            if (!verticalOverlay.classList.contains("hidden")) {
                if (windowSize <= 768) {
                    document.querySelector(".app-menu").classList.add("hidden");
                    document.body.classList.remove("overflow-hidden");
                } else {
                    document.documentElement.getAttribute("data-sidebar-size") == "sm" ?
                        document.documentElement.setAttribute("data-sidebar-size", "lg") :
                        document.documentElement.setAttribute("data-sidebar-size", "sm");
                }
                verticalOverlay.classList.add("hidden");
            }
        });
    }
}

function windowResizeHover() {
    var windowSize = document.documentElement.clientWidth;
    if (windowSize < 1025 && windowSize >= 768) {
        document.body.classList.remove("overflow-hidden");
        document.querySelector(".app-menu").classList.add("hidden");

        if (sessionStorage.getItem("data-layout") == "vertical") {
            document.documentElement.setAttribute("data-sidebar-size", "sm");
        }

        if (document.querySelector(".hamburger-icon")) {
            document.querySelector(".hamburger-icon").classList.add("open");
        }

        if (sessionStorage.getItem("data-layout") == "horizontal") {
            updateHorizontalMenus();
        }
    } else if (windowSize >= 1025) {
        document.body.classList.remove("overflow-hidden");
        document.querySelector(".app-menu").classList.add("hidden");

        if (sessionStorage.getItem("data-layout") == "vertical") {
            document.documentElement.setAttribute("data-sidebar-size", sessionStorage.getItem("data-sidebar-size"));
        }

        if (sessionStorage.getItem("data-layout") == "horizontal") {
            updateHorizontalMenus();
        }

        if (document.querySelector(".hamburger-icon")) {
            document.querySelector(".hamburger-icon").classList.remove("open");
        }
    } else if (windowSize < 768) {
        if (sessionStorage.getItem("data-layout") != "horizontal") {
            document.documentElement.setAttribute("data-sidebar-size", "lg");
        }
        if (document.querySelector(".hamburger-icon")) {
            document.querySelector(".hamburger-icon").classList.add("open");
        }
    }
}

/*** Set Default value in session storage ***/

function setDefaultAttribute() {
    if (!sessionStorage.getItem("defaultAttribute")) {
        var attributesValue = document.documentElement.attributes;
        var isLayoutAttributes = {};
        Array.from(attributesValue).forEach(function (x) {
            if (x && x.nodeName && x.nodeName != "undefined") {
                var nodeKey = x.nodeName;
                isLayoutAttributes[nodeKey] = x.nodeValue;
                sessionStorage.setItem(nodeKey, x.nodeValue);
            }
        });
        sessionStorage.setItem("defaultAttribute", JSON.stringify(isLayoutAttributes));
        layoutSwitch(isLayoutAttributes);
    } else {
        var isLayoutAttributes = {};
        var attributesToRetrieve = [
            "data-layout",
            "data-skin",
            "data-mode",
            "dir",
            "data-content",
            "data-sidebar-size",
            "data-navbar",
            "data-sidebar",
            "data-topbar",
        ];

        if (sessionStorage.getItem("data-layout") === "horizontal") {
            attributesToRetrieve = attributesToRetrieve.filter(attribute => attribute !== "data-sidebar" && attribute !== "data-sidebar-size");
        }

        attributesToRetrieve.forEach(function (attribute) {
            isLayoutAttributes[attribute] = sessionStorage.getItem(attribute);
        });
        layoutSwitch(isLayoutAttributes);
    }

}
/*** Set value updateRadio id ***/
function updateRadio(radioId) {
    document.getElementById(radioId).checked = true;
}
/*** Set value Attribute ***/
function setAttrItemAndTag(attr, val) {
    document.documentElement.setAttribute(attr, val)
    sessionStorage.setItem(attr, val);
}

/*** remove active class ***/

function removeActiveClass(selector) {
    selector.forEach(function (otherButton) {
        otherButton.classList.remove('active');
    });
}

function lightDarkMode() {
    var lightDarkBtn = document.getElementById('light-dark-mode');
    lightDarkBtn.addEventListener('click', () => {
        if (sessionStorage.getItem("data-mode") === "light") {
            // set attributes
            setAttrItemAndTag("data-mode", "dark");
            setAttrItemAndTag("data-sidebar", "dark");
            setAttrItemAndTag("data-topbar", "dark");

            // set activation
            updateActiveBtn("sidebarColorTwo");
            updateActiveBtn("topbarColorTwo");
            updateActiveBtn("dataModeTwo");
        } else {
            // set attributes
            setAttrItemAndTag("data-mode", "light");
            setAttrItemAndTag("data-sidebar", "light");
            setAttrItemAndTag("data-topbar", "light");

            // set activation
            updateActiveBtn("sidebarColorOne");
            updateActiveBtn("topbarColorOne");
            updateActiveBtn("dataModeOne");
        }
    })
}

function layoutSetting() {
    const dataLayout = document.querySelectorAll('input[name="dataLayout"]');
    dataLayout.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            setAttrItemAndTag("data-layout", this.value);
            updateRadio(this.id)
            updateHorizontalMenus();
            hideShowLayoutOptions(this.value);
        });
    });

    const dataLayoutSkin = document.querySelectorAll('input[name="dataLayoutSkin"]');
    dataLayoutSkin.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            setAttrItemAndTag("data-skin", this.value);
            updateRadio(this.id)
        });
    });

    const dataMode = document.querySelectorAll('button[name="dataMode"]');
    dataMode.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            removeActiveClass(dataMode)
            setAttrItemAndTag("data-mode", this.value);
            if (this.value == "dark") {
                setAttrItemAndTag("data-sidebar", "dark");
                setAttrItemAndTag("data-topbar", "dark");
                updateActiveBtn("sidebarColorTwo");
                updateActiveBtn("topbarColorTwo");
            } else {
                setAttrItemAndTag("data-sidebar", "light");
                setAttrItemAndTag("data-topbar", "light");
                updateActiveBtn("sidebarColorOne");
                updateActiveBtn("topbarColorOne");
            }
            updateActiveBtn(this.id)
        });
    });

    const direction = document.querySelectorAll('button[name="dir"]');
    direction.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            removeActiveClass(direction)
            setAttrItemAndTag("dir", this.value);
            updateActiveBtn(this.id)
        });
    });

    const dataWidth = document.querySelectorAll('button[name="datawidth"]');
    dataWidth.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            removeActiveClass(dataWidth)
            setAttrItemAndTag("data-content", this.value);
            updateActiveBtn(this.id)
        });
    });

    const sidebarSize = document.querySelectorAll('button[name="sidebarSize"]');
    sidebarSize.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            removeActiveClass(sidebarSize)
            setAttrItemAndTag("data-sidebar-size", this.value);
            applyScrollbarLogic();
            updateActiveBtn(this.id);
            // initActiveMenu();
        });
    });

    const navbar = document.querySelectorAll('button[name="navbar"]');
    navbar.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            removeActiveClass(navbar)
            setAttrItemAndTag("data-navbar", this.value);
            updateActiveBtn(this.id)
        });
    });

    const sidebarColor = document.querySelectorAll('button[name="sidebarColor"]');
    sidebarColor.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            removeActiveClass(sidebarColor)
            setAttrItemAndTag("data-sidebar", this.value);
            updateActiveBtn(this.id)
        });
    });

    const topbarColor = document.querySelectorAll('button[name="topbarColor"]');
    topbarColor.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            removeActiveClass(topbarColor)
            setAttrItemAndTag("data-topbar", this.value);
            updateActiveBtn(this.id)
        });
    });

    const customDefaultSwitch = document.getElementById('customDefaultSwitch');
    customDefaultSwitch.addEventListener('change', function (e) {
        if (document.documentElement.getAttribute("data-layout") == "vertical") {
            if (document.getElementById('customDefaultSwitch').checked) {
                document.documentElement.setAttribute("data-sidebar", "dark")
                document.documentElement.setAttribute("data-topbar", "dark")
            } else {
                document.documentElement.setAttribute("data-sidebar", "light")
                document.documentElement.setAttribute("data-topbar", "light")
            }
        } else {
            if (document.getElementById('customDefaultSwitch').checked) {
                document.documentElement.setAttribute("data-topbar", "dark")
            } else {
                document.documentElement.setAttribute("data-topbar", "light")
            }
        }
    });
}
// Update Active
function updateActiveBtn(btnId) {
    const elemName = document.getElementById(btnId).getAttribute("name");
    const allElem = document.querySelector("#customizerButton")?.querySelectorAll('button[name="' + elemName + '"]');
    allElem.forEach(function (elem) {
        elem.classList.remove('active')
    });
    document.getElementById(btnId).classList.add("active");
}

//set full layout
function layoutSwitch(isLayoutAttributes) {
    switch (isLayoutAttributes) {
        case isLayoutAttributes:
            switch (isLayoutAttributes["data-mode"]) {
                case "dark":
                    setAttrItemAndTag("data-mode", "dark");
                    updateActiveBtn("dataModeTwo")
                    break;
                case "light":
                    setAttrItemAndTag("data-mode", "light");
                    updateActiveBtn("dataModeOne")
                    break;
                default:
                    setAttrItemAndTag("data-mode", "light");
                    updateActiveBtn("dataModeTwo")
                    break;
            }
            switch (isLayoutAttributes["data-layout"]) {
                case "horizontal":
                    setAttrItemAndTag("data-layout", "horizontal");
                    updateRadio("layout-two");
                    hideShowLayoutOptions("horizontal");
                    break;
                case "vertical":
                    setAttrItemAndTag("data-layout", "vertical");
                    updateRadio("layout-one");
                    hideShowLayoutOptions("vertical");
                    break;
                default:
                    setAttrItemAndTag("data-layout", "vertical");
                    updateRadio("layout-one");
                    hideShowLayoutOptions("vertical");
                    break;
            }
            switch (isLayoutAttributes["data-skin"]) {
                case "default":
                    setAttrItemAndTag("data-skin", "default");
                    updateRadio("layoutSkitOne")
                    break;
                case "vertical":
                    setAttrItemAndTag("data-skin", "bordered");
                    updateRadio("layoutSkitTwo")
                    break;
                default:
                    setAttrItemAndTag("data-skin", "default");
                    updateRadio("layoutSkitOne")
                    break;
            }
            switch (isLayoutAttributes["dir"]) {
                case "ltr":
                    setAttrItemAndTag("dir", "ltr");
                    updateActiveBtn("diractionOne")
                    break;
                case "rtl":
                    setAttrItemAndTag("dir", "rtl");
                    updateActiveBtn("diractionTwo")
                    break;
                default:
                    setAttrItemAndTag("dir", "ltr");
                    updateActiveBtn("diractionOne")
                    break;
            }
            switch (isLayoutAttributes["data-content"]) {
                case "fluid":
                    setAttrItemAndTag("data-content", "fluid");
                    updateRadio("diractionOne")
                    break;
                case "dark":
                    setAttrItemAndTag("data-content", "boxed");
                    updateActiveBtn("diractionTwo")
                    break;
                default:
                    setAttrItemAndTag("data-content", "fluid");
                    updateActiveBtn("diractionOne")
                    break;
            }
            if(isLayoutAttributes["data-layout"] == "vertical")
            switch (isLayoutAttributes["data-sidebar"]) {
                case "light":
                    setAttrItemAndTag("data-sidebar", "light");
                    updateActiveBtn("sidebarColorOne")
                    break;
                case "dark":
                    setAttrItemAndTag("data-sidebar", "dark");
                    updateActiveBtn("sidebarColorTwo")
                    break;
                case "brand":
                    setAttrItemAndTag("data-sidebar", "brand");
                    updateActiveBtn("sidebarColorThree")
                    break;
                case "modern":
                    setAttrItemAndTag("data-sidebar", "modern");
                    updateActiveBtn("sidebarColorFour")
                    break;
                default:
                    setAttrItemAndTag("data-sidebar", "light");
                    updateActiveBtn("sidebarColorOne")
                    break;
            }
            switch (isLayoutAttributes["data-topbar"]) {
                case "light":
                    setAttrItemAndTag("data-topbar", "light");
                    updateActiveBtn("topbarColorOne")
                    break;
                case "dark":
                    setAttrItemAndTag("data-topbar", "dark");
                    updateActiveBtn("topbarColorTwo")
                    break;
                case "brand":
                    setAttrItemAndTag("data-topbar", "brand");
                    updateActiveBtn("topbarColorThree")
                    break;
                default:
                    setAttrItemAndTag("data-sidebar", "light");
                    updateActiveBtn("sidebarColorOne")
                    break;
            }
            if(isLayoutAttributes["data-layout"] == "vertical")
            switch (isLayoutAttributes["data-sidebar-size"]) {
                case "lg":
                    setAttrItemAndTag("data-sidebar-size", "lg");
                    updateActiveBtn("sidebarSizeOne")
                    break;
                case "md":
                    setAttrItemAndTag("data-sidebar-size", "md");
                    updateActiveBtn("sidebarSizeTwo")
                    break;
                case "sm":
                    setAttrItemAndTag("data-sidebar-size", "sm");
                    updateActiveBtn("sidebarSizeThree")
                    break;
                default:
                    setAttrItemAndTag("data-sidebar-size", "lg");
                    updateActiveBtn("sidebarSizeOne")
                    break;
            }
        default:
            break;
    }
}

function resetLayout() {
    const resetLayoutButton = document.getElementById("reset-layout");
    if (resetLayoutButton) {
        resetLayoutButton.addEventListener("click", function () {
            sessionStorage.clear();
            location.reload();
        });
    }
}

// two-column sidebar active js
function initActiveMenu() {
    var currentPath = location.pathname == "/" ? "index.html" : location.pathname.substring(1);
    currentPath = currentPath.substring(currentPath.lastIndexOf("/") + 1);
    if (currentPath) {
        // navbar-nav
        var a = document.getElementById("navbar-nav").querySelector('[href="' + currentPath + '"]');
        if (a) {
            a.classList.add("active");
            var parentCollapseDiv = a.parentElement.parentElement.parentElement;
            if (parentCollapseDiv) {
                if (document.documentElement.getAttribute("data-layout") == "vertical")
                    parentCollapseDiv.classList.remove("hidden");
                parentCollapseDiv.classList.add("active");
                parentCollapseDiv.previousElementSibling?.classList.add("active");
                parentCollapseDiv.previousElementSibling?.classList.add("show");
                if (document.documentElement.getAttribute("data-layout") == "vertical")
                    parentCollapseDiv.previousElementSibling?.parentElement.parentElement.parentElement?.classList.remove("hidden");
                parentCollapseDiv.previousElementSibling?.parentElement.parentElement.parentElement?.previousElementSibling?.classList.add("active")
            }
        }
    }

    initMenuItemScroll()
}

function applyScrollbarLogic() {
    if (document.documentElement.getAttribute("data-layout") == "vertical") {
        if (document.documentElement.getAttribute("data-sidebar-size") != "sm") {
            scrollbarElement = new SimpleBar(document.getElementById("scrollbar"));
            initActiveMenu();
        } else {
            setTimeout(() => {
                document.querySelector(".app-menu").innerHTML = navbarMenuHTML;
                initActiveMenu();
            }, 500);
        }
    }
}

function initMenuItemScroll() {
    var sidebarMenu = document.getElementById("navbar-nav");
    if (sidebarMenu) {
        var currentPath = location.pathname == "/" ? "index.html" : location.pathname.substring(1);
        currentPath = currentPath.substring(currentPath.lastIndexOf("/") + 1);
        var activeMenu = document.getElementById("navbar-nav").querySelector('[href="' + currentPath + '"]');
        const bodyHeight = (window.innerHeight/2) < 85 ? 85 : window.innerHeight/2;
        var offsetTopRelativeToBody = 0;
        while (activeMenu) {
            offsetTopRelativeToBody += activeMenu.offsetTop;
            activeMenu = activeMenu.offsetParent;
        }

        if (offsetTopRelativeToBody > 300) {
            var verticalMenu = document.getElementsByClassName("app-menu") ? document.getElementsByClassName("app-menu")[0] : "";
            var scrollWrapper = verticalMenu.querySelector(".simplebar-content-wrapper");
            if (verticalMenu && scrollWrapper) {
                var scrollTop = offsetTopRelativeToBody == 330 ? offsetTopRelativeToBody + 85 : offsetTopRelativeToBody - bodyHeight;
                scrollWrapper.scrollTo({
                    top: scrollTop,
                    behavior: "smooth"
                })
            }
        }
    }
}

function windowLoadContent() {
    window.addEventListener("resize", windowResizeHover);

    document.addEventListener("scroll", function () {
        windowScroll();
    });

    window.addEventListener("load", function () {
        initActiveMenu();
        isLoadBodyElement();
    });
    if (document.getElementById("topnav-hamburger-icon")) {
        document.getElementById("topnav-hamburger-icon").addEventListener("click", toggleHamburgerMenu);
    }
}

function initFilters(){
    // filter btn
    const filterMain = document.querySelectorAll(".filter-btns");
    Array.from(filterMain).forEach(function (event) {
        const filterBtns = event?.querySelectorAll("a");
        const productItemsMain = document.getElementById(event?.getAttribute("data-filter-target"));
        const productItems = productItemsMain?.querySelectorAll(".product-item");
        if(productItems)
        Array.from(filterBtns).forEach(function (button) {

            button.addEventListener("click", function (e) {
                // e.preventDefault();

                for (var i = 0; i < filterBtns.length; i++) {
                    filterBtns[i].classList.remove("active");
                }

                this.classList.add("active");

                var filter = e.target.dataset.filter;
                Array.from(productItems).forEach(function (item) {
                    if (filter === "all") {
                        item.style.display = "flex";
                    } else {
                        if (item.classList.contains(filter)) {
                            item.style.display = "flex";
                        } else {
                            item.style.display = "none";
                        }
                    }
                });
            });
        });
    });
}
// Call the function when the page loads
applyScrollbarLogic();

// To continuously run the code, you can set it to run at regular intervals
// For example, to run every 5 seconds, you can use setInterval

function init() {
    setDefaultAttribute();
    layoutSetting();
    windowLoadContent();
    resetLayout();
    updateHorizontalMenus();
    lightDarkMode();
    initLanguage();
    initFilters();
    initMenuItemScroll()
};

init();





//  Window scroll sticky class add
function windowScroll() {
    var navbar = document.getElementById("page-topbar");
    if (navbar) {
        if (document.body.scrollTop >= 50 || document.documentElement.scrollTop >= 50) {
            navbar.classList.add("is-sticky");
        } else {
            navbar.classList.remove("is-sticky");
        }
    }
}
})
