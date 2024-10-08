/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: apps ecommerce product init Js File
*/
//packge import

//product list Table
var options = {
    valueNames: [
        "product_code",
        "product_name",
        "category",
        "price",
        "stock",
        "revenue",
        "status",
        "action"
    ],
    page: 7,
    pagination: true,
    plugins: [
        ListPagination({
            left: 2,
            right: 2,
        }),
    ],
};

// event Litinor on dropdown 
function eventListenerDropdown1(event, subitem, item, place) {
    subitem.classList.toggle("show");
    var popper = Popper.createPopper(subitem, item.querySelector("#productListTable .dropdown-menu"), {
        placement: place
    });

    if (subitem.classList.contains("show") != true) {
        item.querySelector("#productListTable .dropdown-menu").classList.remove("block")
        item.querySelector("#productListTable .dropdown-menu").classList.add("hidden")
    } else {
        dismissDropdownMenu()
        item.querySelector("#productListTable .dropdown-menu").classList.add("block")
        item.querySelector("#productListTable .dropdown-menu").classList.remove("hidden")
        if (item.querySelector("#productListTable .dropdown-menu").classList.contains("block")) {
            subitem.classList.add("show")
        } else {
            subitem.classList.remove("show")
        }
        event.stopPropagation();
    }
}
// manage dropdown-menu
function dismissDropdownMenu() {
    Array.from(document.querySelectorAll("#productListTable .dropdown-menu")).forEach(function (item) {
        item.classList.remove("block")
        item.classList.add("hidden")
    });
    Array.from(document.querySelectorAll(".dropdown-toggle")).forEach(function (item) {
        item.classList.remove("show")
    });
}
// manage dropdown-menu event removed
function dropdownEvent1(elem, place, isRemove = null) {
    if (isRemove) {
        elem.forEach(function (item) {
            item.removeEventListener('click', eventListenerDropdown1);
        });
    } else {
        Array.from(elem).forEach(function (item) {
            item.querySelectorAll(".dropdown-toggle").forEach(function (subitem) {
                subitem.addEventListener("click", function (event) {
                    eventListenerDropdown1(event, subitem, item, place)
                });
            });
        });
    }
}
function updateDropdown() {

    setTimeout(() => {
        drawerSetting()
        // pagination change 
        var allElements = document.querySelectorAll('#productListTable .dropdown');

        // Filter elements that do not have a click event listener
        var elementsWithoutClickListener = Array.from(allElements).filter(function (element) {
            return !element.onclick;
        });

        if (elementsWithoutClickListener) {
            dropdownEvent1(elementsWithoutClickListener, 'bottom-start', true)
        }
        // end remove listeners

        dropdownEvent1(elementsWithoutClickListener, 'bottom-start')
    }, 250);
}

var productListTable = new List("productListTable", options).on("updated", function (list) {
    // noresult show or hidden
    if (document.getElementsByClassName("noresult") && document.getElementsByClassName("noresult")[0]) {
        list.matchingItems.length == 0 ?
            (document.getElementsByClassName("noresult")[0].style.display = "block") :
            (document.getElementsByClassName("noresult")[0].style.display = "none");

        if (list.matchingItems.length > 0) {
            document.getElementsByClassName("noresult")[0].style.display = "none";
        } else {
            document.getElementsByClassName("noresult")[0].style.display = "block";
        }
    }

    var isFirst = list.i == 1;
    var isLast = list.i > list.matchingItems.length - list.page;
    // make the Prev and Nex buttons disabled on first and last pages accordingly
    document.querySelector(".pagination-prev.disabled") ?
        document.querySelector(".pagination-prev.disabled").classList.remove("disabled") : "";
    document.querySelector(".pagination-next.disabled") ?
        document.querySelector(".pagination-next.disabled").classList.remove("disabled") : "";
    if (isFirst) {
        document.querySelector(".pagination-prev").classList.add("disabled");
    }
    if (isLast) {
        document.querySelector(".pagination-next").classList.add("disabled");
    }
    // show total numbars of racords 
    const totalRecordsElement = productListTable.listContainer.querySelector(".total-records");
    const showingElement = productListTable.listContainer.querySelector(".showing");

    if (totalRecordsElement) totalRecordsElement.innerHTML = productListTable.items.length;
    if (showingElement) showingElement.innerHTML = productListTable.visibleItems.length;
    document.querySelector(".pagination-next").addEventListener("click", function () {
        document.querySelector(".pagination.listjs-pagination") ?
            document.querySelector(".pagination.listjs-pagination").querySelector(".active") && document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling != null ?
                document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click() : "" : "";
    });

    document.querySelector(".pagination-prev").addEventListener("click", function () {
        document.querySelector(".pagination.listjs-pagination") ?
            document.querySelector(".pagination.listjs-pagination").querySelector(".active") && document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling != null ?
                document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click() : "" : "";
    });

    //lode js in packge
    lucide.createIcons();
    collapseComponent()
});

