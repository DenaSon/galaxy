/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: dashboard hr init Js File
*/

// rgb to hex convert
function rgbToHex(rgb) {
    // Extract RGB values using regular expressions
    const rgbValues = rgb.match(/\d+/g);

    if (rgbValues.length === 3) {
        var [r, g, b] = rgbValues.map(Number);
    }
    // Ensure the values are within the valid range (0-255)
    r = Math.max(0, Math.min(255, r));
    g = Math.max(0, Math.min(255, g));
    b = Math.max(0, Math.min(255, b));

    // Convert each component to its hexadecimal representation
    const rHex = r.toString(16).padStart(2, '0');
    const gHex = g.toString(16).padStart(2, '0');
    const bHex = b.toString(16).padStart(2, '0');

    // Combine the hexadecimal values with the "#" prefix
    const hexColor = `#${rHex}${gHex}${bHex}`;

    return hexColor.toUpperCase(); // Convert to uppercase for consistency
}

// common function to get charts colors from class
function getChartColorsArray(chartId) {
    const chartElement = document.getElementById(chartId);
    if (chartElement) {
        const colors = chartElement.dataset.chartColors;
        if (colors) {
            const parsedColors = JSON.parse(colors);
            const mappedColors = parsedColors.map((value) => {
                const newValue = value.replace(/\s/g, "");
                if (!newValue.includes("#")) {
                    const element = document.querySelector(newValue);
                    if (element) {
                        const styles = window.getComputedStyle(element);
                        const backgroundColor = styles.backgroundColor;
                        return backgroundColor || newValue;
                    } else {
                        const divElement = document.createElement('div');
                        divElement.className = newValue;
                        document.body.appendChild(divElement);

                        const styles = window.getComputedStyle(divElement);
                        const backgroundColor = styles.backgroundColor.includes("#") ? styles.backgroundColor : rgbToHex(styles.backgroundColor);
                        return backgroundColor || newValue;
                    }
                } else {
                    return newValue;
                }
            });
            return mappedColors;
        } else {
            console.warn(`chart-colors attribute not found on: ${chartId}`);
        }
    }
}

var totalEmployeeChart = "";
var totalApplicationChart = "";
var hiredCandidatesChart = "";
var rejectedCandidatesChart = "";
var applicationReceivedChart = "";

function loadCharts() {
    //  Total Employee
    var totalEmployeeColors = "";
    totalEmployeeColors = getChartColorsArray("totalEmployee");
    if (totalEmployeeColors) {
        var options = {
            series: [10],
            chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
                height: 110,
                type: 'radialBar',
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '50%',
                    },
                    track: {
                        margin: 2,
                    },
                    dataLabels: {
                        show: false
                    }
                }
            },
            grid: {
                padding: {
                    top: -15,
                    bottom: -15
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['کل کارکنان'],
            colors: totalEmployeeColors
        };

        if (totalEmployeeChart != "")
            totalEmployeeChart.destroy();
        totalEmployeeChart = new ApexCharts(document.querySelector("#totalEmployee"), options);
        totalEmployeeChart.render();
    }

    //  Total Application
    var totalApplicationColors = "";
    totalApplicationColors = getChartColorsArray("totalApplication");
    if (totalApplicationColors) {
        var options = {
            series: [60],
            chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
                height: 110,
                type: 'radialBar',
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '50%',
                    },
                    track: {
                        margin: 2,
                    },
                    dataLabels: {
                        show: false
                    }
                }
            },
            grid: {
                padding: {
                    top: -15,
                    bottom: -15
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['کل کارکنان'],
            colors: totalApplicationColors
        };

        if (totalApplicationChart != "")
            totalApplicationChart.destroy();
        totalApplicationChart = new ApexCharts(document.querySelector("#totalApplication"), options);
        totalApplicationChart.render();
    }

    //  Hired Candidates
    var hiredCandidatesColors = "";
    hiredCandidatesColors = getChartColorsArray("hiredCandidates");
    if (hiredCandidatesColors) {
        var options = {
            series: [25],
            chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
                height: 110,
                type: 'radialBar',
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '50%',
                    },
                    track: {
                        margin: 2,
                    },
                    dataLabels: {
                        show: false
                    }
                }
            },
            grid: {
                padding: {
                    top: -15,
                    bottom: -15
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['کل کارکنان'],
            colors: hiredCandidatesColors
        };

        if (hiredCandidatesChart != "")
            hiredCandidatesChart.destroy();
        hiredCandidatesChart = new ApexCharts(document.querySelector("#hiredCandidates"), options);
        hiredCandidatesChart.render();
    }

    //  Rejected Candidates
    var rejectedCandidatesColors = "";
    rejectedCandidatesColors = getChartColorsArray("rejectedCandidates");
    if (rejectedCandidatesColors) {
        var options = {
            series: [75],
            chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
                height: 110,
                type: 'radialBar',
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '50%',
                    },
                    track: {
                        margin: 2,
                    },
                    dataLabels: {
                        show: false
                    }
                }
            },
            grid: {
                padding: {
                    top: -15,
                    bottom: -15
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['Total Employee'],
            colors: rejectedCandidatesColors
        };

        if (rejectedCandidatesChart != "")
            rejectedCandidatesChart.destroy();
        rejectedCandidatesChart = new ApexCharts(document.querySelector("#rejectedCandidates"), options);
        rejectedCandidatesChart.render();
    }

    //Application Received
    var applicationReceivedColors = "";
    applicationReceivedColors = getChartColorsArray("applicationReceivedChart");
    if (applicationReceivedColors) {
        var options = {
            series: [{
                name: 'کل برنامه',
                type: 'area',
                data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
            }, {
                name: 'کاندیداهای استخدام شده',
                type: 'line',
                data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
            }],
            chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
                height: 315,
                type: 'line',
                stacked: false,
                margin: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                },
                toolbar: {
                    show: false,
                },
            },
            stroke: {
                width: [2, 2],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            },

            fill: {
                opacity: [0.03, 1],
                gradient: {
                    inverseColors: false,
                    shade: 'light',
                    type: "vertical",
                    opacityFrom: 0.85,
                    opacityTo: 0.55,
                    stops: [0, 100, 100, 100]
                }
            },
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            colors: getChartColorsArray("applicationReceivedChart"),
            markers: {
                size: 0
            },
            grid: {
                padding: {
                    top: -15,
                    right: 0,
                }
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(0) + " نقطه";
                        }
                        return y;

                    }
                }
            }
        };

        if (applicationReceivedChart != "")
            applicationReceivedChart.destroy();
        applicationReceivedChart = new ApexCharts(document.querySelector("#applicationReceivedChart"), options);
        applicationReceivedChart.render();
    }
}

