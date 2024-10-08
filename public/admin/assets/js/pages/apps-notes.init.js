/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: apps notes list init Js File
*/
const ReadSmore = window.readSmore

// target all read smore elements
const readMores = document.querySelectorAll('.js-read-smore')
// init
ReadSmore(readMores).init()

// filter btn
function setupFilter() {
    window.initFilters();
}


var url = "assets/json/";
var allNotesList = '';
var currentPage = 1;
var itemsPerPage = 8;

var prevButton = document.getElementById('page-prev');
var nextButton = document.getElementById('page-next');

document.addEventListener("DOMContentLoaded", function () {
    var textArea = document.getElementById("textArea");
    // var editorData;

    if (textArea) {
        // Set the height of the textarea
        textArea.style.height = '200px';
    }
});

//notes list by json
var getJSON = function (jsonurl, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url + jsonurl, true);
    xhr.responseType = "json";
    xhr.onload = function () {
        var status = xhr.status;
        if (status === 200) {
            callback(null, xhr.response);
        } else {
            callback(status, xhr.response);
        }
    };
    xhr.send();
};

// get json
getJSON("notes-list.json", function (err, data) {
    if (err !== null) {
    } else {
        allNotesList = data;
        loadNotesData(allNotesList, currentPage);
        setupFilter();
        const elements = document.querySelectorAll('[data-bs-toggle="dropdown"].category-dropdown')

        if (elements.length) {
            setTimeout(function () {
                elements.forEach(element => {
                    element.addEventListener('click', (event) => {
                        const nextClass = event.target.nextElementSibling.classList
                        nextClass.remove("hidden")
                    })
                })
            }, 500);
        }
    }
});



var noteTitleInput = document.getElementById("notesTitleInput");
var categoryInput = document.getElementById("statusSelect");
var textArea = document.getElementById("textArea");


// notes ico list data
function loadNotesData(datas, page) {

    // pageEvent(datas);
    var pages = Math.ceil(datas.length / itemsPerPage);
    if (page < 1) page = 1;
    if (page > pages) page = pages;

    document.querySelector("#notes-list").innerHTML = '';

    if (datas.length > 0) {
        for (var i = (page - 1) * itemsPerPage; i < (page * itemsPerPage) && (i < datas.length); i++) {
            var activeNotes = datas[i].active == true ? "group/item toggle-button active" : "group/item toggle-button";
            document.querySelector("#notes-list").innerHTML += `<div class="card product-item ` + calassCategory(datas[i].category) + `">\
             <div class="flex flex-col h-full card-body">
                        <div>
                            <div class="relative ltr:float-right rtl:float-left dropdown">
                                <button class="flex items-center justify-center w-[30px] h-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="categoryNotes1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="w-3 h-3"></i></button>
                                <ul class="absolute z-50 hidden py-2 mt-1 text-left list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="categoryNotes1">
                                    <li>
                                        <a data-modal-target="overviewNotesModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="eye" class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Overview</span></a>
                                    </li>
                                    <li>
                                        <a data-modal-target="addNotesModal"  data-edit-id="`+ datas[i].id + `" class="edit-item-btn block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="file-edit" class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">ویرایش</span></a>
                                    </li>
                                    <li>
                                        <a data-modal-target="deleteModal" data-remove-id="`+ datas[i].id + `" class="remove-item-btn block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">حذف</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex items-center gap-2 mb-5">
                                <div class="relative dropdown">
                                    <button class="`+ isCategory(datas[i].category) + ` category-dropdown" id="notesAction1" data-bs-toggle="dropdown"  type="button" aria-expanded="false"></button>
                                    <ul class="absolute z-50 hidden py-2 mt-1 text-left list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="notesAction1">
                                        <li>
                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"> شخصی</a>
                                        </li>
                                        <li>
                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">کسب و کار</a>
                                        </li>
                                        <li>
                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">شبکه اجتماعی</a>
                                        </li>
                                        <li>
                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">صفحه اصلی</a>
                                        </li>
                                    </ul>
                                </div>
                                <h5 class="text-16">`+ datas[i].title + `</h5>
                            </div>
                        </div>

                        <div class="js-read-smore" data-read-smore-words="40" data-read-smore-inline="true">
                            <p class="text-slate-500 dark:text-zink-200">`+ datas[i].description + `</p>
                        </div>

                        <div class="flex items-center justify-between gap-3 pt-4 mt-auto">
                            <div class="shrink-0">
                                <a href="#!" class="group/item toggle-button `+ activeNotes +`"><i data-lucide="star" class="w-5 h-5 text-slate-500 dark:text-zink-200 dark:fill-zink-600 fill-slate-200 transition-all duration-150 ease-linear group-[.active]/item:text-yellow-500 dark:group-[.active]/item:text-yellow-500 group-[.active]/item:fill-yellow-200 dark:group-[.active]/item:fill-yellow-500/50 group-hover/item:text-yellow-500 dark:group-hover/item:text-yellow-500 group-hover/item:fill-yellow-200 dark:group-hover/item:fill-yellow-500/50"></i></a>
                            </div>
                            <p class="text-slate-500 dark:text-zink-200 shrink-0">`+ datas[i].date + `</p>
                        </div>
                    </div>
                    </div>`
        }
        const dropelem = document.querySelectorAll("#notes-list .dropdown")
        lucide.createIcons();
        collapseComponent()
        dropdownEvent(dropelem, 'bottom-start')
    }
    drawerSetting();
    const readMores = document.querySelectorAll('.js-read-smore')
    ReadSmore(readMores).init()
    editItem();
    removeItem();
    setupFilter();
}