//get status custom class val
function isStatus(val) {
    switch (val) {
        case "Scheduled":
            return (
                'status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent'
            );
        case "Publish":
            return (
                'status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent'
            );
        case "Inactive":
            return (
                'status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent'
            );
    };
};

// json data get request
const xhttp = new XMLHttpRequest();
// load json data
xhttp.onload = function () {
    var json_records = JSON.parse(this.responseText);
    Array.from(json_records).forEach(function (element) {
        productListTable.add({
            product_code: `<a href="#!" class="transition-all duration-150 ease-linear product_code text-custom-500 hover:text-custom-600">${element.product_code}</a>`,
            product_name: `<a href="apps-ecommerce-product-overview.html" class="flex items-center gap-2">
                            <img src="`+ element.img + `" alt="Product images" class="h-6">
                            <h6 class="product_name">`+ element.product_name + `</h6>
                        </a>`,
            category: `<span class="category px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-slate-100 border-slate-200 text-slate-500 dark:bg-slate-500/20 dark:border-slate-500/20 dark:text-zink-200">` + element.category + `</span>`,
            price: element.price,
            stock: element.stock,
            revenue: element.revenue,
            status: `<span class="` + isStatus(element.status) + `">` + element.status + `</span>`,
            action: `<div class="relative dropdown">
                    <button class="flex items-center justify-center w-[30px] h-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="productAction1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="w-3 h-3"></i></button>
                    <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="productAction1">
                        <li>
                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="apps-ecommerce-product-overview.html"><i data-lucide="eye" class="inline-block w-3 h-3 mr-1"></i> <span class="align-middle">Overview</span></a>
                        </li>
                        <li>
                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="apps-ecommerce-product-create.html"><i data-lucide="file-edit" class="inline-block w-3 h-3 mr-1"></i> <span class="align-middle">ویرایش</span></a>
                        </li>
                        <li>
                            <a data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block w-3 h-3 mr-1"></i> <span class="align-middle">حذف</span></a>
                        </li>
                    </ul>
                </div>`,
        });
    });

    //lode js in packge
    lucide.createIcons();
    collapseComponent();
    drawerSetting()

    // onLoad time get all Eement and set dropdown position
    var allElements = document.querySelectorAll('#productListTable .dropdown');

    // Filter elements that do not have a click event listener
    var elementsWithoutClickListener = Array.from(allElements).filter(function (element) {
        return !element.onclick;
    });

    setTimeout(() => {
        dropdownEvent1(elementsWithoutClickListener, 'bottom-start')
    }, 250);
    // list js pagination called
    var pageLinks = document.querySelectorAll('#productListTable .listjs-pagination .page');
    pageLinks.forEach(function (link) {
        link.addEventListener("click", updateDropdown);
    });
}
//jeson data file
xhttp.open("GET", "assets/json/product-list.json");
xhttp.send();