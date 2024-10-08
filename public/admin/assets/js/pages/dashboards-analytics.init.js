/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: dashboard analytics init Js File
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

//Response Times
var options = {
    series: [{
        name: "زمان پاسخگویی",
        data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'line',
        zoom: {
            enabled: false
        },
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
        show: true,
        curve: 'smooth',
        lineCap: 'butt',
        width: 2,
        dashArray: 0,
    },
    dataLabels: {
        enabled: false
    },
    colors: getChartColorsArray("responseTimes"),
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    }
};

var chart = new ApexCharts(document.querySelector("#responseTimes"), options);
chart.render();

//Pages Interaction
var options = {
    series: [{
        name: 'بینندگان',
        data: [20, 13, 19, 23, 29, 42, 33, 29, 37, 46, 40, 49]
    },
        // {
        //     name: 'Followers',
        //     data: [10, 18, 13, 23, 33, 39, 30, 21, 36, 42, 39, 46]
        // }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            borderRadius: 10,
            dataLabels: {
                position: 'top', // top, center, bottom
            },
        }
    },
    dataLabels: {
        enabled: true,
        offsetY: -20,
        style: {
            fontSize: '12px',
            colors: ["#304758"]
        }
    },

    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: 'bottom',
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        crosshairs: {
            fill: {
                type: 'gradient',
                gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                }
            }
        },
        tooltip: {
            enabled: true,
        }
    },
    yaxis: {
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
        }
    },
    stroke: {
        show: true,
        width: 4,
        colors: ['transparent']
    },
    grid: {
        show: false,
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: -10
        },
    },
    colors: getChartColorsArray("pagesInteraction")
};

var chart = new ApexCharts(document.querySelector("#pagesInteraction"), options);
chart.render();

//Platform Perspective
var options = {
    series: [
        {
            data: [
                {
                    x: 'React',
                    y: 218
                },
                {
                    x: 'TailwindCSS',
                    y: 187
                },
                {
                    x: 'Angular',
                    y: 134
                },
                {
                    x: 'Vue Js',
                    y: 55
                },
                {
                    x: 'Laravel',
                    y: 99
                },
                {
                    x: 'PHP',
                    y: 34
                },
                {
                    x: 'ASP.Net',
                    y: 86
                },
                {
                    x: 'Django',
                    y: 30
                },
                {
                    x: 'CI',
                    y: 44
                }
            ]
        }
    ],
    legend: {
        show: false
    },
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 270,
        type: 'treemap',
        toolbar: {
            show: false,
        }
    },
    grid: {
        show: false,
        padding: {
            top: -15,
            bottom: 0,
            right: -20
        },
    },
    colors: getChartColorsArray("platformPerspective"),
};

var chart = new ApexCharts(document.querySelector("#platformPerspective"), options);
chart.render();

//User Devices
var options = {
    series: [{
        name: 'Desktop',
        data: [80, 50, 30, 40, 100, 20],
    }, {
        name: 'Mobile',
        data: [20, 30, 40, 80, 20, 80],
    }, {
        name: 'Others',
        data: [44, 76, 78, 13, 43, 10],
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 240,
        type: 'radar',
        dropShadow: {
            enabled: true,
            blur: 1,
            left: 1,
            top: 1
        },
        toolbar: {
            show: false,
        }
    },
    stroke: {
        width: 2
    },
    fill: {
        opacity: 0.1
    },
    markers: {
        size: 0
    },
    responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                show: false
            }
        }
    }],
    colors: getChartColorsArray("userDeviceCharts"),
    legend: {
        position: 'right',
        offsetY: 0,
        height: 230,
    },
    xaxis: {
        categories: ['2018', '2019', '2020', '2021', '2022', '2023']
    }
};

var chart = new ApexCharts(document.querySelector("#userDeviceCharts"), options);
chart.render();

