<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta charset="utf-8" />
    <title>Dashboard | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../assets/css/config/modern/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="../assets/css/config/modern/app-rtl.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="../assets/css/config/modern/bootstrap-dark-rtl.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="../assets/css/config/modern/app-dark-rtl.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="../assets/css/icons-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/fontiran.css" rel="stylesheet" type="text/css" /></head>

<!-- body start -->
<body class="loading" data-layout-mode="detached" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-end mb-0">

                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box dropdown">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                <button class="btn input-group-text" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                            <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">پیدا کن نتیجه را</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-home me-1"></i>
                                    <span>انالیز گزارش</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-aperture me-1"></i>
                                    <span>چه طور می تونم کمک کنم</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>تنظیمات پروفایل کاربر</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">کاربر</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex align-items-start">
                                            <img class="d-flex me-2 rounded-circle" src="../assets/images/users/user-2.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">خنانه رضایی</h5>
                                                <span class="font-12 mb-0">گرافیست</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex align-items-start">
                                            <img class="d-flex me-2 rounded-circle" src="../assets/images/users/user-5.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">اامیر دانشیار</h5>
                                                <span class="font-12 mb-0">برنامه نویس</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </form>
                </li>

                <li class="dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-search noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                        </form>
                    </div>
                </li>

                <li class="dropdown d-none d-lg-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                        <i class="fe-maximize noti-icon"></i>
                    </a>
                </li>

                <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-grid noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-lg dropdown-menu-end">

                        <div class="p-lg-1">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="../assets/images/brands/slack.png" alt="slack">
                                        <span>هادی</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="../assets/images/brands/github.png" alt="Github">
                                        <span>گیت هاب</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="../assets/images/brands/dribbble.png" alt="dribbble">
                                        <span>دیربله</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="../assets/images/brands/bitbucket.png" alt="bitbucket">
                                        <span>بیت باکت</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="../assets/images/brands/dropbox.png" alt="dropbox">
                                        <span>دراپ باکس</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="../assets/images/brands/g-suite.png" alt="G Suite">
                                        <span>جی سوییت</span>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </li>

                <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="../assets/images/flags/us.jpg" alt="user-image" height="16">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="../assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">آلمانی</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="../assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">ایتالیایی</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="../assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">اسپانیایی</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="../assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">روسی</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                            <span class="float-end">
                                <a href="" class="text-dark">
                                      <small>حذف همه</small>
                                </a>
                            </span>اطلاع
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="../assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                <p class="notify-details">علی</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>سلام چه طوری؟ملاقات بعدی ما در مورد چی هست؟</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">حنا کامنت گذاشته
                                    <small class="text-muted">1دقیقه قبل</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="../assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                <p class="notify-details">حسین</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>وای ! این مدیر طراحی خوب و عالی به نظر می رسد</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">کاربر جدید ثبت نام کرد
                                    <small class="text-muted">5 ساعت قبل</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">حنادر مورد ادمین نظر داد

                                    <small class="text-muted">4 روز پیش
                                    </small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">حنا لایک کرد
                                    <b>ادمین</b>

                                    <small class="text-muted">13روز پیش</small>
                                </p>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            مشاهده همه
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="../assets/images/users/user-6.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1">
                        Stanley <i class="mdi mdi-chevron-down"></i>
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">خوش آمدی !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>من حساب</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>تنظیمات</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>صفحه قفل</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>خروج</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="../assets/images/logo-sm.png" alt="" height="22">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                    <span class="logo-lg">
                    <img src="../assets/images/logo-dark.png" alt="" height="20">
                        <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
                </a>

                <a href="index.html" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="../assets/images/logo-sm.png" alt="" height="22">
                </span>
                    <span class="logo-lg">
                    <img src="../assets/images/logo-light.png" alt="" height="20">
                </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <!-- Mobile menu toggle (Horizontal Layout)-->
                    <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown d-none d-xl-block">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        ایجاد جدید
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-briefcase me-1"></i>
                            <span>پروژه جدید</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-user me-1"></i>
                            <span>ایجاد کاربر</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-bar-chart-line- me-1"></i>
                            <span>گزارش وحید</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-settings me-1"></i>
                            <span>تنظیمات</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="fe-headphones me-1"></i>
                            <span>راهنما و پشتیبانی</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown dropdown-mega d-none d-xl-block">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        مگا منو
                        <i class="mdi mdi-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-megamenu">
                        <div class="row">
                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="text-dark mt-0">تچهیزات یوای</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);">ابزارک ها</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">لیست نست تیبل</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">رنج اسلایدر</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">اقلام بنایی</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">هشدارهای شیرین
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">صفحه نمای درخت
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">صفحه تور</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="text-dark mt-0">برنامه های کاربردی</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);">صفحات تجارت الکترونیک</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">صفحات CRM</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">ایمیل</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">تقویم</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">مخاطبین تیم</a>>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">تابلوی کار</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">قالب های ایمیل</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <h5 class="text-dark mt-0">صفحات اضافی</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);">نوار کناری سمت چپ با کاربر</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">منو جمع شد</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">نوار کناری کوچک چپ</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">سبک هدر جدید
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">نتیجه جستجو</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">صفحات گالری
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">تعمیر و نگهداری و به زودی</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center mt-3">
                                    <h3 class="text-dark">تخفیف ویژه تخفیف</h3>
                                    <h4>تا 70٪ تخفیف صرفه جویی کنید.</h4>
                                    <button class="btn btn-primary rounded-pill mt-3">اکنون بارگیری کن</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center">
                <img src="../assets/images/users/user-6.jpg" alt="user-img" title="Mat Helme"
                     class="rounded-circle avatar-md">
                <div class="dropdown">
                    <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                       data-bs-toggle="dropdown">Stanley Parker</a>
                    <div class="dropdown-menu user-pro-dropdown">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user me-1"></i>
                            <span>من حساب</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings me-1"></i>
                            <span>تنظیمات</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock me-1"></i>
                            <span>صفحه قفل</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out me-1"></i>
                            <span>خروج</span>
                        </a>

                    </div>
                </div>
                <p class="text-muted">Admin Head</p>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    <li class="menu-title">فهرست</li>

                    <li>
                        <a href="#sidebarDashboards" data-bs-toggle="collapse">
                            <i data-feather="airplay"></i>
                            <span class="badge bg-success rounded-pill float-end">4</span>
                            <span> داشبورد </span>
                        </a>
                        <div class="collapse" id="sidebarDashboards">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="index.html">داشبورد 1</a>
                                </li>
                                <li>
                                    <a href="dashboard-2.html">داشبورد 2</a>
                                </li>
                                <li>
                                    <a href="dashboard-3.html">داشبورد 3</a>
                                </li>
                                <li>
                                    <a href="dashboard-4.html">داشبورد 4</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title mt-2">برنامه ها</li>

                    <li>
                        <a href="apps-calendar.html">
                            <i data-feather="calendar"></i>
                            <span> تقویم </span>
                        </a>
                    </li>

                    <li>
                        <a href="apps-chat.html">
                            <i data-feather="message-square"></i>
                            <span> چت </span>
                        </a>
                    </li>

                    <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <i data-feather="shopping-cart"></i>
                            <span> تجارت الکترونیکی </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="ecommerce-dashboard.html">داشبورد</a>
                                </li>
                                <li>
                                    <a href="ecommerce-products.html">محصولات</a>
                                </li>
                                <li>
                                    <a href="ecommerce-product-detail.html">جزئیات محصول</a>
                                </li>
                                <li>
                                    <a href="ecommerce-product-edit.html">افزودن محصول</a>
                                </li>
                                <li>
                                    <a href="ecommerce-customers.html">مشتریان</a>
                                </li>
                                <li>
                                    <a href="ecommerce-orders.html">سفارشات</a>
                                </li>
                                <li>
                                    <a href="ecommerce-order-detail.html">جزئیات سفارش</a>
                                </li>
                                <li>
                                    <a href="ecommerce-sellers.html">فروشندگان</a>
                                </li>
                                <li>
                                    <a href="ecommerce-cart.html">سبد خرید</a>
                                </li>
                                <li>
                                    <a href="ecommerce-checkout.html">صفحه پرداخت</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> CRM </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="crm-dashboard.html">داشبورد</a>
                                </li>
                                <li>
                                    <a href="crm-contacts.html">مخاطبین</a>
                                </li>
                                <li>
                                    <a href="crm-opportunities.html">فرصت ها</a>
                                </li>
                                <li>
                                    <a href="crm-leads.html">رهبری</a>
                                </li>
                                <li>
                                    <a href="crm-customers.html">مشتریان</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarEmail" data-bs-toggle="collapse">
                            <i data-feather="mail"></i>
                            <span> ایمیل </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="email-inbox.html">صفحه ورودی</a>
                                </li>
                                <li>
                                    <a href="email-read.html">خواندن ایمیل</a>
                                </li>
                                <li>
                                    <a href="email-compose.html">ایجاد ایمیل</a>
                                </li>
                                <li>
                                    <a href="email-templates.html">قالب ها ایمیل</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="apps-social-feed.html">
                            <span class="badge bg-pink float-end">داغ</span>
                            <i data-feather="rss"></i>
                            <span> شبکه اجتماعی </span>
                        </a>
                    </li>

                    <li>
                        <a href="apps-companies.html">
                            <i data-feather="activity"></i>
                            <span> شرکت ها </span>
                        </a>
                    </li>

                    <li>
                        <a href="#sidebarProjects" data-bs-toggle="collapse">
                            <i data-feather="briefcase"></i>
                            <span> پروژه ها </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarProjects">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="project-list.html">لیست</a>
                                </li>
                                <li>
                                    <a href="project-detail.html">جزئیات</a>
                                </li>
                                <li>
                                    <a href="project-create.html">ایجاد</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarTasks" data-bs-toggle="collapse">
                            <i data-feather="clipboard"></i>
                            <span> وظایف </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarTasks">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="task-list.html">لیست</a>
                                </li>
                                <li>
                                    <a href="task-details.html">جزئیات</a>
                                </li>
                                <li>
                                    <a href="task-kanban-board.html">تخته وظایف</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarContacts" data-bs-toggle="collapse">
                            <i data-feather="book"></i>
                            <span> مخاطبین </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarContacts">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="contacts-list.html">لیست اعضا</a>
                                </li>
                                <li>
                                    <a href="contacts-profile.html">پروفایل</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarTickets" data-bs-toggle="collapse">
                            <i data-feather="aperture"></i>
                            <span> تیکت ها </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarTickets">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="tickets-list.html">لیست</a>
                                </li>
                                <li>
                                    <a href="tickets-detail.html">جزئیات</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="apps-file-manager.html">
                            <i data-feather="folder-plus"></i>
                            <span> مدیریت فایل </span>
                        </a>
                    </li>

                    <li class="menu-title mt-2">سفارشی</li>

                    <li>
                        <a href="#sidebarAuth" data-bs-toggle="collapse">
                            <i data-feather="file-text"></i>
                            <span> صفحات ورود </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAuth">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="auth-login.html">ورود</a>
                                </li>
                                <li>
                                    <a href="auth-login-2.html">ورود 2</a>
                                </li>
                                <li>
                                    <a href="auth-register.html">ثبت نام</a>
                                </li>
                                <li>
                                    <a href="auth-register-2.html">ثبت نام 2</a>
                                </li>
                                <li>
                                    <a href="auth-signin-signup.html">ورود - ثبت نام</a>
                                </li>
                                <li>
                                    <a href="auth-signin-signup-2.html">ورود - ثبت نام 2</a>
                                </li>
                                <li>
                                    <a href="auth-recoverpw.html">ریکاوری پسورد</a>
                                </li>
                                <li>
                                    <a href="auth-recoverpw-2.html">ریکاوری پسورد 2</a>
                                </li>
                                <li>
                                    <a href="auth-lock-screen.html">قفل صفحه</a>
                                </li>
                                <li>
                                    <a href="auth-lock-screen-2.html">قفل صفحه 2</a>
                                </li>
                                <li>
                                    <a href="auth-logout.html">خروج</a>
                                </li>
                                <li>
                                    <a href="auth-logout-2.html">خروج 2</a>
                                </li>
                                <li>
                                    <a href="auth-confirm-mail.html">تاییدیه ایمیل</a>
                                </li>
                                <li>
                                    <a href="auth-confirm-mail-2.html">تاییدیه ایمیل 2</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarExpages" data-bs-toggle="collapse">
                            <i data-feather="package"></i>
                            <span> صفحات اضافی </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarExpages">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="pages-starter.html">خالی</a>
                                </li>
                                <li>
                                    <a href="pages-timeline.html">تایم لاین</a>
                                </li>
                                <li>
                                    <a href="pages-sitemap.html">سایت مپ</a>
                                </li>
                                <li>
                                    <a href="pages-invoice.html">صورت حساب</a>
                                </li>
                                <li>
                                    <a href="pages-faqs.html">قوانین</a>
                                </li>
                                <li>
                                    <a href="pages-search-results.html">صفحه جستجو</a>
                                </li>
                                <li>
                                    <a href="pages-pricing.html">قیمت گذاری</a>
                                </li>
                                <li>
                                    <a href="pages-maintenance.html">Maintenance</a>
                                </li>
                                <li>
                                    <a href="pages-coming-soon.html">بازگشت به زودی</a>
                                </li>
                                <li>
                                    <a href="pages-gallery.html">گالری</a>
                                </li>
                                <li>
                                    <a href="pages-404.html">خطا 404</a>
                                </li>
                                <li>
                                    <a href="pages-404-two.html">خطا 404 دو</a>
                                </li>
                                <li>
                                    <a href="pages-404-alt.html">خطا 404-alt</a>
                                </li>
                                <li>
                                    <a href="pages-500.html">خطا 500</a>
                                </li>
                                <li>
                                    <a href="pages-500-two.html">خطا 500 دو</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarLayouts" data-bs-toggle="collapse">
                            <i data-feather="layout"></i>
                            <span class="badge bg-blue float-end">جدید</span>
                            <span> لایه ها </span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="layouts-vertical.html">Vertical</a>
                                </li>
                                <li>
                                    <a href="layouts-horizontal.html">افقی</a>
                                </li>
                                <li>
                                    <a href="layouts-two-column.html">منو دو ستونه</a>
                                </li>
                                <li>
                                    <a href="layouts-two-tone-icons.html">منو دو ستونه</a>
                                </li>
                                <li>
                                    <a href="layouts-preloader.html">پیش بارگذاری</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title mt-2">اجزا</li>

                    <li>
                        <a href="#sidebarBaseui" data-bs-toggle="collapse">
                            <i data-feather="pocket"></i>
                            <span> UI پایه </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarBaseui">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="ui-buttons.html">دکمه ها</a>
                                </li>
                                <li>
                                    <a href="ui-cards.html">کارد</a>
                                </li>
                                <li>
                                    <a href="ui-avatars.html">آواتار</a>
                                </li>
                                <li>
                                    <a href="ui-portlets.html">Portlets</a>
                                </li>
                                <li>
                                    <a href="ui-tabs-accordions.html">تب ها</a>
                                </li>
                                <li>
                                    <a href="ui-modals.html">مدال</a>
                                </li>
                                <li>
                                    <a href="ui-progress.html">پروقرز</a>
                                </li>
                                <li>
                                    <a href="ui-notifications.html">اعلان ها</a>
                                </li>
                                <li>
                                    <a href="ui-offcanvas.html">Offcanvas</a>
                                </li>
                                <li>
                                    <a href="ui-placeholders.html">پلیس هولدر</a>
                                </li>
                                <li>
                                    <a href="ui-spinners.html">اپینیرز</a>
                                </li>
                                <li>
                                    <a href="ui-images.html">تصاویر</a>
                                </li>
                                <li>
                                    <a href="ui-carousel.html">کاروسل</a>
                                </li>
                                <li>
                                    <a href="ui-list-group.html">لیست گروهی</a>
                                </li>
                                <li>
                                    <a href="ui-video.html">قرار دادن ویدئو</a>
                                </li>
                                <li>
                                    <a href="ui-dropdowns.html">Dropdowns</a>
                                </li>
                                <li>
                                    <a href="ui-ribbons.html">Ribbons</a>
                                </li>
                                <li>
                                    <a href="ui-tooltips-popovers.html">Tooltips & Popovers</a>
                                </li>
                                <li>
                                    <a href="ui-general.html">UI عمومی</a>
                                </li>
                                <li>
                                    <a href="ui-typography.html">تایپوگرافی</a>
                                </li>
                                <li>
                                    <a href="ui-grid.html">گرید</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarExtendedui" data-bs-toggle="collapse">
                            <i data-feather="layers"></i>
                            <span class="badge bg-info float-end">داغ</span>
                            <span> UI اضافی </span>
                        </a>
                        <div class="collapse" id="sidebarExtendedui">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="extended-nestable.html">Nestable List</a>
                                </li>
                                <li>
                                    <a href="extended-range-slider.html">Range Slider</a>
                                </li>
                                <li>
                                    <a href="extended-dragula.html">Dragula</a>
                                </li>
                                <li>
                                    <a href="extended-animation.html">انیمیشن</a>
                                </li>
                                <li>
                                    <a href="extended-sweet-alert.html">Sweet Alert</a>
                                </li>
                                <li>
                                    <a href="extended-tour.html">Tour Page</a>
                                </li>
                                <li>
                                    <a href="extended-scrollspy.html">Scrollspy</a>
                                </li>
                                <li>
                                    <a href="extended-loading-buttons.html">دکمه های بارگذاری</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="widgets.html">
                            <i data-feather="gift"></i>
                            <span> ویجت ها </span>
                        </a>
                    </li>

                    <li>
                        <a href="#sidebarIcons" data-bs-toggle="collapse">
                            <i data-feather="cpu"></i>
                            <span> آیکون ها </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarIcons">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="icons-two-tone.html">آیکون 1</a>
                                </li>
                                <li>
                                    <a href="icons-feather.html">آیکون های مهم</a>
                                </li>
                                <li>
                                    <a href="icons-mdi.html">میتریال دیزاین آیکون</a>
                                </li>
                                <li>
                                    <a href="icons-dripicons.html">Dripicons</a>
                                </li>
                                <li>
                                    <a href="icons-font-awesome.html">فوت آسون 5</a>
                                </li>
                                <li>
                                    <a href="icons-themify.html">Themify</a>
                                </li>
                                <li>
                                    <a href="icons-simple-line.html">Simple Line</a>
                                </li>
                                <li>
                                    <a href="icons-weather.html">آب و هوا</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarForms" data-bs-toggle="collapse">
                            <i data-feather="bookmark"></i>
                            <span> فرم ها </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarForms">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="forms-elements.html">المنت های عمومی</a>
                                </li>
                                <li>
                                    <a href="forms-advanced.html">پیشرفته</a>
                                </li>
                                <li>
                                    <a href="forms-validation.html">اعتبار سنجی</a>
                                </li>
                                <li>
                                    <a href="forms-pickers.html">انتخاب کننده</a>
                                </li>
                                <li>
                                    <a href="forms-wizard.html">Wizard</a>
                                </li>
                                <li>
                                    <a href="forms-masks.html">Masks</a>
                                </li>
                                <li>
                                    <a href="forms-quilljs.html">ویرایشگر Quilljs</a>
                                </li>
                                <li>
                                    <a href="forms-file-uploads.html">آپلود فایل</a>
                                </li>
                                <li>
                                    <a href="forms-x-editable.html">ویرایشگر جدول</a>
                                </li>
                                <li>
                                    <a href="forms-image-crop.html">برش تصویر</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarTables" data-bs-toggle="collapse">
                            <i data-feather="grid"></i>
                            <span> جدول </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarTables">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="tables-basic.html">جدول پایه</a>
                                </li>
                                <li>
                                    <a href="tables-datatables.html">جدول داده</a>
                                </li>
                                <li>
                                    <a href="tables-editable.html">جدول قابل ویرایش</a>
                                </li>
                                <li>
                                    <a href="tables-responsive.html">جدول ریسپانسیو</a>
                                </li>
                                <li>
                                    <a href="tables-footables.html">جدول Foo</a>
                                </li>
                                <li>
                                    <a href="tables-bootstrap.html">جدول بوت استرپ</a>
                                </li>
                                <li>
                                    <a href="tables-tablesaw.html">جدول Tablesaw</a>
                                </li>
                                <li>
                                    <a href="tables-jsgrid.html">جدول JsGrid</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarCharts" data-bs-toggle="collapse">
                            <i data-feather="bar-chart-2"></i>
                            <span> نمودارها </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCharts">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="charts-apex.html">نموادر Apex</a>
                                </li>
                                <li>
                                    <a href="charts-flot.html">نمودار Flot</a>
                                </li>
                                <li>
                                    <a href="charts-morris.html">نمودار Morris</a>
                                </li>
                                <li>
                                    <a href="charts-chartjs.html">نمودار Chartjs</a>
                                </li>
                                <li>
                                    <a href="charts-peity.html">نمودار Peity</a>
                                </li>
                                <li>
                                    <a href="charts-chartist.html">نمودار Chartist</a>
                                </li>
                                <li>
                                    <a href="charts-c3.html">نمودار C3</a>
                                </li>
                                <li>
                                    <a href="charts-sparklines.html">نمودار Sparklines</a>
                                </li>
                                <li>
                                    <a href="charts-knob.html">جدول Jquery Knob</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarMaps" data-bs-toggle="collapse">
                            <i data-feather="map"></i>
                            <span> نقشه </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMaps">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="maps-google.html">گوگل مپ</a>
                                </li>
                                <li>
                                    <a href="maps-vector.html">نقشه Vector</a>
                                </li>
                                <li>
                                    <a href="maps-mapael.html">نقشه Mapael</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarMultilevel" data-bs-toggle="collapse">
                            <i data-feather="share-2"></i>
                            <span> چند سطحی </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMultilevel">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="#sidebarMultilevel2" data-bs-toggle="collapse">
                                        سطح دو <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarMultilevel2">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="javascript: void(0);">آیتم 1</a>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);">آیتم 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <a href="#sidebarMultilevel3" data-bs-toggle="collapse">
                                        سطح سه <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarMultilevel3">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="javascript: void(0);">آیتم 1</a>
                                            </li>
                                            <li>
                                                <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                                    آیتم 2 <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse" id="sidebarMultilevel4">
                                                    <ul class="nav-second-level">
                                                        <li>
                                                            <a href="javascript: void(0);">آیتم 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript: void(0);">آیتم 2</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <form class="d-flex align-items-center mb-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control border-0 shadow" id="dash-daterange">
                                        <span class="input-group-text bg-blue border-blue text-white">
                                                    <i class="mdi mdi-calendar-range"></i>
                                                </span>
                                    </div>
                                    <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                        <i class="mdi mdi-filter-variant"></i>
                                    </a>
                                </form>
                            </div>
                            <h4 class="page-title">داشبورد</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-pink border-pink border">
                                            <i class="fe-heart font-22 avatar-title text-pink"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="text-dark mt-1">$<span data-plugin="counterup">58,947</span></h3>
                                            <p class="text-muted mb-1 text-truncate">مجموع درآمد</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                            <i class="fe-shopping-cart font-22 avatar-title text-blue"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                                            <p class="text-muted mb-1 text-truncate">فروش امروز</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                            <i class="fe-bar-chart-line- font-22 avatar-title text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
                                            <p class="text-muted mb-1 text-truncate">تبدیل</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup">78.41</span>k</h3>
                                            <p class="text-muted mb-1 text-truncate">بازدیدهای امروز</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">گزارش فروش</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">گزارش صادرات</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">سود</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">عمل
                                        </a>
                                    </div>
                                </div>

                                <h4 class="header-title mb-0">مجموع درآمد</h4>

                                <div class="widget-chart text-center" dir="ltr">

                                    <div id="total-revenue" class="mt-0"  data-colors="#5671f0"></div>

                                    <h5 class="text-muted mt-0">Total sales made today</h5>
                                    <h2>$178</h2>

                                    <p class="text-muted w-75 mx-auto sp-line-2">عناصر عنوان سنتی به گونه ای طراحی شده اند که در گوشت محتوای صفحه شما بهترین عملکرد را داشته باشند.</p>

                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">هدف</p>
                                            <h4><i class="fe-arrow-down text-danger me-1"></i>$7.8k</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">هفته گذشته</p>
                                            <h4><i class="fe-arrow-up text-success me-1"></i>$1.4k</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">ماه گذشته</p>
                                            <h4><i class="fe-arrow-down text-danger me-1"></i>$15k</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col-->

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body pb-2">
                                <div class="float-end d-none d-md-inline-block">
                                    <div class="btn-group mb-2">
                                        <button type="button" class="btn btn-xs btn-light">امروز</button>
                                        <button type="button" class="btn btn-xs btn-light">هفته ای</button>
                                        <button type="button" class="btn btn-xs btn-secondary">ماهانه</button>
                                    </div>
                                </div>

                                <h4 class="header-title mb-3">تجزیه و تحلیل فروش</h4>

                                <div dir="ltr">
                                    <div id="sales-analytics" class="mt-4" data-colors="#43bfe5,#6c757d"></div>
                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">گزارش ویرایش</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">گزارش صادرات</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">عمل
                                        </a>
                                    </div>
                                </div>

                                <h4 class="header-title mb-3">5 کاربر برتر</h4>

                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                                        <thead class="table-light">
                                        <tr>
                                            <th colspan="2">پروفایل</th>
                                            <th>واحد پولی</th>
                                            <th>دارایی</th>
                                            <th>میزان سفارش</th>
                                            <th>فعال</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="../assets/images/users/user-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 fw-normal">هادی</h5>
                                                <p class="mb-0 text-muted"><small>عضو از 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                            </td>

                                            <td>
                                                0.00816117 BTC
                                            </td>

                                            <td>
                                                0.00097036 BTC
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="../assets/images/users/user-3.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 fw-normal">سعید نجمی</h5>
                                                <p class="mb-0 text-muted"><small>عضو از 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-eth text-primary"></i> ETH
                                            </td>

                                            <td>
                                                3.16117008 ETH
                                            </td>

                                            <td>
                                                1.70360009 ETH
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="../assets/images/users/user-4.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 fw-normal">امیر دانشیار</h5>
                                                <p class="mb-0 text-muted"><small>عضو از 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-eur text-primary"></i> EUR
                                            </td>

                                            <td>
                                                25.08 EUR
                                            </td>

                                            <td>
                                                12.58 EUR
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="../assets/images/users/user-5.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 fw-normal">مرتضی قاسم خانی</h5>
                                                <p class="mb-0 text-muted"><small>عضو از 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-cny text-primary"></i> CNY
                                            </td>

                                            <td>
                                                82.00 CNY
                                            </td>

                                            <td>
                                                30.83 CNY
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="../assets/images/users/user-6.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 fw-normal">میثم جوادی</h5>
                                                <p class="mb-0 text-muted"><small>عضو از 2017</small></p>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                            </td>

                                            <td>
                                                2.00816117 BTC
                                            </td>

                                            <td>
                                                1.00097036 BTC
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-plus"></i></a>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">گزارش ویرایش</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">گزارش صادرات</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">عمل
                                        </a>
                                    </div>
                                </div>

                                <h4 class="header-title mb-3">سابقه درآمد</h4>

                                <div class="table-responsive">
                                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                                        <thead class="table-light">
                                        <tr>
                                            <th>بازارها</th>
                                            <th>تاریخ</th>
                                            <th>پرداخت ها</th>
                                            <th>وضعیت</th>
                                            <th>فعال</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="m-0 fw-normal">تم مارکت</h5>
                                            </td>

                                            <td>
                                                Oct 15, 2018
                                            </td>

                                            <td>
                                                $5848.68
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-warning text-warning">پیش رو</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 fw-normal">شکربن</h5>
                                            </td>

                                            <td>
                                                Oct 12, 2018
                                            </td>

                                            <td>
                                                $1247.25
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-success text-success">پرداخت شده</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 fw-normal">شیرهولدینگ</h5>
                                            </td>

                                            <td>
                                                Oct 10, 2018
                                            </td>

                                            <td>
                                                $815.89
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-success text-success">پرداخت شده</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 fw-normal">امواتو</h5>
                                            </td>

                                            <td>
                                                Oct 03, 2018
                                            </td>

                                            <td>
                                                $248.75
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-danger text-danger">معوق</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 fw-normal">ویسپهر</h5>
                                            </td>

                                            <td>
                                                Sep 21, 2018
                                            </td>

                                            <td>
                                                $978.21
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-warning text-warning">پیش رو</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5 class="m-0 fw-normal">فولاد سونگون</h5>
                                            </td>

                                            <td>
                                                Sep 15, 2018
                                            </td>

                                            <td>
                                                $358.10
                                            </td>

                                            <td>
                                                <span class="badge bg-soft-success text-success">پرداخت شده</span>
                                            </td>

                                            <td>
                                                <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> &copy; تم UBold توسط <a href="https://www.zhaket.com/store/web/tjavan">مبتکران جوان</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">درباره ما</a>
                            <a href="javascript:void(0);">کمک</a>
                            <a href="javascript:void(0);">با ما تماس بگیرید</a>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link py-2" data-bs-toggle="tab" href="#chat-tab" role="tab">
                    <i class="mdi mdi-message-text d-block font-22 my-1"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-2" data-bs-toggle="tab" href="#tasks-tab" role="tab">
                    <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                    <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content pt-0">
            <div class="tab-pane" id="chat-tab" role="tabpanel">

                <form class="search-bar p-3">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="mdi mdi-magnify"></span>
                    </div>
                </form>

                <h6 class="fw-medium px-3 mt-2 text-uppercase">چت های گروهی</h6>

                <div class="p-2">
                    <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                        <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-success"></i>
                        <span class="mb-0 mt-1">توسعه برنامه</span>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                        <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-warning"></i>
                        <span class="mb-0 mt-1">دفتر کار</span>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                        <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-danger"></i>
                        <span class="mb-0 mt-1">گروه شخصی</span>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item ps-3 d-block">
                        <i class="mdi mdi-checkbox-blank-circle-outline me-1"></i>
                        <span class="mb-0 mt-1">آزاد</span>
                    </a>
                </div>

                <h6 class="fw-medium px-3 mt-3 text-uppercase">موارد دلخواه
                    <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-end mdi mdi-plus-circle"></i></a></h6>

                <div class="p-2">
                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-10.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status online"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">رایان</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">به نظر می رسد انگلیسی ساده شده است.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-1.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status away"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">رسا</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">برای یک فرد انگلیسی ساده به نظر می رسد</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-9.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status busy"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">وحید</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">برای رسیدن به این امر ، لازم است.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <h6 class="fw-medium px-3 mt-3 text-uppercase">چت های دیگر <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-end mdi mdi-plus-circle"></i></a></h6>

                <div class="p-2 pb-4">
                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-2.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status online"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">سپهر</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">همه می دانند چرا یک زبان مشترک جدید ایجاد شده است.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-4.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status away"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">سینا</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">زبانها فقط از نظر دستور زبان متفاوت هستند.</p>

                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-5.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status online"></i>
                            </div>
                            <div class="overflow-hidden">

                                <h6 class="mt-0 mb-1 font-14">صدرا</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">اگر چندین زبان گرامر نتیجه را با هم ترکیب کنند.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status online"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">شادی</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">به نظر می رسد انگلیسی ساده شده است.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-7.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status busy"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">حنا</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">زبان مشترک جدید ساده تر خواهد بود</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex align-items-start noti-user-item">
                            <div class="position-relative me-2">
                                <img src="../assets/images/users/user-8.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                <i class="mdi mdi-circle user-status away"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mt-0 mb-1 font-14">ایناز</h6>
                                <div class="font-13 text-muted">
                                    <p class="mb-0 text-truncate">می توان از پرداخت هزینه مترجمان گران خودداری کرد.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="text-center mt-3">
                        <a href="javascript:void(0);" class="btn btn-sm btn-white">
                            <i class="mdi mdi-spin mdi-loading me-2"></i>
                            بارگذاری بیشتر
                        </a>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="tasks-tab" role="tabpanel">
                <h6 class="fw-medium p-3 m-0 text-uppercase">وظایف کاری</h6>
                <div class="px-2">
                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">توسعه برنامه<span class="float-end">75%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">تعمیر پایگاه داده<span class="float-end">37%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">پشتیبان گیری ایجاد کنید<span class="float-end">52%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>
                </div>

                <h6 class="fw-medium px-3 mb-0 mt-4 text-uppercase">وظایف آینده
                </h6>

                <div class="p-2">
                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">گزارش فروش<span class="float-end">12%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">طراحی مجدد وب سایت<span class="float-end">67%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                        <p class="text-muted mb-0">طراحی جدید مدیریت<span class="float-end">84%</span></p>
                        <div class="progress mt-2" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </a>
                </div>

                <div class="p-3 mt-2 d-grid">
                    <a href="javascript: void(0);" class="btn btn-success waves-effect waves-light">وظیفه ایجاد کنید</a>
                </div>

            </div>
            <div class="tab-pane active" id="settings-tab" role="tabpanel">
                <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                    <span class="d-block py-1">تنظیمات پوسته</span>
                </h6>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>شخصی سازی</strong> طرح کلی رنگ ، منوی نوار کناری و غیره
                    </div>

                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">طرح رنگی</h6>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                               id="light-mode-check" checked />
                        <label class="form-check-label" for="light-mode-check">حالت نور</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                               id="dark-mode-check" />
                        <label class="form-check-label" for="dark-mode-check">حالت تاریک</label>
                    </div>

                    <!-- Width -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">طول</h6>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check" checked />
                        <label class="form-check-label" for="fluid-check">فول</label>
                    </div>
                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="width" value="boxed" id="boxed-check" />
                        <label class="form-check-label" for="boxed-check">جعبه دار</label>
                    </div>

                    <!-- Menu positions -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Layout Position</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menus-position" value="fixed" id="fixed-check"
                               checked />
                        <label class="form-check-label" for="fixed-check">درست شد</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menus-position" value="scrollable"
                               id="scrollable-check" />
                        <label class="form-check-label" for="scrollable-check">قابل پیمایش</label>
                    </div>

                    <!-- Left Sidebar-->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light" id="light-check" />
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark" id="dark-check" checked/>
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="brand" id="brand-check" />
                        <label class="form-check-label" for="brand-check">Brand</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="gradient" id="gradient-check" />
                        <label class="form-check-label" for="gradient-check">Gradient</label>
                    </div>

                    <!-- size -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default"
                               id="default-size-check" checked />
                        <label class="form-check-label" for="default-size-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="condensed"
                               id="condensed-check" />
                        <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="compact"
                               id="compact-check" />
                        <label class="form-check-label" for="compact-check">Compact <small>(Small size)</small></label>
                    </div>

                    <!-- User info -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-user" value="fixed" id="sidebaruser-check" />
                        <label class="form-check-label" for="sidebaruser-check">Enable</label>
                    </div>


                    <!-- Topbar -->
                    <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">نوار بالا</h6>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="topbar-color" value="dark" id="darktopbar-check"
                               checked />
                        <label class="form-check-label" for="darktopbar-check">تاریک</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="topbar-color" value="light" id="lighttopbar-check" />
                        <label class="form-check-label" for="lighttopbar-check">روشن</label>
                    </div>


                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">تنظیم مجدد به حالت پیش فرض</button>
                        <a href="https://1.envato.market/uboldadmin" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>

                </div>

            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>

<!-- Plugins js-->
<script src="../assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="../assets/libs/selectize/js/standalone/selectize.min.js"></script>

<!-- Dashboar 1 init js-->
<script src="../assets/js/pages/dashboard-1.init.js"></script>

<!-- App js-->
<script src="../assets/js/app.min.js"></script>

</body>
</html>
