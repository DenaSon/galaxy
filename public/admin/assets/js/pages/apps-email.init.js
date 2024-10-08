/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: apps email init js
*/

// create input
var ckClassicEditor = document.querySelectorAll(".ckeditor-classic")
if (ckClassicEditor) {
    Array.from(ckClassicEditor).forEach(function () {
        ClassicEditor
            .create(document.querySelector('.ckeditor-classic'))
            .catch(function (error) {
                console.error(error);
            });
    });
}

var url = "assets/json/";
var allmaillist = '';
// showing loading

//mail list by json
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

// load mail data
function loadMailData(datas) {
    document.querySelector("#mail-list").innerHTML = '';

    Array.from(datas).forEach(function (mailData, index) {

        var checkReaded = mailData.unread == true ? "" : "unread";
        var checkStarred = mailData.starred ? "active" : "";

        document.querySelector("#mail-list").innerHTML += `
        <tr class="relative before:absolute ltr:before:left-0 rtl:before:right-0 before:border [&.checked]:before:border-custom-500 before:inset-y-0 before:border-transparent `+ checkReaded + ` group/mail mail-card">
        <td class="px-3.5 py-2.5 border-y border-transparent first:pl-0 last:pr-0 w-20">
            <div class="flex items-center gap-3 ltr:pl-2 rtl:pr-2">
                <input type="checkbox" id="checkbox`+ mailData.id + `" value="` + mailData.id + `" class="itemCheckbox w-4 h-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" >
                <a href="#!" class="transition-all duration-200 ease-linear text-slate-500 hover:text-yellow-500 dark:text-zink-200 dark:hover:text-yellow-500 `+ checkStarred + `"><i data-lucide="star" class="w-4 h-4"></i></a>
                <a href="#!" class="transition-all duration-200 ease-linear text-slate-500 hover:text-yellow-500 dark:text-zink-200 dark:hover:text-yellow-500"><i data-lucide="step-forward" class="w-4 h-4"></i></a>
            </div>
        </td>
        <td class="relative px-3.5 py-2.5 border-y border-transparent first:pl-0 last:pr-0 text-slate-500 group-[.unread]/mail:text-slate-800 dark:text-zink-200 dark:group-[.unread]/mail:text-zink-50  mailBox">
            <div class="grid items-center grid-cols-12 gap-3">
                <div class="col-span-4 lg:col-span-2">
                    <a href="#!" class="block truncate before:inset-0 before:absolute">`+ mailData.name + `</a>
                </div>
                <div class="col-span-8 lg:col-span-10">
                    <p class="truncate">` + mailData.subject + `</p>
                </div>
            </div>
        </td>
        <td class="px-3.5 py-2.5 border-y border-transparent first:pl-0 last:pr-0 text-end w-20 text-slate-500 group-[.unread]/mail:text-slate-800 dark:text-zink-200 dark:group-[.unread]/mail:text-zink-50">`+ mailData.time + `</td>
    </tr>`
        lucide.createIcons();
        checkBoxAll();
        emailDetailShow()

    });

}

// get json
getJSON("mail-list.init.json", function (err, data) {
    if (err !== null) {
        console.log("Something went wrong: " + err);
    } else {
        allmaillist = data;

        loadMailData(allmaillist);
    }
});

// emailDetailShow
function emailDetailShow() {
    // remove unread class
    Array.from(document.querySelectorAll("#mail-list tr td")).forEach(function (item) {
        item.addEventListener("click", function (event) {
            Array.from(document.querySelectorAll("#mail-list tr.unread")).forEach(function (element) {
                if (element.classList.contains("unread")) {
                    event.target.closest('tr').classList.remove("unread");
                }
            });
        });
    });

    // remove close chat
    var emailMenuSidebar = document.getElementById('emailOverview');
    Array.from(document.querySelectorAll("#closeChatRightSidebar")).forEach(function (item) {
        item.addEventListener("click", function () {
            document.querySelector('#emailList').classList.remove("hidden");
            emailMenuSidebar.classList.add("hidden");
        });
    });

    // mail list click event
    let i = 1;
    Array.from(document.querySelectorAll("td.mailBox")).forEach(function (item) {
        item.addEventListener("click", function (e) {
            emailMenuSidebar.classList.remove("hidden");
            document.querySelector('#emailList').classList.add("hidden");
        });
    });

    // Get all elements with the class 'mailbox'
    var mailboxElements = document.querySelectorAll('#mail-list td.mailbox');

    // Iterate over each 'mailbox' element and add a click event
    mailboxElements.forEach(function (mailboxElement) {
        mailboxElement.addEventListener('click', function () {
            // Your click event handling code goes here
        });
    });


}

