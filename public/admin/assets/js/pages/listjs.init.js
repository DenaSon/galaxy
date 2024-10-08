/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: listjs init js
*/

var checkAll = document.getElementById("checkAll");
if (checkAll) {
    checkAll.addEventListener("click", function () {
        var checkboxes = document.querySelectorAll('.form-check-all input[type="checkbox"]');
        Array.from(checkboxes).forEach(function (checkbox) {
            checkbox.checked = checkAll.checked;
            if (checkbox.checked) {
                checkbox.closest("tr").classList.add("table-active");
            } else {
                checkbox.closest("tr").classList.remove("table-active");
            }
        });
    });
}

var perPage = 5;
var editlist = false;

//Table
var options = {
    valueNames: [
        "id",
        "customer_name",
        "email",
        "date",
        "phone",
        "status",
    ],
    page: perPage,
    pagination: true,
    plugins: [
        ListPagination({
            left: 2,
            right: 2
        })
    ]
};
// Init list
if (document.getElementById("customerList"))
    var customerList = new List("customerList", options).on("updated", function (list) {
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
        // pagignation code
        if (isFirst) {
            document.querySelector(".pagination-prev").classList.add("disabled");
        }
        if (isLast) {
            document.querySelector(".pagination-next").classList.add("disabled");
        }
        // show total numbars of racords
        const totalEmploysElement = document.querySelector(".total-Employs");
        const totalRecordsElement = customerList.listContainer.querySelector(".total-records");
        const showingElement = customerList.listContainer.querySelector(".showing");

        if (totalEmploysElement) totalEmploysElement.innerHTML = customerList.items.length;
        if (totalRecordsElement) totalRecordsElement.innerHTML = customerList.items.length;

        if (showingElement) showingElement.innerHTML = customerList.visibleItems.length;
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
        refreshCallbacks();
    });

const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    var json_records = JSON.parse(this.responseText);
    Array.from(json_records).forEach(raw => {
        customerList.add({
            id: '<a href="javascript:void(0);" class="fw-medium link-primary id">#VZ' + raw.id + "</a>",
            customer_name: raw.customer_name,
            email: raw.email,
            date: raw.date,
            phone: raw.phone,
            status: isStatus(raw.status)
        });
        customerList.sort('id', { order: "desc" });
        refreshCallbacks();
    });
    customerList.remove("id", '<a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a>');
}
xhttp.open("GET", "assets/json/table-customer-list.json");
xhttp.send();

isCount = new DOMParser().parseFromString(
    customerList.items.slice(-1)[0]._values.id,
    "text/html"
);

var isValue = isCount.body.firstElementChild.innerHTML;

var idField = document.getElementById("id-field"),
    customerNameField = document.getElementById("customername-field"),
    emailField = document.getElementById("email-field"),
    dateField = document.getElementById("date-field"),
    phoneField = document.getElementById("phone-field"),
    statusField = document.getElementById("status-field"),
    addBtn = document.getElementById("add-btn"),
    editBtn = document.getElementById("edit-btn"),

    editBtns = document.getElementsByClassName("edit-item-btn");
refreshCallbacks();

//filterContact("All");

function filterContact(isValue) {
    var values_status = isValue;
    customerList.filter(function (data) {
        var statusFilter = false;
        matchData = new DOMParser().parseFromString(
            data.values().status,
            "text/html"
        );
        var status = matchData.body.firstElementChild.innerHTML;
        if (status == "All" || values_status == "All") {
            statusFilter = true;
        } else {
            statusFilter = status == values_status;
        }
        return statusFilter;
    });

    customerList.update();
}

function updateList() {
    var values_status = document.querySelector("input[name=status]:checked").value;
    data = userList.filter(function (item) {
        var statusFilter = false;

        if (values_status == "All") {
            statusFilter = true;
        } else {
            statusFilter = item.values().sts == values_status;
        }
        return statusFilter;
    });
    userList.update();
}

if (document.getElementById("showModal")) {
    document.getElementById("showModal").addEventListener("show.bs.modal", function (e) {
        if (e.relatedTarget.classList.contains("edit-item-btn")) {
            document.getElementById("exampleModalLabel").innerHTML = "Edit Customer";
            document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
            document.getElementById("add-btn").innerHTML = "Update";
        } else if (e.relatedTarget.classList.contains("add-btn")) {
            document.getElementById("exampleModalLabel").innerHTML = "Add Customer";
            document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
            document.getElementById("add-btn").innerHTML = "Add Customer";
        } else {
            document.getElementById("exampleModalLabel").innerHTML = "List Customer";
            document.getElementById("showModal").querySelector(".modal-footer").style.display = "none";
        }
    });
    ischeckboxcheck();

    document.getElementById("showModal").addEventListener("hidden.bs.modal", function () {
        clearFields();
    });
}
document.querySelector("#customerList").addEventListener("click", function () {
    ischeckboxcheck();
});

var table = document.getElementById("customerTable");
// save all tr
var tr = table.getElementsByTagName("tr");
var trlist = table.querySelectorAll(".list tr");

var count = 11;

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.tablelist-form')