window.addEventListener("resize", function () {
    setTimeout(() => {
        loadCharts();
    }, 0);
});
loadCharts();

//Stacked Columns
var options = {
    series: [{
        name: 'جدید',
        data: [44, 55, 41, 67, 22, 43, 14, 55, 41,]
    }, {
        name: 'انتظار',
        data: [13, 23, 20, 8, 13, 27, 8, 20, 8,]
    }, {
        name: 'تکمیل شد',
        data: [11, 17, 15, 15, 21, 14, 24, 11, 17,]
    }, {
        name: 'رد شد',
        data: [21, 7, 25, 13, 22, 8, 13, 7, 25,]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'bar',
        height: 350,
        stacked: true,
        zoom: {
            enabled: true
        },
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 2,
            columnWidth: '25%',
        },
    },
    grid: {
        padding: {
            top: -15,
            bottom: 5,
            right: 0,
        }
    },
    xaxis: {
        categories: ['01', '02', '03', '04',
            '05', '06', '07', '08', '09'
        ],
    },
    dataLabels: {
        enabled: false
    },
    colors: getChartColorsArray("totalProjectChart"),
    legend: {
        position: 'bottom',
    },
    fill: {
        opacity: 1
    }
};

var chart = new ApexCharts(document.querySelector("#totalProjectChart"), options);
chart.render();

const options44 = {
    settings: {
        visibility: {
            theme: 'light',
        },
        selected: {
            month: 10,
            year: 2023,
        },
    },
    popups: {
        '2023-06-28': {
            modifier: '!bg-red-500 !text-white',
            html: 'ملاقات با طراح',
        },
        '2023-07-13': {
            modifier: '!bg-red-500 !text-white text-bold',
            html: 'Meeting at 6:00 PM',
        },
        '2023-07-08': {
            modifier: '!bg-purple-500 !text-white text-bold',
            html: `<div>
        <div class="font-semibold underline mb-1">09:57 AM</div>
        <p class="text-slate-500 dark:text-zink-200">کنفرانس مدیران خط توسعه</p>
      </div>`,
        },
        '2023-07-17': {
            modifier: '!bg-green-500 !text-white',
            html: `<div>
        <div class="font-semibold underline mb-1">12:00 PM</div>
        <p class="text-slate-500 dark:text-zink-200">هواپیما در لاس وگاس</p>
      </div>`,
        },
        '2023-11-11': {
            modifier: '!bg-purple-500 !text-white text-bold',
            html: `<div>
        <div class="font-semibold underline mb-1">09:57 AM</div>
        <p class="text-slate-500 dark:text-zink-200">اجلاس اجرایی رهبری</p>
      </div>`,
        },
        '2023-11-11': {
            modifier: '!bg-orange-500 !text-white text-bold',
            html: `<div>
        <p class="text-slate-500 dark:text-zink-200">بحث پروژه مهمان نوازی</p>
      </div>`,
        },
    },
};

const calendar = new VanillaCalendar('#calendar', options44);
calendar.init();