function isCategory(val) {
    switch (val) {
        case "personal":
            return (
                'w-4 h-4 mt-1 border border-dashed rounded-full dropdown-toggle shrink-0 bg-sky-100 border-sky-500 dark:bg-sky-500/20'
            );
        case "business":
            return (
                'w-4 h-4 mt-1 border border-dashed rounded-full dropdown-toggle shrink-0 bg-orange-100 border-orange-500 dark:bg-orange-500/20'
            );
        case "social":
            return (
                'w-4 h-4 mt-1 border border-dashed rounded-full dropdown-toggle shrink-0 bg-purple-100 border-purple-500 dark:bg-purple-500/20'
            );
        case "home":
            return (
                'w-4 h-4 mt-1 border border-dashed rounded-full dropdown-toggle shrink-0 bg-green-100 border-green-500 dark:bg-green-500/20'
            );
    }
}

function calassCategory(val) {
    switch (val) {
        case "personal":
            return (
                'personal'
            );
        case "business":
            return (
                'business'
            );
        case "social":
            return (
                'social'
            );
        case "home":
            return (
                'home'
            );
    }
}

// create-nots 
var forms = document.querySelectorAll('.create-form')
var cnt = 11;
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        var action = document.getElementById("action").value;
        var id = document.getElementById("id").value;
        event.preventDefault();
        if (action == "edit") {
            allNotesList = allNotesList.map(function (item) {
                if (item.id == id) {
                    item.date = createDateInput.value;
                    item.title = noteTitleInput.value;
                    item.category = categoryInput.value;
                    item.description = textArea.value;
                }
                document.getElementById("notesModal-close").click()
                document.getElementById("action").value = "add";
                document.getElementById("addNewNoteLabel").innerHTML = "Add Notes";
                document.getElementById("addNew").innerHTML = "Save";
                loadNotesData(allNotesList, currentPage);
                return item;
            });

        } else {
            
            var errorMsg = document.getElementById("alert-error-msg");
            errorMsg.classList.remove("hidden");
            setTimeout(() => errorMsg.classList.add("hidden"), 2000);
            if (noteTitleInput.value == "") {
                text = "Please enter a note title";
                errorMsg.innerHTML = text;
                return false;
            } else if (categoryInput.value == "") {
                text = "Please select a category";
                errorMsg.innerHTML = text;
                return false;
            }
            document.getElementById("alert-error-msg").classList.add("hidden");
            document.getElementById("notesModal-close").click();

            var dateValue = new Date().toUTCString().slice(5, 16);

            document.querySelector("#notes-list").innerHTML +=
                ` <div class="card product-item ` + calassCategory(categoryInput.value) + `">\
                <div class="flex flex-col h-full card-body">
                    <div>
                        <div class="relative ltr:float-right rtl:float-left dropdown">
                            <button class="flex items-center justify-center w-[30px] h-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="categoryNotes1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="w-3 h-3"></i></button>
                            <ul class="absolute z-50 hidden py-2 mt-1 text-left list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="categoryNotes1">
                                <li>
                                    <a data-modal-target="overviewNotesModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="eye" class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Overview</span></a>
                                </li>
                                <li>
                                    <a data-modal-target="addNotesModal" data-edit-id="`+ cnt + `" class="edit-item-btn  block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="file-edit" class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">ویرایش</span></a>
                                </li>
                                <li>
                                    <a data-modal-target="deleteModal" data-remove-id="`+ cnt + `" class="remove-item-btn block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">حذف</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="flex items-center gap-2 mb-5">
                            <div class="relative dropdown">
                                <button class="`+ isCategory(categoryInput.value) + ` category-dropdown" id="notesAction1" data-bs-toggle="dropdown" type="button" aria-expanded="false"></button>
                                <ul class="absolute z-50 hidden py-2 mt-1 text-left list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="notesAction1">
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"> شخصی</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">کسب و کار</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">شبکه اجتماعی</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">صفحه اصلی</a>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="text-16">`+ noteTitleInput.value + `</h5>
                        </div>
                    </div>

                    <div class="js-read-smore" data-read-smore-words="40" data-read-smore-inline="true">
                        <p class="text-slate-500 dark:text-zink-200">`+ textArea.value + `</p>
                    </div>

                    <div class="flex items-center justify-between gap-3 pt-4 mt-auto">
                        <div class="shrink-0">
                            <a href="#!" class="group/item toggle-button"><i data-lucide="star" class="w-5 h-5 text-slate-500 dark:text-zink-200 dark:fill-zink-600 fill-slate-200 transition-all duration-150 ease-linear group-[.active]/item:text-yellow-500 dark:group-[.active]/item:text-yellow-500 group-[.active]/item:fill-yellow-200 dark:group-[.active]/item:fill-yellow-500/50 group-hover/item:text-yellow-500 dark:group-hover/item:text-yellow-500 group-hover/item:fill-yellow-200 dark:group-hover/item:fill-yellow-500/50"></i></a>
                        </div>
                        <p class="text-slate-500 shrink-0 dark:text-zink-200">`+ dateValue + `</p>
                    </div>
                </div>
            </div>`;

            allNotesList.unshift({
                id: cnt,
                category: categoryInput.value,
                title: noteTitleInput.value,
                description: textArea.value,
                date: dateValue,
            });
            cnt++;
            loadNotesData(allNotesList, currentPage);
            return true;
        }
    });

});