// Loop over them and prevent submission
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();
            if (
                customerNameField.value !== "" &&
                emailField.value !== "" &&
                dateField.value !== "" &&
                phoneField.value !== "" && !editlist
            ) {
                customerList.add({
                    id: '<a href="javascript:void(0);" class="fw-medium link-primary id">#VZ' + count + "</a>",
                    customer_name: customerNameField.value,
                    email: emailField.value,
                    date: dateField.value,
                    phone: phoneField.value,
                    status: isStatus(statusField.value),
                });
                customerList.sort('id', { order: "desc" });
                refreshCallbacks();
                clearFields();
                filterContact("All");
                count++;
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Customer inserted successfully!',
                    showConfirmButton: false,
                    timer: 2000,
                    showCloseButton: true
                });
            } else if (
                customerNameField.value !== "" &&
                emailField.value !== "" &&
                dateField.value !== "" &&
                phoneField.value !== "" && editlist
            ) {
                var editValues = customerList.get({
                    id: idField.value,
                });
                Array.from(editValues).forEach(function (x) {
                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;
                    if (selectedid == itemId) {
                        x.values({
                            id: '<a href="javascript:void(0);" class="fw-medium link-primary id">' + idField.value + "</a>",
                            customer_name: customerNameField.value,
                            email: emailField.value,
                            date: dateField.value,
                            phone: phoneField.value,
                            status: isStatus(statusField.value),
                        });
                    }
                });
                // document.getElementById("close-modal").click();
                clearFields();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Customer updated Successfully!',
                    showConfirmButton: false,
                    timer: 2000,
                    showCloseButton: true
                });
            }
        }

    }, false)
})

var statusVal = new Choices(statusField);

function isStatus(val) {
    switch (val) {
        case "Active":
            return (
                '<span class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent">' +
                val +
                "</span>"
            );
        case "Block":
            return (
                '<span class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent">' +
                val +
                "</span>"
            );
    }
}

function ischeckboxcheck() {
    Array.from(document.getElementsByName("checkAll")).forEach(function (x) {
        x.addEventListener("click", function (e) {
            if (e.target.checked) {
                e.target.closest("tr").classList.add("table-active");
            } else {
                e.target.closest("tr").classList.remove("table-active");
            }
        });
    });
}

function refreshCallbacks() {
    var removeBtns = document.getElementsByClassName("remove-item-btn");
    if (removeBtns)
        Array.from(removeBtns).forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.target.closest("tr").children[1].innerText;
                itemId = e.target.closest("tr").children[1].innerText;
                var itemValues = customerList.get({
                    id: itemId,
                });

                Array.from(itemValues).forEach(function (x) {
                    deleteid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var isElem = deleteid.body.firstElementChild;
                    var isdeleteid = deleteid.body.firstElementChild.innerHTML;
                    if (isdeleteid == itemId) {
                        document.getElementById("delete-record").addEventListener("click", function () {
                            customerList.remove("id", isElem.outerHTML);
                        });
                    }
                });
            });
        });
    if (editBtns)
        Array.from(editBtns).forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.target.closest("tr").children[1].innerText;
                itemId = e.target.closest("tr").children[1].innerText;
                var itemValues = customerList.get({
                    id: itemId,
                });

                Array.from(itemValues).forEach(function (x) {
                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;
                    if (selectedid == itemId) {
                        editlist = true;
                        idField.value = selectedid;
                        customerNameField.value = x._values.customer_name;
                        emailField.value = x._values.email;
                        dateField.value = x._values.date;
                        phoneField.value = x._values.phone;

                        if (statusVal) statusVal.destroy();
                        statusVal = new Choices(statusField);
                        val = new DOMParser().parseFromString(x._values.status, "text/html");
                        var statusSelec = val.body.firstElementChild.innerHTML;
                        statusVal.setChoiceByValue(statusSelec);

                        flatpickr("#date-field", {
                            // enableTime: true,
                            dateFormat: "d M, Y",
                            defaultDate: x._values.date,
                        });
                    }
                });
            });
        });
}

function clearFields() {
    customerNameField.value = "";
    emailField.value = "";
    dateField.value = "";
    phoneField.value = "";
}
function deleteMultiple() {
    var ids_array = [];
    var items = document.getElementsByName('chk_child');
    Array.from(items).forEach(function (ele) {
        if (ele.checked == true) {
            var trNode = ele.parentNode.parentNode;
            var id = trNode.querySelector('.id a').innerHTML;
            ids_array.push(id);
        }
    });
    
    if (ids_array.length > 0) {
        if (confirm('Are you sure you want to delete this?')) {
            ids_array.forEach(function (id) {
                // Assuming customerList.remove is a valid method to remove a single record
                customerList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary id">${id}</a>`);
            });
            document.getElementById('checkAll').checked = false;
        } else {
            return false;
        }
    } else {
        Swal.fire({
            title: 'Please select at least one checkbox',
            customClass: {
                confirmButton: 'text-white btn bg-sky-500 border-sky-500 hover:text-white hover:bg-sky-600 hover:border-sky-600 focus:text-white focus:bg-sky-600 focus:border-sky-600 focus:ring focus:ring-sky-100 active:text-white active:bg-sky-600 active:border-sky-600 active:ring active:ring-sky-100 dark:ring-sky-400/20',
            },
            buttonsStyling: false,
            showCloseButton: true
        });
    }
}