// check all
function checkBoxAll() {
    document.querySelector("#checkboxAll").addEventListener("change", (e) => {
        Array.from(document.querySelectorAll(".itemCheckbox")).forEach(function (element) {
            if (e.target.checked == true) {
                element.checked = true
            }
            else {
                element.checked = false
            }
        });
        createIcons({ icons });
    });

    // checkbox-wrapper-mail
    Array.from(document.querySelectorAll("#mail-list input")).forEach(function (element) {
        element.addEventListener('click', function (el) {
            if (el.target.checked == true) {
                el.target.closest('tr').classList.add("checked");
            } else {
                el.target.closest('tr').classList.remove("checked");
            }
        });
    });

    // checkbox
    var checkboxes = document.querySelectorAll('.mail-primary .checkbox-wrapper-mail input');
    Array.from(checkboxes).forEach(function (element) {
        element.addEventListener('click', function (event) {
            var checkboxes = document.querySelectorAll('.mail-primary .checkbox-wrapper-mail input');
            var checkall = document.getElementById('checkboxAll');
            var checkedCount = document.querySelectorAll('.mail-primary .checkbox-wrapper-mail input:checked').length;
            checkall.checked = checkedCount > 0;
            checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;

            if (event.target.closest('li').classList.contains("active")) {
                (checkedCount > 0) ? document.getElementById("email-topbar-actions").style.display = 'block' : document.getElementById("email-topbar-actions").style.display = 'none';
            } else {
                (checkedCount > 0) ? document.getElementById("email-topbar-actions").style.display = 'block' : document.getElementById("email-topbar-actions").style.display = 'none';
            }
        });
    });

    function checkAll() {
        var checkboxes = document.querySelectorAll('.mail-primary .checkbox-wrapper-mail input');
        var checkedCount = document.querySelectorAll('.mail-primary .checkbox-wrapper-mail input:checked').length;
        Array.from(checkboxes).forEach(function (chkbox) {
            chkbox.checked = true;
            chkbox.parentNode.parentNode.parentNode.classList.add("active");
        });
        (checkedCount > 0) ? document.getElementById("email-topbar-actions").style.display = 'none' : document.getElementById("email-topbar-actions").style.display = 'block';

        if (checkedCount > 0) {
            Array.from(checkboxes).forEach(function (chkbox) {
                chkbox.checked = false;
                chkbox.parentNode.parentNode.parentNode.classList.remove("active");
            });
        } else {
            Array.from(checkboxes).forEach(function (chkbox) {
                chkbox.checked = true;
                chkbox.parentNode.parentNode.parentNode.classList.add("active");
            });
        }
        this.onclick = uncheckAll;
        removeItems();
        const mailListRows = document.querySelectorAll("#mail-list tr");

        mailListRows.forEach(row => {
            row.classList.add("checked");
        });
    }

    function uncheckAll() {
        var checkboxes = document.querySelectorAll('.mail-primary .checkbox-wrapper-mail input');
        var checkedCount = document.querySelectorAll('.mail-primary .checkbox-wrapper-mail input:checked').length;
        Array.from(checkboxes).forEach(function (chkbox) {
            chkbox.checked = false;
            chkbox.parentNode.parentNode.parentNode.classList.remove("active");
        });
        (checkedCount > 0) ? document.getElementById("email-topbar-actions").style.display = 'none' : document.getElementById("email-topbar-actions").style.display = 'block';
        if (checkedCount > 0) {
            Array.from(checkboxes).forEach(function (chkbox) {
                chkbox.checked = false;
                chkbox.parentNode.parentNode.parentNode.classList.remove("active");
            });
        } else {
            Array.from(checkboxes).forEach(function (chkbox) {
                chkbox.checked = true;
                chkbox.parentNode.parentNode.parentNode.classList.add("active");
            });
        }
        this.onclick = checkAll;
        const mailListRows = document.querySelectorAll("#mail-list tr");

        mailListRows.forEach(row => {
            row.classList.remove("checked");
        });
    }

    var checkall = document.getElementById("checkboxAll");
    checkall.onclick = checkAll;
}

var markAllReadBtn = document.getElementById("mark-all-read");

markAllReadBtn.addEventListener('click', function (event) {
    if (document.querySelectorAll("#mail-list tr.unread").length === 0) {
        document.getElementById("unreadConversations").classList.remove("hidden");
        setTimeout(hideclipboardNew, 1000);

        function hideclipboardNew() {
            document.getElementById("unreadConversations").classList.add("hidden");
        }
    };

    Array.from(document.querySelectorAll("#mail-list tr.unread")).forEach(function (element) {
        if (element.classList.contains("unread")) {
            element.classList.remove("unread");
        }
    });
});

// Search result list
var searchList = document.getElementById("searchResultList");
searchList.addEventListener("keyup", function () {
    var inputVal = searchList.value.toLowerCase();
    function filterItems(arr, query) {
        return arr.filter(function (el) {
            return el.name.toLowerCase().indexOf(query.toLowerCase()) !== -1 || el.subject.toLowerCase().indexOf(query.toLowerCase()) !== -1
        })
    }

    var filterData = filterItems(allmaillist, inputVal);

    loadMailData(filterData);
});



// removeItems
function removeItems() {
    var removeItem = document.getElementById('deleteModal');
    removeItem.addEventListener('show.bs.modal', function (event) {
        document.getElementById("delete-record").addEventListener("click", function () {
            Array.from(document.querySelectorAll("#mail-list tr")).forEach(function (element) {
                var filtered = '';
                if (element.classList.contains("active")) {

                    var getid = element.querySelector('.form-check-input').value;

                    function arrayRemove(arr, value) {
                        return arr.filter(function (ele) {
                            return ele.id != value;
                        });
                    }

                    var filtered = arrayRemove(allmaillist, getid);

                    allmaillist = filtered;
                    element.remove();
                }
            });
            // document.getElementById("btn-close").click();
            if (document.getElementById("email-topbar-actions"))
                document.getElementById("email-topbar-actions").style.display = 'none';
            checkall.indeterminate = false;
            checkall.checked = false;
        });
    })
}
removeItems();

function removeSingleItem() {
    var getid = 0;
    document.querySelectorAll(".remove-mail").forEach(function (item) {
        item.addEventListener('click', function (event) {
            getid = item.getAttribute('data-remove-id');
            document.getElementById("delete-record").addEventListener("click", function () {
                var filtered = '';
                function arrayRemove(arr, value) {
                    return arr.filter(function (ele) {
                        return ele.id != value;
                    });
                }
                filtered = arrayRemove(allmaillist, getid);
                allmaillist = filtered;
                loadMailData(allmaillist);
                document.getElementById("close-btn-email").click();
            });
        });
    });
}
removeSingleItem();
