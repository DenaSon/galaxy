/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: sweetalert.init.js */

//Basic
if (document.getElementById("sa-basic"))
    document.getElementById("sa-basic").addEventListener("click", function () {
        Swal.fire({
            title: 'هر احمقی می تواند از کامپیوتر استفاده کند',
            customClass: {
                confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
            },
            buttonsStyling: false,
            showCloseButton: true
        })
    });

//A title with a text under
if (document.getElementById("sa-title"))
    document.getElementById("sa-title").addEventListener("click", function () {
        Swal.fire({
            title: "اینترنت؟",
            text: 'آن چیز هنوز در اطراف است؟',
            icon: 'question',
            customClass: {
                confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
            },
            buttonsStyling: false,
            showCloseButton: true
        })
    });

//Success Message
if (document.getElementById("sa-success"))
    document.getElementById("sa-success").addEventListener("click", function () {
        Swal.fire({
            title: 'آفرین!',
            text: 'دکمه را زدی!',
            icon: 'success',
            showCancelButton: true,
            customClass: {
                confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 ltr:mr-1 rtl:ml-1',
                cancelButton: 'text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20',
            },
            buttonsStyling: false,
            showCloseButton: true
        })
    });

//error Message
if (document.getElementById("sa-error"))
    document.getElementById("sa-error").addEventListener("click", function () {
        Swal.fire({
            title: 'اوه...',
            text: 'مشکلی پیش آمد!',
            icon: 'error',
            customClass: {
                confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
            },
            buttonsStyling: false,
            footer: '<a href="#!" class="inline-flex items-center gap-2 mt-3 text-base font-medium text-custom-400 hover:text-custom-600">Why do I have this issue?</a>',
            showCloseButton: true
        })
    });

// long content
if (document.getElementById("sa-longcontent"))
    document.getElementById("sa-longcontent").addEventListener("click", function () {
        Swal.fire({
            imageUrl: 'https://placeholder.pics/svg/300x1500',
            imageHeight: 1500,
            imageAlt: 'A tall image',
            customClass: {
                confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
                cancelButton: 'text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20',
            },
            confirmButtonText: "بله حذفش کن!",
            buttonsStyling: false,
            showCloseButton: true
        })
    });

//Warning Message
if (document.getElementById("sa-warning"))
    document.getElementById("sa-warning").addEventListener("click", function () {
        Swal.fire({
            title: "مطمئنی؟",
            text: "شما نمی توانید این را برگردانید!",
            icon: "warning",
            showCancelButton: true,
            customClass: {
                confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 ltr:mr-1 rtl:ml-1',
                cancelButton: 'text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20',
            },
            confirmButtonText: "بله حذفش کن!",
            buttonsStyling: false,
            showCloseButton: true
        }).then(function (result) {
            if (result.value) {
                Swal.fire({
                    title: 'حذف شده!',
                    text: 'فایل شما حذف شده است',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
                    },
                    buttonsStyling: false
                })
            }
        });
    });

//Parameter
if (document.getElementById("sa-params"))
    document.getElementById("sa-params").addEventListener("click", function () {
        Swal.fire({
            title: 'مطمئنی؟',
            text: "شما نمی توانید این را برگردانید!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله حذفش کن!',
            cancelButtonText: 'No, cancel!',
            customClass: {
                confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 ltr:mr-1 rtl:ml-1',
                cancelButton: 'text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20',
            },
            buttonsStyling: false,
            showCloseButton: true
        }).then(function (result) {
            if (result.value) {
                Swal.fire({
                    title: 'حذف شده!',
                    text: 'فایل شما حذف شده است',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
                    },
                })
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire({
                    title: 'لغو شد',
                    text: 'Your imaginary file is safe :)',
                    icon: 'error',
                    customClass: {
                        confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
                    },
                    buttonsStyling: true
                })
            }
        });
    });

//Custom Image
if (document.getElementById("sa-image"))
    document.getElementById("sa-image").addEventListener("click", function () {
        Swal.fire({
            title: 'Sweet!',
            text: 'مدال با تصویر سفارشی.',
            imageUrl: 'assets/images/logo-sm.png',
            imageHeight: 40,
            customClass: {
                confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
            },
            buttonsStyling: false,
            animation: false,
            showCloseButton: true
        })
    });