//Satisfaction Rate
var options = {
    series: [95.33],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'radialBar',
        height: 450,
        offsetY: -20,
        sparkline: {
            enabled: true
        }
    },
    plotOptions: {
        radialBar: {
            startAngle: -90,
            endAngle: 90,
            track: {
                strokeWidth: '97%',
                margin: 5, // margin is in pixels
            },
            hollow: {
                size: '60%',
                margin: 0,
                image: '../../assets/images/logo-sm.png',
                imageWidth: 36,
                imageHeight: 36,
                imageClipped: false,
                imageOffsetY: -60,
            },
            dataLabels: {
                name: {
                    show: false
                },
                value: {
                    offsetY: -5,
                    fontSize: '22px',
                    fontWeight: '600'
                }
            }
        }
    },
    grid: {
        padding: {
            top: -10
        }
    },
    colors: getChartColorsArray("satisfactionRate"),
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            shadeIntensity: 0.4,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 50, 53, 91]
        },
    },
    stroke: {
        dashArray: 4
    },
    labels: ['Average Results'],
};

var chart = new ApexCharts(document.querySelector("#satisfactionRate"), options);
chart.render();

//Daily Visit Insights
var options = {
    series: [
        {
            name: 'مرد',
            data: [55, 41, 67, 22, 43, 21, 33, 45]
        },
        {
            name: 'زن',
            data: [55, 41, 67, 22, 43, 21, 33, 45]
        }
    ],
    annotations: {
        points: [{
            x: 'Bananas',
            seriesIndex: 0,
            label: {
                borderColor: getChartColorsArray("dailyVisitInsightsChart")[1],
                offsetY: 0,
                style: {
                    color: '#fff',
                    background: getChartColorsArray("dailyVisitInsightsChart")[1],
                },
                text: 'Bananas are good',
            }
        }]
    },
    colors: getChartColorsArray("dailyVisitInsightsChart"),
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 238,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            borderRadius: 10,
            columnWidth: '70%',
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: 2
    },
    xaxis: {
        labels: {
            rotate: -45
        },
        categories: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        tickPlacement: 'on'
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
        },
    },
    grid: {
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: true
            }
        },
        padding: {
            top: -10,
            right: -10,
            left: -10
        }
    },
    yaxis: {
        show: false,
    }
};

var chart = new ApexCharts(document.querySelector("#dailyVisitInsightsChart"), options);
chart.render();

//Subscription Distribution
var options = {
    series: [44, 55, 41, 17, 15],
    labels: ['مبتدی', 'متوسط', 'متخصص', 'VIP', 'حرفه ای'],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 270,
        type: 'donut',
    },
    plotOptions: {
        pie: {
            startAngle: -90,
            donut: {
                size: '75%'
            }
        }
    },
    dataLabels: {
        enabled: false
    },
    fill: {
        type: 'gradient',
    },
    colors: getChartColorsArray("subscriptionDistribution"),
    legend: {
        formatter: function (val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex]
        }
    },
    legend: {
        position: 'bottom'
    }
};

var chart = new ApexCharts(document.querySelector("#subscriptionDistribution"), options);
chart.render();

// Line with Data Labels
var dataLabelOptions = {
    series: [
        {
            name: "درآمد 1403",
            data: [28, 29, 33, 36, 32]
        },
        {
            name: "هزینه 1403",
            data: [20, 17, 21, 29, 23]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 235,
        type: 'line',
        dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
        },
        toolbar: {
            show: false
        }
    },
    colors: getChartColorsArray("lineWithDataLabel"),
    dataLabels: {
        enabled: true,
    },
    stroke: {
        curve: 'smooth',
        size: 2,
    },
    markers: {
        size: 1
    },
    yaxis: {
      show: false  
    },
    xaxis: {
        categories: ['Mar', 'Apr', 'May', 'Jun', 'Jul'],
    },
    legend: {
        position: 'top',
        horizontalAlign: 'right',
        floating: true,
        offsetY: -25,
        offsetX: -5
    },
    grid: {
        xaxis: {
            lines: {
                show: false
            }
        },
        yaxis: {
            lines: {
                show: false
            }
        },
        padding: {
            top: -25,
        }
    },
};

var chart = new ApexCharts(document.querySelector("#lineWithDataLabel"), dataLabelOptions);
chart.render();