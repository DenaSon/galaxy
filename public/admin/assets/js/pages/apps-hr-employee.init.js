
/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: apps hr employee init js
*/


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

//product list Table
var options = {
    valueNames: [
        'ID',
        'Name',
        'Role',
        'Email',
        'Phone',
        'Country',
        'Experience',
        'JoinDate',
        'Action',
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
    var popper = Popper.createPopper(subitem, item.querySelector("#employeeTable .dropdown-menu"), {
        placement: place
    });

    if (subitem.classList.contains("show") != true) {
        item.querySelector("#employeeTable .dropdown-menu").classList.remove("block")
        item.querySelector("#employeeTable .dropdown-menu").classList.add("hidden")
    } else {
        dismissDropdownMenu()
        item.querySelector("#employeeTable .dropdown-menu").classList.add("block")
        item.querySelector("#employeeTable .dropdown-menu").classList.remove("hidden")
        if (item.querySelector("#employeeTable .dropdown-menu").classList.contains("block")) {
            subitem.classList.add("show")
        } else {
            subitem.classList.remove("show")
        }
        event.stopPropagation();
    }
}
// manage dropdown-menu
function dismissDropdownMenu() {
    Array.from(document.querySelectorAll("#employeeTable .dropdown-menu")).forEach(function (item) {
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

// update Dropdown
function updateDropdown() {
    setTimeout(() => {
        drawerSetting()
        // pagination change
        var allElements = document.querySelectorAll('#employeeTable .dropdown');

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

// json data get
var employeeList = [
    {
        "id": 1,
        "ID": "#TWE1001528",
        "Name": "Willie Torres",
        "img": "assets/images/users/user-1.jpg",
        "Role": "Nuxt JS Developer",
        "Email": "willie@tailwick.com",
        "Phone": "070 3715 3689",
        "Country": "United States",
        "Experience": "3 Year",
        "JoinDate": "05 Feb, 2020"
    },
    {
        "id": 2,
        "ID": "#TWE1001524",
        "Name": "Patricia Garcia",
        "img": "assets/images/users/user-2.jpg",
        "Role": "ASP.Net Developer",
        "Email": "PatriciaJGarcia@tailwick.com",
        "Phone": "077 7317 7572",
        "Country": "Brazil",
        "Experience": "0.5 Year",
        "JoinDate": "12 Aug, 2023"
    },
    {
        "id": 3,
        "ID": "#TWE1001506",
        "Name": "Tonya Johnson",
        "img": "assets/images/users/user-3.jpg",
        "Role": "Project Manager",
        "Email": "TonyaEJohnson@tailwick.com",
        "Phone": "079 2383 2340",
        "Country": "Denmark",
        "Experience": "0 Year",
        "JoinDate": "11 Nov, 2023"
    },
    {
        "id": 4,
        "ID": "#TWE1001502",
        "Name": "Jose White",
        "img": "assets/images/users/user-4.jpg",
        "Role": "React Developer",
        "Email": "ameida@tailwick.com",
        "Phone": "03476 56 14 12",
        "Country": "Philippines",
        "Experience": "1.5 Year",
        "JoinDate": "09 Jun, 2022"
    },
    {
        "id": 5,
        "ID": "#TWE1001503",
        "Name": "Juliette Fecteau",
        "img": "assets/images/users/user-1.jpg",
        "Role": "Sr. Angular Developer",
        "Email": "JulietteFecteau@tailwick.com",
        "Phone": "07231 96 25 88",
        "Country": "Belgium",
        "Experience": "1.9 Year",
        "JoinDate": "11 May, 2021"
    },
    {
        "id": 6,
        "ID": "#TWE1001504",
        "Name": "Jonas Frederiksen",
        "img": "assets/images/users/user-2.jpg",
        "Role": "Team Leader",
        "Email": "jonas@tailwick.com",
        "Phone": "61 53 62 05",
        "Country": "France",
        "Experience": "2.9 Year",
        "JoinDate": "18 Jan, 2019"
    },
    {
        "id": 7,
        "ID": "#TWE1001505",
        "Name": "Kim Broberg",
        "img": "assets/images/users/user-4.jpg",
        "Role": "UI / UX Designer",
        "Email": "KimBroberg@tailwick.com",
        "Phone": "040 382 2096",
        "Country": "Finland",
        "Experience": "1.2 Year",
        "JoinDate": "23 April, 2021"
    },
    {
        "id": 8,
        "ID": "#TWE1001507",
        "Name": "Nancy Reynolds",
        "img": "assets/images/users/user-1.jpg",
        "Role": "Web Designer",
        "Email": "NancyM@tailwick.com",
        "Phone": "0391 13 79 21",
        "Country": "Germany",
        "Experience": "0.9 Year",
        "JoinDate": "01 July, 2022"
    },
    {
        "id": 9,
        "ID": "#TWE1001508",
        "Name": "Thomas Hatfield",
        "img": "assets/images/users/user-2.jpg",
        "Role": "VueJs Developer",
        "Email": "thomas@tailwick.com",
        "Phone": "0911 47 65 49",
        "Country": "Mexico",
        "Experience": "1.6 Year",
        "JoinDate": "08 Aug, 2021"
    },
    {
        "id": 10,
        "ID": "#TWE1001509",
        "Name": "Holly Kavanaugh",
        "img": "assets/images/users/user-3.jpg",
        "Role": "Laravel Developer",
        "Email": "HollyKavanaugh@tailwick.com",
        "Phone": "819 947 5846",
        "Country": "Canada",
        "Experience": "2.3 Year",
        "JoinDate": "23 Dec, 2020"
    },
    {
        "id": 11,
        "ID": "#TWE1001510",
        "Name": "Kim Broberg",
        "img": "assets/images/users/user-4.jpg",
        "Role": "UI / UX Designer",
        "Email": "KimBroberg@tailwick.com",
        "Phone": "040 382 2096",
        "Country": "Finland",
        "Experience": "1.2 Year",
        "JoinDate": "23 April, 2021"
    },
    {
        "id": 12,
        "ID": "#TWE1001511",
        "Name": "Juliette Fecteau",
        "img": "assets/images/users/user-1.jpg",
        "Role": "Sr. Angular Developer",
        "Email": "JulietteFecteau@tailwick.com",
        "Phone": "07231 96 25 88",
        "Country": "Belgium",
        "Experience": "1.9 Year",
        "JoinDate": "11 May, 2021"
    }
]

// employee Table get
var employeeTable = new List("employeeTable", options).on("updated", function (list) {
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

    // length get of list
    var isFirst = list.i == 1;
    var isLast = list.i > list.matchingItems.length - list.page;

    // make the Prev and Nex buttons disabled on first and last pages accordingly
    document.querySelector(".pagination-prev.disabled") ?
        document.querySelector(".pagination-prev.disabled").classList.remove("disabled") : "";
    document.querySelector(".pagination-next.disabled") ?
        document.querySelector(".pagination-next.disabled").classList.remove("disabled") : "";
    // pagination code
    if (isFirst) {
        document.querySelector(".pagination-prev").classList.add("disabled");
    }
    if (isLast) {
        document.querySelector(".pagination-next").classList.add("disabled");
    }
    // show total numbers of records
    const totalEmploysElement = document.querySelector(".total-Employs");
    const totalRecordsElement = employeeTable.listContainer.querySelector(".total-records");
    const showingElement = employeeTable.listContainer.querySelector(".showing");

    if (totalEmploysElement) totalEmploysElement.innerHTML = employeeTable.items.length;
    if (totalRecordsElement) totalRecordsElement.innerHTML = employeeTable.items.length;

    if (showingElement) showingElement.innerHTML = employeeTable.visibleItems.length;
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
    // end pagination code

    //lode js in package
    lucide.createIcons();
    
    collapseComponent();
    refreshCallbacks();
});


// Employee Init list
function loadFileData(datas) {
    document.querySelector("#employeeList").innerHTML = '';
    var cnt = 11;

    // data init
    Array.from(datas).forEach(function (element, index) {
        cnt++;
        employeeTable.add({
            ID: `<a href="#!" class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600">${element.ID}</a>`,
            Name: `<a href="#!" class="flex items-center gap-3">
                <div div class="w-6 h-6 rounded-full shrink-0 bg-slate-100 dark:bg-zink-600">
                    <img src="`+ element.img + `" alt="" class="h-6 rounded-full">
                </div>
                <h6 class="grow">`+ element.Name + `</h6>
            </a>`,
            Role: element.Role,
            Email: element.Email,
            Phone: element.Phone,
            Country: element.Country,
            Experience: element.Experience,
            JoinDate: element.JoinDate,
            Action: `<div class="flex gap-3">
                        <a class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500" href="pages-account.html"><i data-lucide="eye" class="inline-block w-3 h-3"></i> </a>
                        <a href="#!" data-modal-target="addEmployeeModal" class="edit-item-btn flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                        <a href="#!" data-modal-target="deleteModal" class="remove-item-btn flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
                    </div>`,
        });
        //data init end
        employeeTable.sort('id', { order: "desc" });
    });   
    employeeTable.remove("ID", `<a href="#!" class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600">#TWE1001501</a>`);
    
    // call function on package
    lucide.createIcons();
    
    collapseComponent();
    drawerSetting();
    paginationUpdateLink()
}
setTimeout(() => {
    refreshCallbacks();
}, 1000);
// load data function call
loadFileData(employeeList);


//common Pagination Update Link function
function paginationUpdateLink() {

    // list js pagination called
    var pageLinks = document.querySelectorAll('#employeeTable .listjs-pagination .page');
    pageLinks.forEach(function (link) {
        link.addEventListener("click", updateDropdown);
    });
}

var employeeId = document.getElementById("employeeId");
var employeeInput = document.getElementById("employeeInput");
var emailInput = document.getElementById("emailInput");
var phoneNumberInput = document.getElementById("phoneNumberInput");
var locationInput = document.getElementById("locationInput");
var joiningDateInput = document.getElementById("joiningDateInput");
var experienceInput = document.getElementById("experienceInput");
var typeSelect = document.getElementById("typeSelect");
var editList = false;

// refresh call back data reload and get
document.querySelector(".add-employee").addEventListener("click", () => {
    clearFields();
    var idRandom = Math.floor(Math.random() * 100000)
    document.querySelector('#employeeId').value ="#TWE10"+idRandom;
})
function refreshCallbacks() {
    // editBtns
    Array.from(document.querySelectorAll(".edit-item-btn")).forEach(function (elem) {
        elem.addEventListener('click', function (e) {
            e.target.closest("tr").children[0].innerText;
            itemId = e.target.closest("tr").children[0].innerText;
            var itemValues = employeeTable.get({
                id: `<a href="#!" class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600">`+itemId+`</a>`,
            });
            Array.from(itemValues).forEach(function (x) {
                var isId = new DOMParser().parseFromString(x._values.ID, "text/html");
                var name = new DOMParser().parseFromString(x._values.Name, "text/html");
                var Name = name.querySelector('.grow').innerText;
                var selectedId = isId.body.querySelector("a").innerText.trim();
                
                if (selectedId == itemId) {


                    editList = true;
                    employeeId.value = selectedId;
                    employeeInput.value = Name
                    emailInput.value = x._values.Email
                    phoneNumberInput.value = x._values.Phone
                    locationInput.value = x._values.Country
                    joiningDateInput.value = x._values.JoinDate
                    experienceInput.value = x._values.Experience;
                    document.getElementById("addNew").innerHTML = "Update";
                    document.getElementById("addEmployeeLabel").innerHTML = "Edit Employee Data";
                    document.getElementById("create-form").classList.remove("was-validated");
                    document.querySelector("#id").value = selectedId;
                }
            });
        });
    });

    // add & edit modal value change
    document.getElementById("addEmployeeModal").addEventListener("show.bs.modal", function (e) {
        if (e.relatedTarget.classList.contains("edit-item-btn")) {
            document.getElementById("addEmployeeLabel").innerHTML = "Edit Employee";
            document.getElementById("addNew").innerHTML = "Update";
        } else if (e.relatedTarget.classList.contains("addEmployee")) {
            document.getElementById("addEmployeeLabel").innerHTML = "Add Employee";
            document.getElementById("addNew").innerHTML = "Add";
        } else {
            document.getElementById("addEmployeeLabel").innerHTML = "List Customer";
        }
    });

    // removeBtns
    Array.from(document.querySelectorAll(".remove-item-btn")).forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.target.closest("tr").children[0].innerText;
            var removeitemId = e.target.closest("tr").children[0].innerText;
            var itemValues = employeeTable.get({
                id: `<a href="#!" class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600">` + removeitemId + `</a>`,
            });
            Array.from(itemValues).forEach(function (x) {
                var deleteid = new DOMParser().parseFromString(x._values.ID, "text/html");
                var isdeleteid = deleteid.body.querySelector("a").innerText.trim();
                if (isdeleteid == removeitemId) {
                    document.getElementById("delete-record").addEventListener("click", function () {
                        employeeTable.remove("ID", deleteid.body.innerHTML);
                        document.getElementById("deleteRecord-close").click();
                    });
                }
            });
        });
    });

   
}

// tablelist-form
var count = 11;
var itemId ;

// tablelist form submit event
var forms = document.querySelectorAll('.create-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("hidden");
        setTimeout(() => errorMsg.classList.add("hidden"), 2000);
        // Define an array with all the required input fields and their corresponding error messages
        const requiredFields = [
            // { input: employeeId, error: "Please enter a file name." },
            { input: employeeInput, error: "Please enter a item name." },
            { input: emailInput, error: "Please enter a size name." },
            { input: phoneNumberInput, error: "Please enter a phone number." },
            { input: locationInput, error: "Please enter a location." },
            { input: joiningDateInput, error: "Please enter a joining date." },
            { input: experienceInput, error: "Please enter a total experience." },
            { input: typeSelect, error: "Please enter a type select." },
        ];

        let allFieldsValid = true;
        // Check each required input field to see if it has a value
        requiredFields.forEach(function (field) {
            if (allFieldsValid && field.input.value.trim() === "") {
                // The field is empty, so show the error message and mark allFieldsValid as false
                errorMsg.innerHTML = field.error;
                field.input.classList.add("is-invalid");
                allFieldsValid = false;
            } else {
                // The field has a value, so remove the error message and mark the field as valid
                field.input.classList.remove("is-invalid");
            }
        });

        
        // date & time
        if (!editList && allFieldsValid) {
            // add new event
            employeeTable.add({
                id: count,
                ID: `<a href="#!" class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600"> ` + employeeId.value + `</a>`,
                Name: `<a href="#!" class="flex items-center gap-3">
                            <div div class="w-6 h-6 rounded-full shrink-0 bg-slate-100">
                                <img src="assets/images/users/user-dummy-img.jpg" alt="" class="h-6 rounded-full">
                            </div>
                            <h6 class="grow">`+ employeeInput.value + `</h6>
                        </a>`,
                Role: "employee",
                Email: emailInput.value,
                Phone: phoneNumberInput.value,
                Country: locationInput.value,
                Experience: experienceInput.value,
                JoinDate: joiningDateInput.value,
                Action: `<div class="flex gap-3">
                        <a class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500" href="pages-account.html"><i data-lucide="eye" class="inline-block w-3 h-3"></i> </a>
                        <a href="#!" data-modal-target="addEmployeeModal" class="edit-item-btn flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                        <a href="#!" data-modal-target="deleteModal" class="remove-item-btn flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
                    </div>`,
            })
            employeeTable.sort('id', { order: "desc" });
            document.getElementById("alert-error-msg").classList.add("hidden");
            document.getElementById("close-modal").click();
            count++;
            clearFields();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'File name inserted successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
           
        } else if (editList && allFieldsValid) {
           
            var idInput = document.querySelector("#id").value;
            var editValues = employeeTable.get({
                ID: `<a href="#!" class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600">` + idInput + `</a>`,
            });
            Array.from(editValues).forEach(function (x) {
                var isId = new DOMParser().parseFromString(x._values.ID, "text/html");
                var selectedId = isId.body.querySelector("a").innerText;
                if (selectedId == idInput) {
                    x.values({
                        ID: `<a href="#!" class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600">`+ employeeId.value + `</a>`,
                        Name: `<a href="#!" class="flex items-center gap-3">
                            <div div class="w-6 h-6 rounded-full shrink-0 bg-slate-100">
                                <img src="assets/images/users/user-dummy-img.jpg" alt="" class="h-6 rounded-full">
                            </div>
                            <h6 class="grow">`+ employeeInput.value + `</h6>
                        </a>`,
                        Role: "employee",
                        Email: emailInput.value,
                        Phone: phoneNumberInput.value,
                        Country: locationInput.value,
                        Experience: experienceInput.value,
                        JoinDate: joiningDateInput.value,
                        Action: `<div class="flex gap-3">
                        <a class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500" href="pages-account.html"><i data-lucide="eye" class="inline-block w-3 h-3"></i> </a>
                        <a href="#!" data-modal-target="addEmployeeModal" class="edit-item-btn flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                        <a href="#!" data-modal-target="deleteModal" class="remove-item-btn flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
                    </div>`,
                    });
                }
            });
            editList = false;
            document.getElementById("close-modal").click();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'File name updated successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
            clearFields()
          
        }
        
        // call function on package
        lucide.createIcons();
        
        collapseComponent();
        drawerSetting();
        paginationUpdateLink();
        refreshCallbacks();
        return true;
    });

});

// Clear
function clearFields() {
    editList = false;
    employeeInput.value = "";
    emailInput.value = "";
    phoneNumberInput.value = "";
    locationInput.value = "";
    experienceInput.value = "";
    joiningDateInput.value = "";
}