//Auto Close Timer
if (document.getElementById("sa-close"))
    document.getElementById("sa-close").addEventListener("click", function () {
        var timerInterval;
        Swal.fire({
            title: 'هشدار بسته خودکار!',
            html: 'I will close in <strong></strong> seconds.',
            timer: 2000,
            timerProgressBar: true,
            showCloseButton: true,
            didOpen: function () {
                Swal.showLoading()
                timerInterval = setInterval(function () {
                    var content = Swal.getHtmlContainer()
                    if (content) {
                        var b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            onClose: function () {
                clearInterval(timerInterval)
            }
        }).then(function (result) {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    });

//custom html alert
if (document.getElementById("custom-html-alert"))
    document.getElementById("custom-html-alert").addEventListener("click", function () {
        Swal.fire({
            title: '<i>HTML</i> <u>example</u>',
            icon: 'info',
            html: 'You can use <b>bold text</b>, ' +
                '<a href="//themesdesign.in/">links</a> ' +
                'and other HTML tags',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            customClass: {
                confirmButton: 'text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10 ltr:mr-1 rtl:ml-1',
                cancelButton: 'text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20',
            },
            buttonsStyling: false,
            confirmButtonText: '<i class="ri-thumb-up-fill align-bottom me-1"></i> Great!',
            cancelButtonText: '<i class="ri-thumb-down-fill align-bottom"></i>',
            showCloseButton: true
        })
    });

//dialog three buttons
if (document.getElementById("sa-dialog-three-btn"))
    document.getElementById("sa-dialog-three-btn").addEventListener("click", function () {
        Swal.fire({
            title: 'آیا می خواهید تغییرات را ذخیره کنید؟',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            customClass: {
                confirmButton: 'text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10 ltr:mr-1 rtl:ml-1',
                cancelButton: 'text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20',
                denyButton: "text-white btn bg-sky-500 border-sky-500 hover:text-white hover:bg-sky-600 hover:border-sky-600 focus:text-white focus:bg-sky-600 focus:border-sky-600 focus:ring focus:ring-sky-100 active:text-white active:bg-sky-600 active:border-sky-600 active:ring active:ring-sky-100 dark:ring-sky-400/20 ltr:mr-1 rtl:ml-1"
            },
            buttonsStyling: false,
            denyButtonText: 'Don\'t save',
            showCloseButton: true
        }).then(function (result) {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'ذخیره!',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
                    },
                    buttonsStyling: false,
                })
            } else if (result.isDenied) {
                Swal.fire({
                    title: 'تغییرات ذخیره نمی شوند',
                    icon: 'info',
                    customClass: {
                        confirmButton: 'text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20',
                    },
                    buttonsStyling: false,
                })
            }
        })
    });

//position
if (document.getElementById("sa-position"))
    document.getElementById("sa-position").addEventListener("click", function () {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500,
            showCloseButton: true
        })
    });

//Ajax
if (document.getElementById("ajax-alert"))
    document.getElementById("ajax-alert").addEventListener("click", function () {
        Swal.fire({
            title: 'برای اجرای درخواست ajax ایمیل ارسال کنید',
            input: 'email',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            customClass: {
                confirmButton: 'text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10 ltr:mr-1 rtl:ml-1',
                cancelButton: 'text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20',
            },
            buttonsStyling: false,
            showCloseButton: true,
            preConfirm: function (email) {
                return new Promise(function (resolve, reject) {
                    setTimeout(function () {
                        if (email === 'taken@example.com') {
                            reject('This email is already taken.')
                        } else {
                            resolve()
                        }
                    }, 2000)
                })
            },
            allowOutsideClick: false
        }).then(function (email) {
            Swal.fire({
                icon: 'success',
                title: 'درخواست آژاکس تمام شد!',
                customClass: {
                    confirmButton: 'text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10 ltr:mr-1 rtl:ml-1',
                },
                buttonsStyling: false,
                html: 'Submitted email: ' + email
            })
        })
    });