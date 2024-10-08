/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: dashboard ecommerce init Js File
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

//Sales Revenue Overview
var options = {
    series: [{
        name: 'کل فروش',
        data: [44, 55, 41, 67, 22, 43, 21, 49, 20, 41, 67, 22,]
    }, {
        name: 'کل سود',
        data: [11, 17, 15, 15, 21, 14, 15, 13, 5, 15, 15, 21,]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'bar',
        height: 300,
        stacked: true,
        stackType: '100%',
        toolbar: {
            show: false,
        },
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "$" + val + "k"
            }
        }
    },
    grid: {
        show: true,
        padding: {
            top: -20,
            right: -10,
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '50%',
        },
    },
    colors: getChartColorsArray("salesRevenueOverview"),
    fill: {
        opacity: 1
    },
    legend: {
        position: 'bottom',
    },
};

var chart = new ApexCharts(document.querySelector("#salesRevenueOverview"), options);
chart.render();


//Order Statistics
var options = {
    series: [{
        name: 'در انتظار',
        data: [17, 16, 19, 22, 24, 29, 25, 20, 25, 31, 28, 35,]
    },{
        name: 'سفارشات جدید',
        data: [30, 24, 32, 27, 16, 22, 32, 21, 24, 20, 38, 28]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'line',
        height: 310,
        toolbar: {
            show: false,
        },
    },
    stroke: {
        curve: 'smooth',
        width: 2,
    },
    colors: getChartColorsArray("orderStatisticsChart"),
    dataLabels: {
        enabled: false
    },
    grid: {
        show: true,
        padding: {
            top: -20,
            right: 0,
        }
    },
    markers: {
        hover: {
            sizeOffset: 4
        }
    }
};

var chart = new ApexCharts(document.querySelector("#orderStatisticsChart"), options);
chart.render();

//Traffic Resources Chart
var options = {
    series: [44, 34, 22],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 222,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                total: {
                    show: true,
                    label: 'مجموع',
                    formatter: function (w) {
                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                        return 875
                    }
                }
            }
        }
    },
    grid: {
        show: true,
        padding: {
            top: -8,
            bottom: -15,
            left: 0,
            right: 0,
        }
    },
    colors: getChartColorsArray("trafficResourcesChart"),
    labels: ['مستقیم', 'رفرال', 'موتور گوگل'],
};

var chart = new ApexCharts(document.querySelector("#trafficResourcesChart"), options);
chart.render();

//Sales This Month Chart
var options = {
    series: [
        {
            type: 'rangeArea',
            name: 'رنج سود',

            data: [
                {
                    x: 'Mar',
                    y: [900, 2900]
                },
                {
                    x: 'Apr',
                    y: [1400, 2700]
                },
                {
                    x: 'May',
                    y: [2600, 3900]
                },
                {
                    x: 'Jun',
                    y: [500, 1700]
                },
                {
                    x: 'Jul',
                    y: [1900, 2300]
                },
                {
                    x: 'Aug',
                    y: [1000, 1500]
                }
            ]
        },

        {
            type: 'rangeArea',
            name: 'رنج هزینه',
            data: [
                {
                    x: 'Mar',
                    y: [3900, 4900]
                },
                {
                    x: 'Apr',
                    y: [3400, 3900]
                },
                {
                    x: 'May',
                    y: [5100, 5900]
                },
                {
                    x: 'Jun',
                    y: [5400, 6700]
                },
                {
                    x: 'Jul',
                    y: [4300, 4600]
                },
                {
                    x: 'Aug',
                    y: [2100, 2900]
                }
            ]
        },

        {
            type: 'line',
            name: 'متوسط سود',
            data: [
                {
                    x: 'Mar',
                    y: 1900
                },
                {
                    x: 'Apr',
                    y: 2200
                },
                {
                    x: 'May',
                    y: 3000
                },
                {
                    x: 'Jun',
                    y: 1000
                },
                {
                    x: 'Jul',
                    y: 2100
                },
                {
                    x: 'Aug',
                    y: 1200
                },
                {
                    x: 'Sep',
                    y: 2250
                },
                {
                    x: 'Oct',
                    y: 2900
                }
            ]
        },
        {
            type: 'line',
            name: 'متوسط هزینه',
            data: [
                {
                    x: 'Mar',
                    y: 4300
                },
                {
                    x: 'Apr',
                    y: 3700
                },
                {
                    x: 'May',
                    y: 5500
                },
                {
                    x: 'Jun',
                    y: 5900
                },
                {
                    x: 'Jul',
                    y: 4500
                },
                {
                    x: 'Aug',
                    y: 3500
                },
                {
                    x: 'Sep',
                    y: 2000
                },
                {
                    x: 'Oct',
                    y: 1800
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 285,
        type: 'rangeArea',
        animations: {
            speed: 500
        },
        toolbar: {
            show: false,
        },
    },
    colors: getChartColorsArray("salesThisMonthChart"),
    dataLabels: {
        enabled: false
    },
    fill: {
        opacity: [0.24, 0.24, 1, 1]
    },
    forecastDataPoints: {
        count: 2
    },
    yaxis: {
        show: false,
    },
    stroke: {
        curve: 'straight',
        width: [0, 0, 2, 2]
    },
    grid: {
        show: true,
        padding: {
            top: -8,
            left: 10,
            right: 0,
        }
    },
    legend: {
        show: true,
        customLegendItems: ['تیم B', 'تیم A'],
        inverseOrder: true
    },
    markers: {
        hover: {
            sizeOffset: 5
        }
    }
};

var chart = new ApexCharts(document.querySelector("#salesThisMonthChart"), options);
chart.render();

//Audience Chart
var options = {
    series: [{
        name: 'مرد',
        data: [44, 55, 41, 67, 22, 43, 26]
    }, {
        name: 'زن',
        data: [13, 23, 20, 8, 13, 27, 41]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'bar',
        height: 390,
        stacked: true,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: true
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 6,
            columnWidth: '44%',
            dataLabels: {
                total: {    
                    enabled: true,
                    style: {
                        fontSize: '13px',
                        fontWeight: 600
                    }
                }
            }
        },
    },
    xaxis: {
        type: 'datetime',
        categories: ['01/01/2023 GMT', '01/02/2023 GMT', '01/03/2023 GMT', '01/04/2023 GMT',
            '01/05/2023 GMT', '01/06/2023 GMT', '01/07/2023 GMT'
        ],
    },
    colors: getChartColorsArray("audienceChart"),
    legend: {
        position: 'top',
        horizontalAlign: 'left',
    },
    fill: {
        opacity: 1
    }
};

var chart = new ApexCharts(document.querySelector("#audienceChart"), options);
chart.render();