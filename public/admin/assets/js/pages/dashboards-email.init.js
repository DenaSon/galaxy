/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: dashboards email init Js File
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

//sent email 
var options = {
    series: [{
        name: 'ارسال',
        data: [
            14, 20, 10, 5, 11, 30, 24, 26, 33, 38, 34, 27, 22
        ]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'area-datetime',
        type: 'line',
        height: 80,
        sparkline: {
            enabled: true
        },
        zoom: {
            autoScaleYaxis: true
        }
    },
    colors: getChartColorsArray("sentEmail"),
    stroke: {
        width: 2,
        curve: 'smooth',
    },
    dataLabels: {
        enabled: false
    },
};
var chart = new ApexCharts(document.querySelector("#sentEmail"), options);
chart.render();

//Open Rate
var options = {
    series: [{
        name: 'نرخ باز',
        data: [
            38, 34, 27, 22, 14, 20, 10, 5, 11, 30, 24, 26, 33
        ]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'area-datetime',
        type: 'line',
        height: 80,
        sparkline: {
            enabled: true
        },
        zoom: {
            autoScaleYaxis: true
        }
    },
    colors: getChartColorsArray("openRate"),
    stroke: {
        width: 2,
        curve: 'smooth',
    },
    dataLabels: {
        enabled: false
    },
};
var chart = new ApexCharts(document.querySelector("#openRate"), options);
chart.render();

//Click Rate
var options = {
    series: [{
        name: 'نرخ کلیک',
        data: [
            30, 24, 14, 20, 10, 5, 11, 26, 33, 38, 34, 27, 22
        ]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'area-datetime',
        type: 'line',
        height: 80,
        sparkline: {
            enabled: true
        },
        zoom: {
            autoScaleYaxis: true
        }
    },
    colors: getChartColorsArray("clickRate"),
    stroke: {
        width: 2,
        curve: 'smooth',
    },
    dataLabels: {
        enabled: false
    },
};
var chart = new ApexCharts(document.querySelector("#clickRate"), options);
chart.render();

//click Through
var options = {
    series: [{
        name: 'از طریق کلیک',
        data: [
            11, 30, 24, 26, 33, 38, 14, 20, 10, 5, 34, 27, 22
        ]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'area-datetime',
        type: 'line',
        height: 80,
        sparkline: {
            enabled: true
        },
        zoom: {
            autoScaleYaxis: true
        }
    },
    colors: getChartColorsArray("clickThrough"),
    stroke: {
        width: 2,
        curve: 'smooth',
    },
    dataLabels: {
        enabled: false
    },
};
var chart = new ApexCharts(document.querySelector("#clickThrough"), options);
chart.render();

//Delivered Rate
var options = {
    series: [{
        name: 'نرخ تحویل',
        data: [
            11, 30, 24, 26, 33, 38, 14, 20, 10, 9, 34, 27, 22
        ]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'area-datetime',
        type: 'bar',
        height: 80,
        sparkline: {
            enabled: true
        },
        zoom: {
            autoScaleYaxis: true
        }
    },
    colors: getChartColorsArray("deliveredRate"),
    stroke: {
        width: 1,
        curve: 'smooth',
    },
    dataLabels: {
        enabled: false
    },
};
var chart = new ApexCharts(document.querySelector("#deliveredRate"), options);
chart.render();

//Hard Bounce Rate 
var options = {
    series: [{
        name: 'نرخ پرش سخت',
        data: [
            14, 20, 10, 5, 11, 30, 24, 26, 33, 38, 34, 27, 22
        ]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'area-datetime',
        type: 'bar',
        height: 80,
        sparkline: {
            enabled: true
        },
        zoom: {
            autoScaleYaxis: true
        }
    },
    colors: getChartColorsArray("hardBounceRate"),
    stroke: {
        width: 2,
        curve: 'smooth',
    },
    dataLabels: {
        enabled: false
    },
};
var chart = new ApexCharts(document.querySelector("#hardBounceRate"), options);
chart.render();

//Unsubscribed Rate
var options = {
    series: [{
        name: 'نرخ لغو اشتراک',
        data: [
            38, 34, 27, 22, 14, 20, 10, 5, 11, 30, 24, 26, 33
        ]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'area-datetime',
        type: 'bar',
        height: 80,
        sparkline: {
            enabled: true
        },
        zoom: {
            autoScaleYaxis: true
        }
    },
    colors: getChartColorsArray("unsubscribedRate"),
    stroke: {
        width: 2,
        curve: 'smooth',
    },
    dataLabels: {
        enabled: false
    },
};
var chart = new ApexCharts(document.querySelector("#unsubscribedRate"), options);
chart.render();

//Spam Report Rate
var options = {
    series: [{
        name: 'نرخ گزارش اسپم',
        data: [
            30, 24, 14, 20, 10, 13, 11, 26, 33, 38, 34, 27, 22
        ]
    }],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        id: 'area-datetime',
        type: 'bar',
        height: 80,
        sparkline: {
            enabled: true
        },
        zoom: {
            autoScaleYaxis: true
        }
    },
    colors: getChartColorsArray("spanReportRate"),
    stroke: {
        width: 2,
        curve: 'smooth',
    },
    dataLabels: {
        enabled: false
    },
};
var chart = new ApexCharts(document.querySelector("#spanReportRate"), options);
chart.render();

// email data Charts
var dataLabelOptions = {
    series: [
        {
            name: "نرخ باز",
            data: [28, 29, 31, 36, 32, 32, 33, 40, 37]
        },
        {
            name: "نرخ کلیک",
            data: [26, 41, 40, 51, 49, 62, 69, 52, 58]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
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
        },
    },
    colors: getChartColorsArray("emailDataChart"),
    stroke: {
        curve: 'smooth',
        width: 3
    },
    legend: {
        show: true,
    },
    markers: {
        size: 5,
        hover: {
            sizeOffset: 1
        }
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
    },
    legend: {
        position: 'top',
        horizontalAlign: 'right',
        floating: true,
        offsetY: -25,
        offsetX: -5
    }
};

var chart = new ApexCharts(document.querySelector("#emailDataChart"), dataLabelOptions);
chart.render();

//email marketing chart
var options = {
    series: [44, 55, 67],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 410,
        type: 'radialBar',
    },
    legend: {
        show: true,
        position: 'bottom',
        horizontalAlign: 'center', 
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'مجموع',
                    formatter: function (w) {
                        return 249
                    }
                }
            },
            track: {
                margin: 14, 
            }
        }
    },
    colors: getChartColorsArray("emailMarketingChart"),
    labels: ['ارسال', 'باز شده', 'باز نشده'],
};

var chart = new ApexCharts(document.querySelector("#emailMarketingChart"), options);
chart.render();