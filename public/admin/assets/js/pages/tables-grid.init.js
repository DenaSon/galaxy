/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: tables grid init Js File
*/

//basic tables
if (document.getElementById("basic_tables"))
    new gridjs.Grid({
        columns: ["Name", "Email", "Phone Number"],
        data: [
            ["جان", "john@example.com", "(353) 01 222 3333"],
            ["علامت", "mark@gmail.com", "(01) 22 888 4444"],
            ["عین", "eoin@gmail.com", "0097 22 654 00033"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["حرارت", "afshin@mail.com", "(353) 22 87 8356"]
        ],
    }).render(document.getElementById("basic_tables"));

//pagination tables
if (document.getElementById("pagination_tables"))
    new gridjs.Grid({
        columns: ["نام", "ایمیل", "شماره تلفن"],
        pagination: true,
        pagination: {
            limit: 3
        },
        data: [
            ["جان", "john@example.com", "(353) 01 222 3333"],
            ["علامت", "mark@gmail.com", "(01) 22 888 4444"],
            ["هفتم", "eoin@gmail.com", "0097 22 654 00033"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["افشین", "afshin@mail.com", "(353) 22 87 8356"]
        ]
    }).render(document.getElementById("pagination_tables"));

//search tables
if (document.getElementById("search_tables"))
    new gridjs.Grid({
        columns: ["نام", "ایمیل", "شماره تلفن"],
        search: true,
        data: [
            ["جان", "john@example.com", "(353) 01 222 3333"],
            ["علامت", "mark@gmail.com", "(01) 22 888 4444"],
            ["عین", "eoin@gmail.com", "0097 22 654 00033"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["سارا", "sarahcdd@gmail.com", "+322 876 1233"],
            ["حرارت", "afshin@mail.com", "(353) 22 87 8356"]
        ]
    }).render(document.getElementById("search_tables"));


// Sorting Table
if (document.getElementById("table_sorting"))
    new gridjs.Grid({
        columns: [{
            name: 'نام',
            width: '150px',
        }, {
            name: 'ایمیل',
            width: '250px',
        }, {
            name: 'موقعیت',
            width: '250px',
        }, {
            name: 'شرکت',
            width: '250px',
        }, {
            name: 'کشور',
            width: '150px',
        }],
        pagination: {
            limit: 5
        },
        sort: true,
        data: [
    ["جاناتان", "jonathan@example.com", "معمار اجرایی ارشد", "Hauck Inc", "Holy See"],
             ["هارولد", "harold@example.com", "هماهنگ کننده خلاق پیشرو", "Metz Inc", "Iran"],
             ["شانون", "shannon@example.com", "همکار عملکردی میراث", "Zemlak Group", "South Georgia"],
             ["رابرت", "robert@example.com", "تکنسین حساب های محصول", "Hoeger", "San Marino"],
             ["نوئل", "noel@example.com", "مدیر اطلاعات مشتری", "Howell - Rippin", "Germany"],
             ["تراسی", "traci@example.com", "مدیر هویت شرکتی", "Koelpin - Goldner", "Vanuatu"],
             ["کری", "kerry@example.com", "کارشناس ارشد برنامه های کاربردی", "Feeney, Langworth and Tremblay", "Niger"],
             ["پتسی", "patsy@example.com", "مدیر تضمین پویا", "Streich Group", "Niue"],
             ["کتی", "cathy@example.com", "مدیر اطلاعات مشتری", "ایبرت, شامبرگر و جانستون", "مکزیک"],
             ["تایرون", "tyrone@example.com", "رابط پاسخگویی ارشد", "Raynor, Rolfson and Daugherty", "Qatar"],
]
    }).render(document.getElementById("table_sorting"));

//Resizable columns
if (document.getElementById("resizable_columns"))
    new gridjs.Grid({
        columns: ['Name', 'Email', 'Phone Number'],
        data: [
            ['جان', 'john@example.com', '(353) 01 222 3333'],
            ['مارک', 'mark@gmail.com', '(01) 22 888 4444']
        ],
        sort: true,
        resizable: true,
    }).render(document.getElementById("resizable_columns"));


// Loading State Table
if (document.getElementById("table_loading_state"))
    new gridjs.Grid({
        columns: [{
            name: 'نام',
            width: '150px',
        }, {
            name: 'ایمیل',
            width: '250px',
        }, {
            name: 'موقعیت',
            width: '250px',
        }, {
            name: 'شرکت',
            width: '250px',
        }, {
            name: 'کشور',
            width: '150px',
        }],
        pagination: {
            limit: 5
        },
        sort: true,
        data: function () {
            return new Promise(function (resolve) {
                setTimeout(function () {
                    resolve([
                        ["جاناتان", "jonathan@example.com", "معمار ارشد اجرایی", "Hauck Inc", "Holy See"],
                        ["هارولد", "harold@example.com", "هماهنگ کننده خلاق پیشرو", "Metz Inc", "Iran"],
                        ["شانون", "shannon@example.com", "همکار عملکردی میراث", "Zemlak Group", "South Georgia"],
                        ["رابرت", "robert@example.com", "تکنسین حساب های محصول", "Hoeger", "San Marino"],
                        ["نوئل", "noel@example.com", "مدیر اطلاعات مشتری", "Howell - Rippin", "Germany"],
                        ["تراسی", "traci@example.com", "مدیر هویت شرکتی", "Koelpin - Goldner", "Vanuatu"],
                        ["کری", "kerry@example.com", "کارشناس ارشد برنامه های کاربردی", "Feeney, Langworth and Tremblay", "Niger"],
                        ["پتسی", "patsy@example.com", "مدیر تضمین پویا", "Streich Group", "Niue"],
                        ["کتی", "cathy@example.com", "مدیر اطلاعات مشتری", "Ebert, Schamberger and Johnston", "Mexico"],
                        ["تایرون", "tyrone@example.com", "رابط پاسخگویی ارشد", "Raynor, Rolfson and Daugherty", "Qatar"]
                    ])
                }, 2000);
            });
        }
    }).render(document.getElementById("table_loading_state"));

// Fixed Header
if (document.getElementById("table_fixed_header"))
    new gridjs.Grid({
        columns: [{
            name: 'نام',
            width: '150px',
        }, {
            name: 'ایمیل',
            width: '250px',
        }, {
            name: 'موقعیت',
            width: '250px',
        }, {
            name: 'کشور',
            width: '250px',
        }, {
            name: 'کشور',
            width: '150px',
        }],
        sort: true,
        pagination: true,
        fixedHeader: true,
        height: '400px',
        data: [
            ["جاناتان", "jonathan@example.com", "معمار ارشد اجرایی", "Hauck Inc", "Holy See"],
            ["هارولد", "harold@example.com", "هماهنگ کننده خلاق پیشرو", "Metz Inc", "Iran"],
            ["شانون", "shannon@example.com", "همکار عملکردی میراث", "Zemlak Group", "South Georgia"],
            ["رابرت", "robert@example.com", "تکنسین حساب های محصول", "Hoeger", "San Marino"],
            ["نوئل", "noel@example.com", "مدیر اطلاعات مشتری", "Howell - Rippin", "Germany"],
            ["تراسی", "traci@example.com", "مدیر هویت شرکتی", "Koelpin - Goldner", "Vanuatu"],
            ["کری", "kerry@example.com", "کارشناس ارشد برنامه های کاربردی", "Feeney, Langworth and Tremblay", "Niger"],
            ["پتسی", "patsy@example.com", "مدیر تضمین پویا", "Streich Group", "Niue"],
            ["کتی", "cathy@example.com", "مدیر اطلاعات مشتری", "Ebert, Schamberger and Johnston", "Mexico"],
            ["تایرون", "tyrone@example.com", "رابط پاسخگویی ارشد", "Raynor, Rolfson and Daugherty", "Qatar"],
        ]
    }).render(document.getElementById("table_fixed_header"));

// Hidden Columns
if (document.getElementById("table_hidden_column"))
    new gridjs.Grid({
        columns: [{
            name: 'نام',
            width: '120px',
        }, {
            name: 'ایمیل',
            width: '250px',
        }, {
            name: 'موقعیت',
            width: '250px',
        }, {
            name: 'کشور',
            width: '250px',
        },
        {
            name: 'کشور',
            hidden: true
        },
        ],
        pagination: {
            limit: 5
        },
        sort: true,
        data: [
            ["جاناتان", "jonathan@example.com", "معمار ارشد اجرایی", "Hauck Inc", "Holy See"],
            ["هارولد", "harold@example.com", "هماهنگ کننده خلاق پیشرو", "Metz Inc", "Iran"],
            ["شانون", "shannon@example.com", "همکار عملکردی میراث", "Zemlak Group", "South Georgia"],
            ["رابرت", "robert@example.com", "تکنسین حساب های محصول", "Hoeger", "San Marino"],
            ["نوئل", "noel@example.com", "مدیر اطلاعات مشتری", "Howell - Rippin", "Germany"],
            ["تراسی", "traci@example.com", "مدیر هویت شرکتی", "Koelpin - Goldner", "Vanuatu"],
            ["کری", "kerry@example.com", "کارشناس ارشد برنامه های کاربردی", "Feeney, Langworth and Tremblay", "Niger"],
            ["پتسی", "patsy@example.com", "مدیر تضمین پویا", "Streich Group", "Niue"],
            ["کتی", "cathy@example.com", "مدیر اطلاعات مشتری", "Ebert, Schamberger and Johnston", "Mexico"],
            ["تایرون", "tyrone@example.com", "رابط پاسخگویی ارشد", "Raynor, Rolfson and Daugherty", "Qatar"],
        ]
    }).render(document.getElementById("table_hidden_column"));

// Cell formatting
if (document.getElementById("cell_formatting"))
    new gridjs.Grid({
        columns: [
            'حقوق 1',
            'حقوق 2',
            {
                name: 'مجموع',
                data: null,
                formatter: (_, row) => `$${(row.cells[0].data + row.cells[1].data).toLocaleString()} USD`
            },
        ],
        data: Array(5).fill().map(x => [
            Math.round(Math.random() * 100000),
            Math.round(Math.random() * 100000)
        ]),
    }).render(document.getElementById("cell_formatting"));