// editItem
function editItem() {
    var getEditid = 0;
    var dateValue = new Date().toUTCString().slice(5, 16);
    Array.from(document.querySelectorAll(".edit-item-btn")).forEach(function (elem) {
        elem.addEventListener('click', function (event) {
            getEditid = elem.getAttribute('data-edit-id');
            allNotesList = allNotesList.map(function (item) {
                if (item.id == getEditid) {
                    // editList = true;
                    document.getElementById("addNewNoteLabel").innerHTML = "Edit Notes";
                    document.getElementById("notesTitleInput").value = item.title;
                    setTimeout(() => {
                        document.getElementById("statusSelect").value = item.category;
                    }, 1000)
                    document.getElementById("createDateInput").value = item.date;
                    document.getElementById("textArea").value = item.description;
                    document.getElementById("addNew").innerHTML = "Update";
                    document.getElementById("action").value = "edit";
                    document.getElementById("id").value = getEditid;
                }
                return item;
            });
        });
    });
};


// removeItem
function removeItem() {
    var getid = 0;
    Array.from(document.querySelectorAll(".remove-item-btn")).forEach(function (item) {
        item.addEventListener('click', function (event) {
            document.getElementById("remove-notes").addEventListener("click", function () {
                getid = item.getAttribute('data-remove-id');
                function arrayRemove(arr, value) {

                    return arr.filter(function (ele) {
                        return ele.id != value;
                    });
                }
                var filtered = arrayRemove(allNotesList, getid);
                allNotesList = filtered;
                document.getElementById("close-removeNotesModal").click();
                loadNotesData(allNotesList, 1);
            });
        });
    });
}